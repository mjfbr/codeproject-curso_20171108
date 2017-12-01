<?php

namespace CodeProject\Http\Controllers;

use Illuminate\Http\Request;
use CodeProject\Http\Requests;
use CodeProject\Http\Controllers\Controller;
use CodeProject\Repositories\AlmoxProdutoRepository;
use CodeProject\Services\AlmoxProdutoService;
use CodeProject\Validators\AlmoxProdutoValidator;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class AlmoxProdutoController extends Controller
{
    private $repository;
    private $service;
    public function __construct(AlmoxProdutoRepository $repository,  AlmoxProdutoService $service) {
        $this->repository = $repository;
        $this->service = $service;
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
        //return $this->repository->findWithOwnerAndMember(\Authorizer::getResourceOwnerId());
        return $this->repository->findOwner(\Authorizer::getResourceOwnerId(),$request->query->get('limit'));
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
}
