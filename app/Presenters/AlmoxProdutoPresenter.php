<?php 

namespace CodeProject\Presenters;

use CodeProject\Transformers\AlmoxProdutoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class AlmoxProdutoPresenter extends FractalPresenter {

	public function getTransformer() {
		return new AlmoxProdutoTransformer();
	}
}