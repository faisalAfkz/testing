<?php
    require "header.php";
?>

<main>
    <head>
    <link rel="stylesheet" href="include/formstyle2.css">
    </head>
    <section id="editForm2">
        <h2>Set Account Information</h2>
        <form id="editForm3" action="Include/CreateCustomerAccount.php"method="post">
        <section id="editForm2">
        <input type="number" name="AccountID" placeholder="AccountID(*)">
        <input type="number" name="CurrentBalance" placeholder="Current Balance">
</section>

        <label for="AccountTypeID">Choose account type:</label>
        <select id="AccountTypeID" name="AccountTypeID">
          <option value="1">Savings Account</option>
          <option value="2">Brokerage Account</option>
          <option value="3">Individual Retirement Account</option>
        </select>
        <br><br>
        <label for="AccountStatusTypeID">Choose account status:</label>
        <select id="AccountStatusTypeID" name="AccountStatusTypeID">
          <option value="1">Active clients</option>
      
        </select>
        
        <br><br>
        <h3>Customer Details</h3>
        <!--Account ID store in a var and set it as customer's Account ID later -->
        <section id="editForm2">
        <input type="number" name="CustomerID" placeholder="CustomerID(*)">
        <input type="name" name="CustomerFirstName" placeholder="CustomerFirstName(*)">
        <input type="name" name="CustomerLastName" placeholder="CustomerLastName">
        <input type="name" name="CustomerAddress" placeholder="CustomerAddress">
        <input type="name" name="City" placeholder="City">
        <input type="name" name="Nation" placeholder="Nation">
        <input type="name" name="EmailAddress" placeholder="EmailAddress">
        <input type="name" name="Phone" placeholder="Phone">
</section>
        <!--Set Username in a var and then assign it to Customer-->
        <section id="editForm2">
        <h3>Set Customer Account Information</h3>
        <input type="text" name="username" placeholder="Username(*)">
        <input type="password" name="password" placeholder="Password(*)">
</section>
        <section id="editForm2">
        <button type="submit" class="registerbtn" name="create">Create Account</button>
        </section>
        </form>


</main>

<?php
    //require "footer.php";
?>
