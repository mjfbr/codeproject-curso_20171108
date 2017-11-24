<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Http\Requests;
use CodeProject\Repositories\ProjectRepository;
use CodeProject\Repositories\ProjectTaskRepository;
use CodeProject\Services\ProjectService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Exceptions\NoActiveAccessTokenException;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use Prettus\Validator\Exceptions\ValidatorException;


//use CodeProject\Http\Controllers\Controller;
//use CodeProject\Entities\Client;
//use CodeProject\Repositories\ClientRepositoryEloquent;

class ProjectController extends Controller
{
    /**
    * @var ProjectRepository
    */
    private $repository;

    /**
    * @var ProjectService
    */
    private $service;

    /**
    * @param ProjectRepository $repository
    * @param  ProjectService $service
    */

    public function __construct(ProjectRepository $repository, ProjectService $service, ProjectTaskRepository $taskRepository) {
        $this->repository = $repository;
        $this->service = $service;
        $this->taskRepository = $taskRepository;        
        $this->middleware('check.project.owner', ['except' => ['index', 'store', 'show']]);
        $this->middleware('check.project.permission', ['except' => ['index', 'store', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return \CodeProject\Client::all();
        //return ClientRepositoryEloquent::all();
        //return $repository->all();
        //return $this->repository->all();
        //return $this->repository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
        return $this->repository->findWithOwnerAndMember(\Authorizer::getResourceOwnerId());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return \CodeProject\Client::create($request->all());
        //return Client::create($request->all());
        //return $this->repository->create($request->all());
        return $this->service->create($request->all()); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return \CodeProject\Client::find($id);
        //return Client::find($id);
        //return ['userId' => \Authorizer::getResourceOwnerId()];
        //if ($this->checkProjectOwner($id) == false) {
        if($this->service->checkProjectPermissions($id) == false) {
            return ['error' => 'Access Forbidden'];
        }     
        return $this->repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        if ($this->service->checkProjectOwner($id) == false) {
            return ['error' => 'Access Forbidden'];
        }         
        return $this->service->update($request->all(), $id);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->service->checkProjectOwner($id) == false) {
            return ['error' => 'Access Forbidden'];
        }         
        //return \CodeProject\Client::find($id)->delete();        
        //return Client::find($id)->delete();
        //return $this->repository->delete($id);
        $this->repository->delete($id);
    }

    /*
    private function checkProjectOwner($projectId) {
        //$projectId = $request->project;
        $userId = \Authorizer::getResourceOwnerId();  
        return $this->repository->isOwner($projectId, $userId);
            /*
            if($this->repository->isOwner($projectId, $userId) == false) {
                return ['error' => 'Access forbidden'];
            }
            */        
    /*
    } 
    private function checkProjectMember($projectId) {
        
        $userId = \Authorizer::getResourceOwnerId();  
        return $this->repository->hasMember($projectId, $userId);
    }    

    private function checkProjectPermissions($projectId) {
        if($this->checkProjectOwner($projectId) or $this->checkProjectMember($projectId)) {
            return true;
        }
        return false;
    } 
    */   
}