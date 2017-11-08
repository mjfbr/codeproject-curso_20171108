<?php

namespace CodeProject\Http\Controllers;

//use CodeProject\Entities\Client;
use CodeProject\Repositories\ProjectNoteRepository;
use CodeProject\Services\ProjectNoteService;
//use CodeProject\Repositories\ClientRepositoryEloquent;
use Illuminate\Http\Request;

//use CodeProject\Http\Requests;
//use CodeProject\Http\Controllers\Controller;

class ProjectNoteController extends Controller
{
    /**
    * @var ProjectNoteRepository
    */
    private $repository;

    /**
    * @var ProjectNoteService
    */
    private $service;

    /**
    * @param ProjectNoteRepository $repository
    * @param  ProjectNoteService $service
    */

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service) {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //return \CodeProject\Client::all();
        //return ClientRepositoryEloquent::all();
        //return $repository->all();
        //return $this->repository->all();
        return $this->repository->findWhere(['project_id' => $id]);
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
    public function show($id, $noteId)
    {
        //return \CodeProject\Client::find($id);
        //return Client::find($id);
        //return $this->repository->find($id);
        return $this->repository->findWhere(['project_id' => $id, 'id' => $noteId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    //public function update(Request $request, $id, $noteId)
    {
        return $this->service->update($request->all(), $id);
        //return $this->service->update($request->all(), $noteId);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    //public function destroy($id, $noteId)
    {
        //return \CodeProject\Client::find($id)->delete();        
        //return Client::find($id)->delete();
        //return $this->repository->delete($id);
        //return $this->repository->delete($noteId);
        if ($this->repository->delete($id)){
            return ['success' => true];
        }
    }
}