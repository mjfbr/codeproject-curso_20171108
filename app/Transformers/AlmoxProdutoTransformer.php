<?php

namespace CodeProject\Transformers;

use CodeProject\Entities\AlmoxProduto;
use League\Fractal\TransformerAbstract;

class AlmoxProdutoTransformer extends TransformerAbstract {

	public function transform(AlmoxProduto $almoxProduto) {
		return [
			'id' => $almoxProduto->id,
			'tipo' => $almoxProduto->tipo,
			'descricao' => $almoxProduto->descricao,			
	    	'unidade' => $almoxProduto->unidade,
	    	'proporcao' => $almoxProduto->proporcao,
	    	'valor' => $almoxProduto->valor,
	    	'tmd' => $almoxProduto->tmd,
	    	'barcode' => $almoxProduto->barcode,

		];
	}
}