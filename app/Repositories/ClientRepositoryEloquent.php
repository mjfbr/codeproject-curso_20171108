<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Repositories;
use CodeProject\Entities\Client;
use CodeProject\Presenters\ClientPresenter;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository {

	protected $fieldSearchable =[
		'name'
	];

	public function model() {
		//return \CodeProject\Entities\Client::class;
		return Client::class;
	}

	public function presenter() {
		return ClientPresenter::class;
	}

	public function boot(){
		$this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
	}
}