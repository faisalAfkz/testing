<head>
<link rel="stylesheet" href="fetchstyle.css">
</head>
<?php
    if(isset($_POST['view']))
    {
        require 'db_handler.php';

        $sql="SELECT * FROM customeraccount";
        $result=mysqli_query($connect,$sql);
        $resultCheck=mysqli_num_rows($result);

        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<p>CustomerID: ".$row['CustomerID']."     AccountID: ".$row['AccountID']."</p>";

            }
        }
        else
        {
            echo "0 results";
        }
    }
    else if(isset($_POST['find']))
    {
        require 'db_handler.php';
        $CustomerID=$_POST['CustomerID'];

        if(trim($CustomerID)=="")
        {
          echo "Blank Input!!! "."<br>";
          echo "Redirecting to previous page again... "."<br>";
          $url = "http://localhost:8080/frontend/Customers.php" ;
          header("Refresh: 3; URL= $url");
          exit();
        }

        $sql="SELECT * FROM customer WHERE CustomerID = $CustomerID";
        $result=mysqli_query($connect,$sql);
        $resultCheck=mysqli_num_rows($result);

        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<p>CustomerID: ".$row['CustomerID']."</p>"."<p> AccountID: ".$row['AccountID']."</p>"."<p>CustomerAddress: ".$row['CustomerAddress']."</p>"."<p> Name: ".$row['CustomerFirstName']." ".$row['CustomerLastName']."</p>"."<p>
                 Country,City:  ".$row['Nation'].",".$row['City']."</p>"."<p> Email: ".$row['EmailAddress']."</p>"."<p> Phone: ".$row['Phone']."</p>"."<p> Username: ".$row['Username'].'</p>';
                //echo '<p></p>';
            }
        }
        else
        {
            echo "Wrong Customer ID!!!<br>";
            echo "Redirecting to previous page again... <br>";
            $url = "http://localhost:8080/frontend/Customers.php" ;
            header("Refresh: 3; URL= $url");
        }
    }
    else if(isset($_POST['find_acc_sts']))
    {
        require 'db_handler.php';
        $CustomerID=$_POST['CustomerID_acc_sts'];

        if(trim($CustomerID)=="")
        {
          echo "Blank Input!!! "."<br>";
          echo "Redirecting to previous page again... "."<br>";
          $url = "http://localhost:8080/frontend/Customers.php" ;
          header("Refresh: 3; URL= $url");
          exit();
        }

        $sql="SELECT  *
        from account
        where account.AccountID=(select AccountID from customer where CustomerID=$CustomerID);";
        $result=mysqli_query($connect,$sql);
        $resultCheck=mysqli_num_rows($result);

        if($resultCheck>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<p>CustomerID:".$CustomerID."</p>"."<p> AccountID: ".$row['AccountID']."</p>"."<p> CurrentBalance: ".$row['CurrentBalance']."</p>"."<p> AccountTypeID: ".$row['AccountTypeID'].
                "</p>"."<p> AccountStatusTypeID:  ".$row['AccountStatusTypeID']."</p>"."<p> InterestSavingsRateID: ".$row['InterestSavingsRateID'];
                //echo '<p></p>';

            }
        }
        else
        {
          echo "Wrong Customer ID <br>";
          echo "Redirecting to previous page again....<br>";
          $url = "http://localhost:8080/frontend/Customers.php" ;
          header("Refresh: 3; URL= $url");
        }
    }
    else
    {
      echo "ERRORR <br>";
      echo "Redirecting to previous page again....<br>";
      $url = "http://localhost:8080/frontend/Customers.php" ;
      header("Refresh: 3; URL= $url");
    }
