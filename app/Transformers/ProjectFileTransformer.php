<?php

namespace CodeProject\Transformers;

use CodeProject\Entities\ProjectFile;
use League\Fractal\TransformerAbstract;

class ProjectFileTransformer extends TransformerAbstract {

	public function transform(ProjectFile $o) {

		return [
			'id' => $o->id,
			'name' => $o->name,
			'extension' => $o->extension,
			'description' => $o->description,
			'project_id' => $o->project_id
		];
	}
}