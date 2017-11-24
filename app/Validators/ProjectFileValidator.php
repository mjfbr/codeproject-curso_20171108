<?php

namespace CodeProject\Validators;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class ProjectFileValidator extends LaravelValidator {

	protected $rules = [
		ValidatorInterface::RULE_CREATE => [
			'name' => 'required',
			'file' => 'required|mimes:jpeg,jpg,png,gif,pdf,zip,doc,docx,rar,txt',
			'description' => 'required',
		],
		ValidatorInterface::RULE_UPDATE => [
			'name' => 'required',
			'description' => 'required',
		]
	];
}
	/*
	protected $rules =  [
		'project_id' => 'required',
		'name' => 'required',
		'file' => 'required | mimes:jpeg,jpg,png,gif,pdf,zip',
		'description' => 'required'
	];
	*/
