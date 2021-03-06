<?php
namespace CodeProject\Repositories;

use CodeProject\Presenters\ProjectFilePresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\ProjectFile;

/**
* Class ProjectFileRepositoryEloquent
* @package namespace CodeProject\Repositories;
*/

class ProjectFileRepositoryEloquent extends BaseRepository implements ProjectFileRepository {

    /**
    * Specify Model class name
    *
    * @return string
    */

    public function model() {

        return ProjectFile::class;
    }

    public function presenter() {

        return ProjectFilePresenter::class;
    }
}