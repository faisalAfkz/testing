
<?php
session_start();
?>


<main>
<?php
if(isset($_SESSION['username']))
{
    header("Location: CustomerHome.php?login=1");
    exit();
}
else
{
    echo '<p>Please Log in</p>';
}
?>
</main>

<?php
    //require "footer.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="include/styles.css">
    <link rel="stylesheet" href="include/formstyle2.css">
</head>
<body>
    <header>
        <nav id="editForm2">
            <a href='#'>
                <img src="icon.png" alt="icon">
            </a>
        <div>
            <form action="include/CustomerLoginCheck.php" method="post">
                <input type="name" name="username" placeholder="username">
                <input type="password" name="Password" placeholder="Password">
            <button class="registerbtn" type="submit" name="login">Login</button>
            </form>
        </div>

        <div>
        <a style href="index.php">Not a Customer?Visit the Employee page</a>
    </div>
    </nav>
    </header>


</body>
</html>
