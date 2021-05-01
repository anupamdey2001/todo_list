<?php
//connect database
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

if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
    mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
    header('Location: index.php');
}

$tasks = mysqli_query($db, "SELECT * FROM tasks"); //or die(mysqli_error($db));
// $row = mysqli_fetch_array($tasks);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,200;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&display=swap" rel="stylesheet">    <link rel="stylesheet" href="css/style.css">
    <title>ToDo List</title>
</head>

<body>
    <div class="heading center">
        <h2>ToDo List Application using PHP and MySQL</h2>
    </div>


    <form action="index.php" method="post">

        <?php if (isset($errors)) { ?>
            <p><?php echo $errors;  ?></p>
        <?php } ?>
        <input type="text" name="task" class="task_input" id="task">
        <button type="submit" class="btn" name="submit">Add Task</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>N</th>
                <th>Task</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            while ($row = mysqli_fetch_array($tasks)) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td class="task"><?php echo $row['task']; ?></td>
                    <td class="delete"> <a href="index.php?del_task=<?php echo $row['id']; ?>">x</a> </td>
                </tr>
            <?php $i++;
            } ?>

        </tbody>
    </table>
</body>

</html>