<body>
    <div class="heading center">
        <h2>ToDo List App</h2>
    </div>

    <form action="index.php" method="post">

        <?php if (isset($errors)) { ?>
            <p><?php echo $errors;  ?></p>
        <?php } ?>
        <input type="text" name="task" class="task_input" id="task">
        <button type="submit" class="btn" name="submit">Add Task</button>
    </form>