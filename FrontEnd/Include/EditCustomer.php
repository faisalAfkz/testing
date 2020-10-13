<?php
session_start();

if(isset($_POST['Edit']))
{
    require 'db_handler.php';
    $CustomerID=$_POST['CustomerID'];
    $CustomerAddress=$_POST['CustomerAddress'];
    $CustomerFirstName=$_POST['CustomerFirstName'];
    $CustomerLastName=$_POST['CustomerLastName'];
    $City=$_POST['City'];
    $Nation=$_POST['Nation'];
    $EmailAddress=$_POST['EmailAddress'];
    $Phone=$_POST['Phone'];

    if(empty($CustomerAddress)||empty($CustomerFirstName)||empty( $CustomerLastName)||empty($City)||empty($Nation)||empty($EmailAddress)||empty($Phone))
    {
        echo "Blank Input!!! "."<br>";
        echo "Redirecting to previous page again... "."<br>";
        $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
        header("Refresh: 3; URL= $url");
        exit();
    }
    else
    {
        //-----------------------------------------------------------------------------------------------------------------------------------------
        $sql="SELECT CustomerID FROM customer WHERE CustomerID=?";
        $pstatement=mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($pstatement,$sql))
        {
          echo "Database Access Error "."<br>";
          echo "Redirecting to previous page again... "."<br>";
          $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
          exit();
        }
        else
        {
            mysqli_stmt_bind_param($pstatement, "i", $CustomerID);
            mysqli_stmt_execute($pstatement);
            //error handling
            mysqli_stmt_store_result($pstatement);
            $resultCheck=mysqli_stmt_num_rows($pstatement);
            if(!$resultCheck>0)
            {
              echo "Wrong customer id !!! "."<br>";
              echo "Redirecting to previous page again... "."<br>";
              $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
              exit();
            }
            else
            {
                //SQL QUERY-----------------------------------------------------------------------------------------------------------
                $sql="UPDATE customer SET CustomerAddress=?,CustomerFirstName=?, CustomerLastName=?, City=?, Nation=?, EmailAddress=?, Phone=? WHERE CustomerID=$CustomerID";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                  echo "Database Access Error "."<br>";
                  echo "Redirecting to previous page again... "."<br>";
                  $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
                  exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "sssssss",$CustomerAddress,$CustomerFirstName,$CustomerLastName,$City,$Nation,$EmailAddress,$Phone);
                    mysqli_stmt_execute($pstatement);
                    echo "Edited Successfully "."<br>";
                    echo "Redirecting to previous page again... "."<br>";
                    $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
                    exit();
                }
            }

        }
    }
    mysqli_stmt_close($pstatement);
    mysqli_close($connect);
}
else if(isset($_POST['editpass']))
{
    require 'db_handler.php';

    $CustomerID=$_POST['CustomerID_reset_pass'];
    $password=$_POST['password'];

    if(empty($CustomerID||empty($password)))
    {
      echo "Blank Input!!! "."<br>";
      echo "Redirecting to previous page again... "."<br>";
      $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
      header("Refresh: 3; URL= $url");
      exit();
    }
    else
    {
        $sql="UPDATE UserLogins SET UserPassword=? where AccountID = (SELECT AccountID FROM customeraccount WHERE CustomerID=$CustomerID)";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                  echo "Wrong customer ID "."<br>";
                  echo "Redirecting to previous page again... "."<br>";
                  $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
                  header("Refresh: 3; URL= $url");
                  exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "s",$password);
                    mysqli_stmt_execute($pstatement);
                    echo "Password Changed Successfully"."<br>";
                    echo "Redirecting to previous page again... "."<br>";
                    $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
                    header("Refresh: 3; URL= $url");
                    exit();
                }
    }
}
else if(isset($_POST['change']))
{
    require 'db_handler.php';

    $CustomerID=$_POST['CustomerID_acc_sts'];
    $AccountTypeID=$_POST['AccountTypeID'];
    $AccountStatusTypeID=$_POST['AccountStatusTypeID'];

    $InterestSavingsRateID=$AccountTypeID;



    if(empty($CustomerID)||empty($AccountStatusTypeID)||empty($AccountTypeID)||empty($InterestSavingsRateID))
    {
      echo "Blank Input!!! "."<br>";
      echo "Redirecting to previous page again... "."<br>";
      $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
      header("Refresh: 3; URL= $url");
      exit();
    }
    else
    {
            //-----------ACCOUNT STATUS TYPE -----------------------------------
                $sql="UPDATE Account SET AccountStatusTypeID=? where AccountID = (SELECT AccountID FROM customeraccount WHERE CustomerID=$CustomerID)";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                  echo "Wrong customer ID "."<br>";
                  echo "Redirecting to previous page again... "."<br>";
                  $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
                  header("Refresh: 3; URL= $url");
                  exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "i",$AccountStatusTypeID);
                    mysqli_stmt_execute($pstatement);
                }
            //----------ACCOUNT TYPE --------------------------------------------
                $sql="UPDATE Account SET AccountTypeID=? where AccountID = (SELECT AccountID FROM customeraccount WHERE CustomerID=$CustomerID)";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                  echo "Wrong customer ID "."<br>";
                  echo "Redirecting to previous page again... "."<br>";
                  $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
                  header("Refresh: 3; URL= $url");
                  exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "i",$AccountTypeID);
                    mysqli_stmt_execute($pstatement);
                }
            //--------------INTEREST SAVINGS RATE ------------------------------
                $sql="UPDATE Account SET InterestSavingsRateID=? where AccountID = (SELECT AccountID FROM customeraccount WHERE CustomerID=$CustomerID)";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                  echo "Wrong customer ID "."<br>";
                  echo "Redirecting to previous page again... "."<br>";
                  $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
                  header("Refresh: 3; URL= $url");
                  exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "i",$InterestSavingsRateID);
                    mysqli_stmt_execute($pstatement);
                    echo "Changed Successfully "."<br>";
                    echo "Redirecting to previous page again... "."<br>";
                    $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
                    header("Refresh: 3; URL= $url");
                    exit();
                }
    }
}
else if(isset($_POST['delete']))
{
    require 'db_handler.php';

    $CustomerID=$_POST['CustomerID_del'];


    if(empty($CustomerID))
    {
      echo "Blank input "."<br>";
      echo "Redirecting to previous page again... "."<br>";
      $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
      header("Refresh: 3; URL= $url");
      exit();
    }
    else
    {
        //-----------------------------------------------------------------------------------------------------------------------------------------
        $sql="SELECT CustomerID FROM customer WHERE CustomerID=?";
        $pstatement=mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($pstatement,$sql))
        {
          echo "DB error "."<br>";
          echo "Redirecting to previous page again... "."<br>";
          $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
          header("Refresh: 3; URL= $url");
          exit();
        }
        else
        {
            mysqli_stmt_bind_param($pstatement, "i", $CustomerID);
            mysqli_stmt_execute($pstatement);
            //error handling
            mysqli_stmt_store_result($pstatement);
            $resultCheck=mysqli_stmt_num_rows($pstatement);
            if(!$resultCheck>0)
            {
              echo "Wrong customer ID "."<br>";
              echo "Redirecting to previous page again... "."<br>";
              $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
              header("Refresh: 3; URL= $url");
              exit();
            }
            else
            {
                //SQL QUERY-----------------------------------------------------------------------------------------------------------
                $sql="delete from account where AccountID = (Select AccountID from customeraccount where CustomerID=?)";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                  echo "DB ERROR <br>";
                  echo "Redirecting to previous page again... <br>";
                  $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
                  header("Refresh: 3; URL= $url");
                  exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "i",$CustomerID);
                    mysqli_stmt_execute($pstatement);
                    echo "Deleted id= $CustomerID<br>";
                    echo "Redirecting to previous page again... <br>";
                    $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
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
  echo "ERROR "."<br>";
  echo "Redirecting to previous page again... "."<br>";
  $url = "http://localhost:8080/frontend/EditCustomerAccount.php" ;
  header("Refresh: 3; URL= $url");
  exit();
}
