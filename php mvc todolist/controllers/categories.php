<?php
class Categories extends Controller{
	protected function Index(){
		$viewmodel = new CategoryModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function add(){
		$viewmodel = new CategoryModel();
		$this->returnView($viewmodel->add(), true);
	}
}