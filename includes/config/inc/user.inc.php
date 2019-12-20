<?php 


    class Users{

    	public static function allUsers(){
			global $database;
			
	 		return self::get_query('SELECT * FROM users');

    	}

      
 

    }
        
       