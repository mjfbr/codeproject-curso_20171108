<?php

namespace CodeProject\Validators;

use \Prettus\Validator\LaravelValidator;

class AlmoxProdutoValidator extends LaravelValidator
{
    protected $rules = [	
		'descricao' => 'required', 
   ];
}