<?php

namespace CodeProject\Http\Controllers;

//use CodeProject\Entities\Client;
use CodeProject\Repositories\ClientRepository;
use CodeProject\Services\ClientService;
//use CodeProject\Repositories\ClientRepositoryEloquent;
use Illuminate\Http\Request;

//use CodeProject\Http\Requests;
//use CodeProject\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
    * @var ClientRepository
    */
    private $repository;

    /**
    * @var ClientService
    */
    private $service;

    /**
    * @param ClientRepository $repository
    * @param  ClientService $service
    */

    public function __construct(ClientRepository $repository, ClientService $service) {
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
        return $this->repository->all();
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
        //return \CodeProject\Client::find($id)->delete();        
        //return Client::find($id)->delete();
        //return $this->repository->delete($id);
        $this->repository->skipPresenter()->find($id)->delete();
    }
}