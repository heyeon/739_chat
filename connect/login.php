<?php
include('library.php');
session_start();
if (!sessionCheck())
{
$conn = connect();
echo $_POST['password'];
echo $_POST['handle'];
$result = login($conn,$_POST);
return 0;
}
else{
onLogOutSuccess();
header("Location: index.php");
return 0;
}




?>


