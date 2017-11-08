<?php

namespace CodeProject\Http\Controllers;

//use CodeProject\Entities\Client;
use CodeProject\Repositories\ProjectRepository;
use CodeProject\Services\ProjectService;
//use CodeProject\Repositories\ClientRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

//use CodeProject\Http\Requests;
//use CodeProject\Http\Controllers\Controller;

class ProjectFileController extends Controller
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

    public function __construct(ProjectRepository $repository, ProjectService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return \CodeProject\Client::all();
        //return ClientRepositoryEloquent::all();
        //return $repository->all();
        //return $this->repository->all();
        return $this->repository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        //echo $request->name;die;
        //Storage::put($request->name.".".$extension, File::get($file)); 

        $data['file'] = $file;
        $data['extension'] = $extension;
        $data['name'] = $request->name;
        $data['project_id'] = $request->project_id;
        $data['description'] = $request->description;

        $this->service->createFile($data);  
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
        if($this->checkProjectPermissions($id) == false) {
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
        if ($this->checkProjectOwner($id) == false) {
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
        if ($this->checkProjectOwner($id) == false) {
            return ['error' => 'Access Forbidden'];
        }         
        //return \CodeProject\Client::find($id)->delete();        
        //return Client::find($id)->delete();
        return $this->repository->delete($id);
    }

    private function checkProjectOwner($projectId) {
        //$projectId = $request->project;
        $userId = \Authorizer::getResourceOwnerId();  
        return $this->repository->isOwner($projectId, $userId);
            /*
            if($this->repository->isOwner($projectId, $userId) == false) {
                return ['error' => 'Access forbidden'];
            }
            */        
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
}