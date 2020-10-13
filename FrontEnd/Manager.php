<?php
    require 'header.php';
?>

<main>
    <head>
    <link rel="stylesheet" href="include/linkstyle.css">
</head>
<?php
if(isset($_SESSION['EmployeeIsManager']))
{
    $isManager=$_SESSION['EmployeeIsManager'];
    if(!$isManager)
    {
        header("Location: Menu.php?not Manager!");
        exit();
        echo 'You do not have permission to enter this page';
    }
    else
    {
        
    }
}
else
{
    echo '<p>Please Log in</p>';
}
?>
</main>

<section>
<form action="include/ManagerOptions.php" method="post">

    <a id="links" href="include/ManagerOptions.php">Create or Edit Employee Information</a>
    <a id="links" href="CustomizeInterestRates.php">Customize Interest Rates</a>
    
</form>
</section>

<?php
    //require "footer.php";
?>