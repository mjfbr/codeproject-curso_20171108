<?php

namespace CodeProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Repositories;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeProject\Entities\AlmoxProduto;
use CodeProject\Presenters\AlmoxProdutoPresenter;

class AlmoxProdutoRepositoryEloquent extends BaseRepository implements AlmoxProdutoRepository {

	public function model() {
		//return \CodeProject\Entities\Client::class;
		return AlmoxProduto::class;
	}

	public function presenter() {
		return AlmoxProdutoPresenter::class;
	}

	public function boot(){
		$this->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
	}

	public function findOwner($userId, $limit = null, $columns = array()) {
        return $this->scopeQuery(function($query) use($userId) {
            return $query->select('crm_almox_produto.*')
                ->orderBy('id', 'DESC');
        })->paginate($limit, $columns);
    }
}