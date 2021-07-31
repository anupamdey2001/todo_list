<?php
$db = mysqli_connect('localhost', 'root', '', 'todolist'); //or die(mysqli_error($db));
$errors = "";
if (isset($_POST['submit'])) {
    $Task = $_POST['task'];
    if (empty($Task)) {
        $errors = "Please Fill the Tasks";
    } else {
        mysqli_query($db, "INSERT INTO taskS (task) VALUES ('$Task')"); //or die(mysqli_error($db));
        header('Location: index.php');
    }
}
?>