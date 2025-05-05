<?php
session_start();
//Username and password set as we could not figure out how to make profiles
$Username = "Alex";
$Password = "123";

//Function that checks the Usernmae and password are correct 
if( ($_POST['Username'] == $Username) && ($_POST['Password'] ==
$Password) )
{
    echo 'sucess';
    $_SESSION['Username'] = $Username;//Ensures username is stored in the session
    $_SESSION['Active'] = true; 
header("location:upcomingfixtures.php"); /* Redirects to recent fixtures  */
exit; 

}
else
echo 'Incorrect Username or Password';//If the username or password are incorrect rejects and prints so user knows what happened
