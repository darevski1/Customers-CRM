<?php 
    require '../resources/vendor/autoload.php';

class User extends Database{


 
 
    public function loginUser()
    {
       
        $error = false;
        $message = "";

        $username =  $_POST['email'];
        $user_password = $_POST['password'];

        $db_password ="";


         // check if the username is set
        if (isset($_POST['email']) && !empty($_POST['email']) != '') {
            $username = $_POST['email'];
        }else {
            $error = true;
            $message .= " Missing email . <br />";
        }
      

        if (isset($_POST['password']) && !empty($_POST['password']) !='') {
            $user_password = $_POST['password'];
        }
        else{
            $error = true;
            $message .= " Missing password . <br />";
        }

        if($error){
            echo $message;
        }else {
             $query = "SELECT * FROM users WHERE email = '{$username}'";
             $select_query = mysqli_query($this->conn, $query);
        }
        if(!$select_query){
            die("Errorr" . mysqli_error($this->conn));
        }
        while($row = mysqli_fetch_array($select_query)){
            $first_name     = $row['first_name'];
            $last_name      = $row['last_name'];
            $email          = $row['email'];
            $db_password    = $row['password'];
            $userstatus     = $row['userstatus'];
        }
        
        if(password_verify($user_password,  $db_password)){
            
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name']  = $last_name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['userstatus'] = $userstatus;

            header('Location: c=users');
        }else{ 
            echo '<script>
            alert("Неваилдно корисничко име или лозинка! Пробајте повторно.");
        </script>';

        }
       

 


    }

}
$object = new User();