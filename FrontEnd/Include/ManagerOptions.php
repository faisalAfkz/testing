<?php
    //require '../header.php';

?>

<main>
    <head>
    <link rel="stylesheet" href="formstyle2.css">
</head>
    <div>
    <form action="AddEmployee.php" method="post">
    <button type="submit" name="Back">Back</button>
    </form>
    </div>
    <div id="editForm2">
        <h2>Add a new Employee</h2>
        <form action="AddEmployee.php" method="post">
        <input type="number" name="EmployeeID" placeholder="EmployeeID">
        <input type="password" name="Employee_Password" placeholder="Password">
</div>
<div id="editForm2">
        <input type="name" name="FirstName" placeholder="First Name">
        <input type="name" name="LastName" placeholder="Last Name">
</div>
<div id="editForm2">
        <button type="submit" class="registerbtn" name="employee_create">Add</button>
        </form>
    </div>


    <div id="editForm2">
        <h2>Edit an existing Employee</h2>
        <form action="AddEmployee.php" method="post">
        <input type="number" name="_EmployeeID" placeholder="EmployeeID">
        <input type="password" name="_Employee_Password" placeholder="Password">
</div>
<div id="editForm2">
        <input type="name" name="_FirstName" placeholder="First Name">
        <input type="name" name="_LastName" placeholder="Last Name">
</div>
<div id="editForm2">
        <button type="submit" class="registerbtn" name="employee_edit">Edit</button>
        </form>
    </div>

    <div id="editForm2">
        <h2>Remove an Employee</h2>
        <form action="AddEmployee.php" method="post">
        <input type="number" name="_EmployeeID_" placeholder="EmployeeID">
</div>
<div id="editForm2">
        <button type="submit" class="registerbtn" name="employee_delete">Remove</button>
        </form>
    </div>
</main>

