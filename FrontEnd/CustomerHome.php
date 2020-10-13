
<?php
    //require "CustomerLoginCheck.php";
    session_start();
    //require "footer.php";
    echo "<p style='font-size: 25px;color:hotpink; text-align:center;margin: 0 auto;'>Welcome, ".$_SESSION['username']."</p>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 10px 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
</style>
</head>
<div>
    <form action="include/CustomerLoginCheck.php" method="post">
    <button type="submit" name="logout">Logout</button>
</form>
</div>

<body>



<button class="collapsible">Account Balance</button>
    <div class="content">
        <p>Account Balance is <?php echo $_SESSION['CurrentBalance']?></p>
    </div>

    <button class="collapsible">AccountID</button>
    <div class="content">
    <p>Account ID is <?php echo $_SESSION['AccountID']?></p>
    </div>


    <button class="collapsible">Account Type</button>
    <div class="content">
    <p>Account Type is <?php echo $_SESSION['AccountTypeDescription']?></p>
    </div>

    <button class="collapsible">Account Status</button>
    <div class="content">
    <p>Account Status is <?php echo $_SESSION['AccountStatusDescription']?></p>

    </div>

    <button class="collapsible">Interest Rate</button>
    <div class="content">
    <p>Interest Rate is <?php echo $_SESSION['InterestRateValue']?></p>
    <p>And rate type is <?php echo $_SESSION['InterestRateDescription']?></p>
    </div>



<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
</body>
</html>