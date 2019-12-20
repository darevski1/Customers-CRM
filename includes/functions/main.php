<?php 
 
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 // Load Composer's autoloader
 require '../resources/vendor/autoload.php';

class DataManager extends Database {

public function getData($table){
		   $sql   = "SELECT * FROM " .$table;
		   $array = [];
		   $query = mysqli_query($this->conn, $sql);
		   while ($row = mysqli_fetch_assoc($query)) {
		      $array[] = $row;
		   }
		   return $array;
		}
public function carmodel(){


}
public function getId($table, $id){

	if(isset($_GET['user_id'])){
		$id = $_GET['user_id'];
		
		
        $sql = "SELECT * FROM " . $table;
        $sql .= " WHERE user_id = '{$id}'";
        $array = [];
		$query = mysqli_query($this->conn, $sql);
		
        while($row = mysqli_fetch_array($query)){
			$array[] = $row;
		}
		return $array;
 
	}
}


public function randName() { 

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	$randomString = ''; 
	$n = 7;
  
    for ($i = 0; $i < $n; $i++) { 

        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 
public function randUid(){

	$rand = rand();
	$somestring = $rand . "" . date('d');
	$randkey = md5($somestring);

	return $randkey;

}
public function gmm(){
	if(isset($_GET['user_id'])){

		$user_id = $_GET['user_id'];

		echo
			"<script>
				alert('$user_id');
			</script>";
	
	}

		
}
function clear_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
/**
 *  @ update user status 
 * 
 * */ 

 public function addContract(){
	 
	$firstname  = $_POST['user_firstname'];
	$lastname   = $_POST['user_lastname'];
	$adress 	= $_POST['user_adress'];
	$plate 		= $_POST['user_plate'];
	$phone 		= $_POST['user_phone'];
	$email 		= $_POST['user_email'];
	$car 		= $_POST['user_car'];
	$carmodel   = $_POST['user_carmodel'];
	$sektor		= $_POST['user_sektor'];
	$ppk 		= $_POST['user_ppk'];
	$createdBy 	= rand(9, 60);


	$sql = "INSERT INTO dogovori (user_firstname, user_lastname, user_adress, user_plate, user_phone, user_email, user_car, user_carmodel, user_sektor, user_ppk, user_created) 
	VALUES ('{$firstname}', '{$lastname}', '{$adress}', '{$plate}', '{$phone}', '{$email}', '{$car}', '{$carmodel}', '{$sektor}', '{$ppk}', '{$createdBy}')";

	$query = mysqli_query($this->conn, $sql);


	if($query){
		echo "<div class='alert alert-success' role='alert'>
				Успешно додаден нов корисник
			  </div>";

		header('Location: c=all');	  
	}else{
		echo "Greskaaa " . mysqli_error($this->conn);
	}




 }
/**
 *  @ update user status 
 * 
 * */

 

public function update_status($table){

	if (isset($_POST['user_id'])) {

	    $user_id = $_POST['user_id'];

		$error = false;
		$msg = "";
		
		$userstatus = $_POST['userstatus'];
		
		$sql = "UPDATE $table SET userstatus = '{$userstatus}' WHERE user_id = '{$user_id}'";
		$query = mysqli_query($this->conn, $sql);

		if($query){
			$error = true;
			$msg =  "<div class='alert alert-danger' role='alert'>
						Успешно деактивиран
					</div>";
		}else {
			die("Erorrrce " . mysqli_error($this->conn));
	
		}
	

	}	
}
/**
 * 
 *  This method is updating user profile atrr...
 * 
 */
public function updateUser(){

	if (isset($_GET['user_id'])) {

		$user_id = $_GET['user_id'];
		$first_name  = $_POST['first_name'];
		$last_name  = $_POST['last_name'];
		$email  = $_POST['email'];
		$user_role  = $_POST['user_role'];

		$sql = "UPDATE users set first_name = '{$first_name}', last_name = '{$last_name}', email = '{$email}',  user_role = '{$user_role}' WHERE user_id = '{$user_id}'";
		$query = mysqli_query($this->conn, $sql);

		if($query){
			header( "refresh:3; url=c=users" );
			echo  "<div class='alert alert-success' role='alert'>
						Успешно се зачувани промените, автоматски ќе бидете пренасочени за 3 секунди...
			 		</div>";
		}else {
			die("Error " . mysqli_error($this->conn));
	
		}
		return $query;

}

}
/**
 * Function add new userq
 * 
 */
public function addUser(){

	$first_name = $_POST['first_name'];
	$last_name = $this->clear_input($_POST['last_name']);
	$email = $_POST['email'];
	$user_role = $_POST['user_role'];
	$generatepass = "password";
	$password = password_hash($generatepass, PASSWORD_DEFAULT);
	$userstatus = 1;
	$useruid = md5(rand() . "-" . rand());
	$date_created = date("d-m-y");


	$sql = "INSERT INTO users (first_name, last_name, email, user_role, password, date_created, userstatus, useruid) 
	VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$user_role}', '{$password}', '{$date_created}', '{$userstatus}', '{$useruid}')";
	$query = mysqli_query($this->conn, $sql);

	if($query){
		echo "<div class='alert alert-success' role='alert'>
				Успешно додаден нов корисник
			  </div>";
		echo $passwordsee = $generatepass;

		/**
		 * Instantiation and passing `true` enables exceptions
		 * If new user is inserted mail is sent
		 * 
		 */
	
	 $mail = new PHPMailer(true);

	 try {
		 //Server settings
		 //$mail->SMTPDebug = 2;                                       // Enable verbose debug output
		 $mail->isSMTP();                                            // Set mailer to use SMTP
		 $mail->Host       = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
		 $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		 $mail->Username   = 'fd0abdddfe881a';                     // SMTP username
		 $mail->Password   = '735e03394a41c5';                               // SMTP password
		 $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
		 $mail->Port       = 25;                                    // TCP port to connect to

		 //Recipients
		 $mail->setFrom('darevski888@gmail.com', 'Mailer');
		 $mail->addAddress('darevski1@gmail.com', 'Joe User');     // Add a recipient
 

		 // Content
		 $mail->isHTML(true);                                  // Set email format to HTML
		 $mail->Subject = 'Nov korisnik na POC - CMS';
		 $mail->Body    = 'Pocituvani,' . '<br/>';
		 $mail->Body   .= ' uspesno e kreiran profil,' . '<br/>';
		 $mail->Body   .= 'moze da se najavite vo sistemot vasta lozinka,' . '<br/>';
		 $mail->Body   .= ' e'  ." ". $passwordsee . '<br/>';
		 $mail->Body   .= ' zadolzitelno da se promeni'. '<br/>';
		 $mail->Body   .= 'So pocit';
		 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		 $mail->send();
		 echo 'Message has been sent';
	 } catch (Exception $e) {
		 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	 }
	}else {
		die("Error " . mysqli_error($this->conn));

	}

	return $query;




}


public function login($email, $password){
 
	$email = clear_input($email);
	$password = clear_input($password);


	
	
}
/**
 * Join  tables - with arguments
 */
public function getTables($t1, $t2, $t3, $t4, $t5, $t6){
	$limit = 10; 
	

	$sql = "SELECT dogovori.user_firstname, dogovori.user_lastname, dogovori.user_adress, dogovori.user_plate,
	dogovori.user_phone, dogovori.user_email, dogovori.user_car, 
	dogovori.user_carmodel, dogovori.user_sektor, dogovori.user_ppk, dogovori.user_created, ";

	$sql .= "car_brand.car_id, car_brand.car_name, "; 
	$sql .= "car_model.model_id, car_model.model_name, car_model.model_id, ";
	$sql .= "zona.zona_id, zona.zona, ";
	$sql .= "ppk.ppk_id, ppk.ppk, ";
	$sql .= "users.user_id, users.first_name, users.last_name";


	$sql .= " FROM $t1 ";
	$sql .= " INNER JOIN $t2 ON dogovori.user_car = car_brand.car_id";	
	$sql .= " INNER JOIN $t3 ON dogovori.user_carmodel = car_model.model_id";	
	$sql .= " INNER JOIN $t4 ON dogovori.user_sektor = zona.zona_id";	
	$sql .= " INNER JOIN $t5 ON dogovori.user_ppk = ppk.ppk_id";	
	$sql .= " INNER JOIN $t6 ON dogovori.user_created = users.user_id";
	$sql .= " LIMIT $limit";

	
	$array = [];
	$query = mysqli_query($this->conn, $sql) or die( mysqli_error($this->conn));
	while ($row = mysqli_fetch_array($query)) {
	   $array[] = $row;
	}
	return $array;
}


}
	$obj = new DataManager();

	// if (isset($_POST['submit'])) {
	// 	$myArray = array(
	// 		'user_firstname'   => $_POST['user_firstname'],
	// 		'user_lastname'    => $_POST['user_lastname'],
	// 		'user_adress' 	   => $_POST['user_adress'],
	// 		'user_plate'	   => $_POST['user_plate'],
	// 		'user_phone'	   => $_POST['user_phone'],
	// 		'user_email' 	   => $_POST['user_email'],
	// 		'user_car'         => $_POST['user_car'],
	// 		'user_carmodel'    => $_POST['user_carmodel'],
	// 		'user_sektor'      => $_POST['user_sektor'],
	// 		'user_ppk'         => $_POST['user_ppk']
	// 	);
		
	// 	if($obj->InsertRecord('dogovoriovori', $myArray)){
	// 			header("Location: index.php");
	// 	}


	// }

