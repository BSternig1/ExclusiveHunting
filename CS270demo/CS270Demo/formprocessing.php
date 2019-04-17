<!DOCTYPE html>
<html>
<head>
    <title>Form Processing</title>
</head>
    <body>
        <h1>User Information</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <label>Name</label>
            <input type="text" name="username" />
            <br>
            <label>ZipCode</label>
            <input type="number" name="zip" />
            <br>
            <input type="color" name="favcolor"/>
            <br><br>
            <input type="submit"/>
        </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user = ($_POST['username']);
                $col = ($_POST['favcolor']);
                echo "<h3 style=color:$col>Welcome $user</h3>";
            }
        ?>
    </body>


</html>