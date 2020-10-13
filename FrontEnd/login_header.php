<php?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="include/formstyle2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="include/styles.css">
</head>
<body>
    <header>
        <nav id="editForm2">
            <a href='#'>
                <img src="icon.png" alt="icon">
            </a>
        <div>
            <form action="include/Accountlogin.php" method="post">
                <input type="number" name="EmployeeID" placeholder="EmployeeID">
                <input type="password" name="Password" placeholder="Password">
            <button class="registerbtn" type="submit" name="Account_Login_btn">Login</button>
            </form>
        </div>

        <div>
            <a href="CustomerLogin.php">Not an employee?Visit the Customer page</a>
    </nav>
    </header>


</body>
</html>
