<?php










$conn = mysqli_connect('localhost', 'root', '', 'todop');
$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];


$query = "UPDATE `top` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email' WHERE `top`.`id` = '$id'";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "Data Successfully Updated";
}
?>
<div>

    <button><a href="index1.php" class="btn btn-primary">Go to Main page</button> </td>