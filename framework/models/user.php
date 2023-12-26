<?php

	class UserModel extends Model{

		
		public function register(){
				
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			if(isset($post['submit'])){

				if ($post['name'] == '' || $post['email'] == ''  || $post['password'] == '' ) {

				Messages::setMsg('Please fill in all fields' , 'error');
				//return;

				}else{

					// Insert into MySQL
				$this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
				$this->bind(':name', $post['name']);
				$this->bind(':email', $post['email']);
				//$this->bind(':password', $password);
				$this->bind(':password', md5($post['password']));
				$this->execute();
				// Verify
						if($this->lastInsertId()){
							// Redirect
							header('Location: ' . ROOT_URL . 'users/login');
						}
			} // end if	
				
			return;
 
			}	// end if	

		} // ends register function

		public function login(){

			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			if(isset($post['submit'])){
				// compare login
				$this->query('SELECT * FROM users WHERE email = :email AND password = :password');
				$this->bind(':email', $post['email']);
				//$this->bind(':password', $password);
				$this->bind(':password', md5($post['password']));
				
				$row = $this->single();

				if ($row) {
					$_SESSION['is_logged_in'] = true;
					$_SESSION['user_data'] = array(

						"id"    =>  $row['id'],
						"name"  =>  $row['name'],
						"email" =>  $row['email']
					);
					header('Location: ' . ROOT_URL . 'posts');
				}else{
					Messages::setMsg('Incorrect Login' , 'error');
				}
			}	
				
			return;
		}
		
	}