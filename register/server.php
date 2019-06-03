<?php 
	session_start();

	// variable declaration
	$id="";
	$name = "";
	$mobilenumber = "";
	$team = "";
	$profilepic = "";
	$Status = "";
	$username = "";
	$email    = "";
	
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');
	
	//$con = mysqli_connect("localhost","my_user","my_password","my_db");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$name = $_POST['name'];
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$mobilenumber = $_POST['mobilenumber'];
		if (isset($_POST['team'])) {
			$team = $_POST['team'];
		}
		
		if (isset($_POST['status'])) {
			$status = $_POST['status'];
		}
		
		/**if (isset($_POST['profilepic'])) {
			$profilepic = $_POST['profilepic'];
		}**/
		
		
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database

			
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
 $file_path = "http://localhost/register/".$target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$imageFileType;
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["profilepic"]["tmp_name"]);
     if($check !== false) {
         echo "File is an image - " . $check["mime"] . ".";
         $uploadOk = 1;
     } else {
         echo "File is not an image.";
         $uploadOk = 0;
     }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
 if ($_FILES["profilepic"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
 }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["profilepic"]["name"]). " has been uploaded." . $target_file;
        
         $query = "INSERT INTO users (name,username,email,password,mobilenumber,team,status,profilepic) VALUES('$name','$username','$email','$password','$mobilenumber','$team','$status','$file_path')";
   			
        mysqli_query($db, $query);
	 
			$_SESSION['username'] = $username;
		
		
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
			
			 

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
			
			
			
			
			
		 
		}

	}

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
			$sqll=mysqli_fetch_array($results);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['email'] = $sqll['email'];
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>