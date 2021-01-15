<?php
session_start(); 

$con = mysqli_connect("localhost:3308","root","","userdb");

//NOW SELECT DATABASE
mysqli_select_db($con,'userdb');

         
         $email = $_POST['email']; 
         $name = $_POST['name']; 
         $weight = $_POST['weight'];
         $height = $_POST['height'];
         $age = $_POST['age'];
         $gender = $_POST['gender'];
         $password = $_POST['psw'];
         $repeat_password = $_POST['psw2'];

  if($password == $repeat_password) 
  {      

// this is for querry to recheck data from database, it shoudnt be similar
 $q = "select * from users where email = '$email' ";     //&& Email = '$email'
// storing querry result
 $result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1)
{
	echo " You have been already registered with this email, goto the signin page.";
}
else
{
	$qy = " insert into users(email, name, weight, height, age, gender, password, repeat_password) values ('$email', '$name', '$weight', '$height', '$age', '$gender', '$password', '$repeat_password')" ;

	mysqli_query($con, $qy);

   echo"You have been succesfully registered, Click here to login";
   str_repeat('&nbsp;',4);
   echo("<button onclick=\"location.href='loginwamp.html'\">Log In</button>");
}

}
else {
   echo" Password doesn't matched re-enter the correct password.";
}


?>