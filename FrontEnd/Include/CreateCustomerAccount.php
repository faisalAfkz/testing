<?php
if(isset($_POST['create']))
{
    require 'db_handler.php';

    $username=$_POST['username'];
    $password=$_POST['password'];
    $AccountID=$_POST['AccountID'];
    $AccountStatusTypeID=$_POST['AccountStatusTypeID'];
    $AccountTypeID=$_POST['AccountTypeID'];
    $CurrentBalance=$_POST['CurrentBalance'];
    $InterestSavingsRateID=$AccountTypeID;
    $CustomerID=$_POST['CustomerID'];
    $CustomerAddress=$_POST['CustomerAddress'];
    $CustomerFirstName=$_POST['CustomerFirstName'];
    $CustomerLastName=$_POST['CustomerLastName'];
    $City=$_POST['City'];
    $Nation=$_POST['Nation'];
    $EmailAddress=$_POST['EmailAddress'];
    $Phone=$_POST['Phone'];

    //||empty($CustomerID)||empty($CustomerAddress)||(empty($Phone)
    if(empty($username)||empty($password)||empty($AccountID)||empty($AccountTypeID)||
      empty($AccountStatusTypeID)||empty($InterestSavingsRateID||empty($CustomerID)||empty($CustomerFirstName)))
    {
      echo "Necessary fields empty "."<br>";
      echo "Redirecting to previous page again... "."<br>";
      $url = "http://localhost:8080/frontend/CreateCustomer.php" ;
      header("Refresh: 3; URL= $url");
      exit();

    }
    else
    {
        $sql="SELECT AccountID FROM Account WHERE AccountID=?";
        $pstatement=mysqli_stmt_init($connect);

        if(!mysqli_stmt_prepare($pstatement,$sql))
        {
          echo "Access error "."<br>";
          echo "Redirecting to previous page again... "."<br>";
          $url = "http://localhost:8080/frontend/CreateCustomer.php" ;
          header("Refresh: 3; URL= $url");
          exit();
        }
        else
        {
            mysqli_stmt_bind_param($pstatement, "i", $AccountID);
            mysqli_stmt_execute($pstatement);
            //error handling
            mysqli_stmt_store_result($pstatement); //store db result
            $resultCheck=mysqli_stmt_num_rows($pstatement); //check rows
            if($resultCheck>0)
            {
              echo "Account id : $AccountID already exists <br>";
              echo "Redirecting to previous page again...<br>";
              $url = "http://localhost:8080/frontend/CreateCustomer.php" ;
              header("Refresh: 3; URL= $url");
              exit();
            }
            else
            {
                //$AccountID,$CurrentBalance,$AccountTypeID,$AccountStatusTypeID,$InterestSavingsRateID
                $sql="INSERT INTO Account(AccountID, CurrentBalance, AccountTypeID, AccountStatusTypeID, InterestSavingsRateID) VALUES (?, ?, ?, ?, ?)";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                  echo "DB error <br>";
                  echo "Redirecting to previous page again...<br>";
                  $url = "http://localhost:8080/frontend/CreateCustomer.php" ;
                  header("Refresh: 3; URL= $url");
                  exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "iiiii",$AccountID,$CurrentBalance,$AccountTypeID,$AccountStatusTypeID,$InterestSavingsRateID);
                    mysqli_stmt_execute($pstatement);
                    //header("Location: ../CreateCustomer.php?createAccount=success");
                    //exit();
                }

                $sql="INSERT INTO UserLogins(Username, UserPassword, AccountID) VALUES (?, ?, ?)";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                  echo "DB error <br>";
                  echo "Redirecting to previous page again...<br>";
                  $url = "http://localhost:8080/frontend/CreateCustomer.php" ;
                  header("Refresh: 3; URL= $url");
                  exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "ssi",$username,$password,$AccountID);
                    mysqli_stmt_execute($pstatement);
                    //header("Location: ../CreateCustomer.php?createAccount=success");
                    //exit();
                }


                $sql="INSERT INTO Customer(CustomerID,AccountID, CustomerAddress, CustomerFirstName, CustomerLastName, City,Nation,EmailAddress,Phone,Username) VALUES (?,?,?,?,?,?,?,?,?,?)";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                  echo "DB error <br>";
                  echo "Redirecting to previous page again...<br>";
                  $url = "http://localhost:8080/frontend/CreateCustomer.php" ;
                  header("Refresh: 3; URL= $url");
                  exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "iissssssss",$CustomerID,$AccountID,$CustomerAddress,$CustomerFirstName,$CustomerLastName,$City,$Nation,$EmailAddress,$Phone,$username);
                    mysqli_stmt_execute($pstatement);
                    //header("Location: ../CreateCustomer.php?createAccount=success");
                    //exit();
                }

                $sql="INSERT INTO CustomerAccount(AccountID,CustomerID) VALUES (?,?)";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                  echo "DB error <br>";
                  echo "Redirecting to previous page again...<br>";
                  $url = "http://localhost:8080/frontend/CreateCustomer.php" ;
                  header("Refresh: 3; URL= $url");
                  exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "ii",$AccountID,$CustomerID);
                    mysqli_stmt_execute($pstatement);
                    echo "Welcome <b>$CustomerFirstName</b> <br>";
                    echo "Created account successfully <br>";
                    echo "Redirecting to previous page again...<br>";
                    $url = "http://localhost:8080/frontend/CreateCustomer.php" ;
                    header("Refresh: 3; URL= $url");
                    exit();
                }

            }

        }
    }
    mysqli_stmt_close($pstatement);
    mysqli_close($connect);

}
else
{
  echo "DB error <br>";
  echo "Redirecting to previous page again...<br>";
  $url = "http://localhost:8080/frontend/CreateCustomer.php" ;
  header("Refresh: 3; URL= $url");
  exit();
}
