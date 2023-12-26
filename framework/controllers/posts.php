<?php
class Posts extends Controller{
	protected function Index(){
		$viewmodel = new PostModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function add(){
		if (!isset($_SESSION['is_logged_in'])) {
			header('Location: ' . ROOT_URL . 'posts');
		}
		$viewmodel = new PostModel();
		$this->returnView($viewmodel->add(), true);
	}

	protected function show(){
		$viewmodel = new PostModel();
		$this->returnView($viewmodel->show($this->id()), true);
	}

	protected function edit(){
		$viewmodel = new PostModel();
		$this->returnView($viewmodel->edit($this->id()), true);
	}

	protected function delete(){
		$viewmodel = new PostModel();
		$this->returnView($viewmodel->delete($this->id()), true);
	}

}


	 
		
	