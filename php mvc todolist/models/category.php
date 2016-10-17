<?php
class CategoryModel extends Model{
	
	public function Index(){
		$this->query('SELECT * FROM categories ');
		$rows = $this->resultSet();
		return $rows;
	}

	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){
			// Insert into MySQL
			$this->query('INSERT INTO categories (title) VALUES(:title)');
			$this->bind(':title', $post['title']);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'categories');
			}
		}
		return;
	}
}