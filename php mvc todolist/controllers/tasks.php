<?php
class Tasks extends Controller{
	protected function Index(){
		$viewmodel = new TaskModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function add(){
		$viewmodel = new TaskModel();
		$this->returnView($viewmodel->add(), true);
	}
}