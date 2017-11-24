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
    public function store(Request $request, $id)
    {
        //return \CodeProject\Client::create($request->all());
        //return Client::create($request->all());
        //return $this->repository->create($request->all());
        //return $this->service->create($request->all());
        $data = $request->all();
        $data['project_id'] = $id;
        return $this->service->create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $idNote)
    {
        //return \CodeProject\Client::find($id);
        //return Client::find($id);
        //return $this->repository->find($id);
        //return $this->repository->findWhere(['project_id' => $id, 'id' => $noteId]);
        $result = $this->repository->findWhere(['project_id' => $id, 'id' => $idNote]);
        if (isset($result['data']) && count($result['data']) === 1) {
            $result = [
                'data' => $result['data'][0]
            ];
        }
        return $result;        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $noteId)
    {
        $data = $request->all();
        $data['project_id'] = $id;
        return $this->service->update($data, $noteId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $noteId)
    {
        //return \CodeProject\Client::find($id)->delete();        
        //return Client::find($id)->delete();
        //return $this->repository->delete($noteId);        
        /*
        if($this->repository->delete($id)) {
            return ['success' => true];
        }
        */
        $this->repository->delete($noteId);
    }
}