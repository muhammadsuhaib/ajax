
<?php
include 'config.php';


    $username = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $password = md5($password);
$check = "SELECT `email` FROM `users` WHERE `email` = '".$_POST['email']."'";

$result = $conn->query($check);

if($result ->num_rows)
{

    echo "Email already exists in our database.";

}
else
{
    $sql = "insert into users(user_name,email,password) values ('$username','$email','$password')";
    $result = $conn->query($sql);

    if ($result) {
        echo " Successfully Data Insert";
    }


     else
 {

     echo "error" . $conn->error();
 }

}



?>
