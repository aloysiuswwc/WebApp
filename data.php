<!--
 * File : data.php
 * Developer : Agney Patel
 * Website : www.agney.vishwasetu.com
 * Copyright © Agney Patel 2016
 -->
 <?php
$conn = new mysqli("localhost", "student", "student", "db");

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$age = $_POST['age'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$comment = htmlspecialchars($_POST['comment']);
$stmt = $conn->prepare("INSERT INTO userdata (firstname,lastname,email, password, age,phone,gender,dob,comment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt -> bind_param("sssssssss", $firstname, $lastname, $email, $password, $age, $phone, $gender, $dob, $comment);
$stmt -> execute();

mysqli_close($conn);

echo "<h2>Details added. Thanks !</h2>"

?>