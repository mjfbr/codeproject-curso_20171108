<?php

namespace CodeProject\Services;

use CodeProject\Repositories\AlmoxProdutoRepository;
use CodeProject\Validators\AlmoxProdutoValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class AlmoxProdutoService {
    
	protected $repository;
    protected $validator;
    public function __construct(AlmoxProdutoRepository $repository, AlmoxProdutoValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }
    
    public function create(array $data)
    {
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        }
        catch(ValidatorException $e){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }
    public function update(array $data, $id)
    {
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        }
        catch(ValidatorException $e){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function checkProjectMember($projectId) {        
        $userId = \Authorizer::getResourceOwnerId();  
        return $this->repository->hasMember($projectId, $userId);
    } 

    public function checkProjectPermissions($projectId) {       
        if($this->checkProjectOwner($projectId) or $this->checkProjectMember($projectId)) {
            return true;
        }
        return false;
    }
}