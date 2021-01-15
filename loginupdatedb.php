<?php 

  $con = mysqli_connect("localhost:3308","root","","userdb");
 // remove this if it doent work
   if( isset($_POST['email']) || isset($_POST['psw']) ) 
   {
  $email = $_POST['email'];
  $name = $_POST['name'];
  $password = $_POST['psw'];
   }  

  $email= stripcslashes($email);
  $name= stripcslashes($name);
  $password= stripcslashes($password);

  $email= mysqli_real_escape_string($con, $email);
  $name= mysqli_real_escape_string($con, $name);

  $password= mysqli_real_escape_string($con, $password);

  $result= mysqli_query($con, "select * from users where email = '$email' and password ='$password'") or die("failed to con db" .mysql_error());   

	$row= mysqli_fetch_array($result);
  if ($row['email'] == $email && $row['password'] == $password ) {


    //$_SESSION['name'] = $name;
    //print  "<h1>Welcome To The Registered Page</h1>".$name;
    //print  "<h1>" . $name . "</h1>" ;

    //echo" <h1>WELCOME</h1> ".$name;
    header('Location: userdetails.php');

     } 
  else {
	echo"Enter Correct Details";
     }

     

     ?>