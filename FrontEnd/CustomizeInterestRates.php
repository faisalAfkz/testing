<?php
    //require '../header.php';

?>

<main>
    <head>
    <link rel="stylesheet" href="formstyle.css">
</head>
    <div>
        <h2>Edit Interest Savings Rates</h2>
        <form action="include/InterestRate.php" method="post">
        <input type="number" name="InterestSavingsRateID" placeholder="InterestSavingsRateID">
        <input type="number" step="0.01" name="InterestRateValue" placeholder="InterestRateValue" min="0" max="100">
        <input type="name" name="InterestRateDescription" placeholder="InterestRateDescription">
        <button type="submit" class="registerbtn" name="ratechange">Change</button>
        </form>
    </div>

</main>

