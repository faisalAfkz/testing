<?php
    require 'header.php';
?>
<main>
<link rel="stylesheet" href="include/formstyle2.css">
<?php
if(isset($_SESSION['EmployeeIsManager']))
{
    $isManager=$_SESSION['EmployeeIsManager'];
    if(!$isManager)
    {
        header("Location: Menu.php?not_manager");
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

    <div id="editForm2">
        <h2>Search for Transaction Log</h2>
        <form action="include/TransactionLog.php" method="post">
        <input type="number" name="TransactionID" placeholder="TransactionID">
</div>
<div id="editForm2">
        <button type="submit" class="registerbtn" name="search">Search</button>
        </form>
    </div>

    <div id="editForm2">
        <h2>Carry out Transaction</h2><br>
        <form action="include/TransactionPush.php" method="post">
        <label for="TransactionTypeID">Transaction Type</label>
        <select id="TransactionTypeID" name="TransactionTypeID">
          <option value="1">Deposit</option>
          <option value="2">Withdraw</option>
          <option value="3">Loan</option>
        </select>
        <br><br>
</div>
<div id="editForm2">
        <input type="number" step="0.01" min="0" max="10000000000" name="TransactionAmount" placeholder="TransactionAmount">
</div>
<div id="editForm2">
        <input type="number" name="AccountID" placeholder="AccountID">
    </div>
    <div id="editForm2">
        <button type="submit" class="registerbtn" name="push">Execute</button>
        </form>
    </div>

<?php
    //require "footer.php";
?>