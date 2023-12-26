<?php
class PostModel extends Model{
	public function Index(){
		$this->query('SELECT * FROM posts');
		$rows = $this->resultSet();
		return $rows;
	}

	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){

			if ($post['title'] == '' || $post['body'] == ''  || $post['link'] == '' ) {

				Messages::setMsg('Please fill in all fields' , 'error');
				return;

			}

			// Insert into MySQL
			$this->query('INSERT INTO posts (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->bind(':user_id', 1);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: ' . ROOT_URL . 'posts');
			}
		}
		return;
	}

	public function show($id){	
		$this->query('SELECT * FROM posts WHERE id ='. $id);
		$item = $this->single();
		return $item;
	}

	public function edit($id){
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if (isset($post['submit'])) {
			if ($post['title'] == '' || $post['body'] == ''  || $post['link'] == '' ) {
				Messages::setMsg('Please fill in all fields' , 'error');
				return;
			}
			$this->query('UPDATE posts SET title = :title, body = :body, link = :link  WHERE id = ' . $id);
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->execute();
			header('Location: ' . ROOT_URL . 'posts');
		}else{
			$this->query('SELECT * FROM posts WHERE id ='. $id);
			$item = $this->single();
			return $item;
		}
		
	}

	public function delete($id){
		$this->query('DELETE FROM posts WHERE id = ' . $id);
		$this->execute();
		header('Location: ' . ROOT_URL . 'posts');
	}

}