<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


class AlmoxProduto extends Model
{
    use TransformableTrait;
	protected $table = 'crm_almox_produto';
    protected $fillable = [
        'id',
    	'tipo',
    	'descricao',
    	'unidade',
    	'proporcao',
    	'valor',
    	'tmd',
        'owner_id',
    	'barcode'
    ];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function notes() {
        return $this->hasMany(ProjectNotes::class);
    }

    public function members() {
        return $this->belongsToMany(User::class, 'project_members', 'project_id', 'member_id');
    }

    public function files() {
        return $this->hasMany(ProjectFile::class);
    }
    public function tasks()
    {
        return $this->hasMany(ProjectTask::class);
    }

}