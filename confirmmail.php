<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
    include 'db.php';
    if (isset($_GET['otp'])) {
      $otp = $_GET['otp'];
      $query = "SELECT * FROM users WHERE otp='$otp'";
			$result = $con->query($query);
			if ($result->num_rows > 0) {
  
        session_start();
        $value = mysqli_fetch_array($result);
        $userid = $value['id'];
        $sql = "UPDATE users  
        SET
        auth_check       = 1
        WHERE id=$userid";
        $con->query($sql);
				//session_destroy();
				$_SESSION['name'] = $value['name'];
				$_SESSION['email'] = $value['email'];
				$_SESSION['phone'] = $value['phone'];
				$_SESSION['active'] = "active";
				$_SESSION['id'] = $value['id'];
				$_SESSION['flag'] = $value['flag'];
					header('Location:index.php');
		
 

       }
    }else{
      // header('Location:login.php');
    }
  ?>
  
</body>
</html>