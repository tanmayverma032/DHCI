<?php

if ( ! function_exists('is_user')) {

	function is_user() {

	if ( ! session()->has ('user_id')) {

		return null;
		
	} 

	 $adminModel = new \App\Models\RegistrationModel(); 
     $user = $adminModel->find_by_user_id(session()->get('user_id'));
 
	 $data = [
	 	"user" => $user, 
	 ];

	 return $data; 

 }

}
 