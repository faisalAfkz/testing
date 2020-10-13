<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="include/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 15%;
            background:black;
        }
</style>
</head>
<body>
    <header>
        <nav class="topnav">
             <a href="Menu.php">Home</a>
             <a href="Customers.php">Customers</a>
             <a href="CreateCustomer.php">New Customer Account</a>
             <a href="Manager.php">Manager</a>
             <a href="Transactions.php">Transaction Log</a>
    </nav>
    </header>
    <nav>
    <div class="topnav">
            <?php
                if(isset($_SESSION['FirstName']))
                {
                    echo '<form action="include/logout.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button>
                    </form>';
                }
                else
                {
                    header("Location: index.php?login=0");
                }
            ?>
        </div>
    <a href='Menu.php'>
                <img style="margin-bottom: 30px; margin-top: 15px;" src="icon.png" alt="icon">
            </a>
    </nav>


</body>
</html>
