<?php
class TaskModel extends Model{
	
	public function Index(){
		$this->query('SELECT * FROM tasks ');
		$rows = $this->resultSet();
		return $rows;
	}

	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$this->query("SELECT * FROM categories");
		$rows = $this->resultSet();

		if($post['submit']){
			// Insert into MySQL
			$this->query('INSERT INTO tasks (title, description, category) VALUES(:title, :description, :category)');
			$this->bind(':title', $post['title']);
			$this->bind(':description', $post['description']);
			$this->bind(':category', $post['category']);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'tasks');
			}

			
		}
		return $rows;
	}
}
