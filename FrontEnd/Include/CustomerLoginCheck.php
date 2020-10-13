<?php
if(isset($_POST['login']))
{
    require 'db_handler.php';
    $username=$_POST['username'];
    $Password=$_POST['Password'];

    if(empty($username)||empty($Password))
    {
	echo "Blank Input!!! <br>";
  echo "Redirecting to login page again... <br>";
	$url = "http://localhost:8080/frontend/CustomerLogin.php" ;
        header("Refresh: 3; URL= $url");
        exit();
    }
    else
    {
        $sql="SELECT * FROM userlogins WHERE username=?";
        $pstatement=mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($pstatement,$sql))
        {
            header("Location ../CustomerLogin.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($pstatement,"s",$username);
            mysqli_stmt_execute($pstatement);
            $result=mysqli_stmt_get_result($pstatement);
            if($row=mysqli_fetch_assoc($result))
            {
                if($Password==$row['UserPassword'])
                {
                    session_start();
                    $_SESSION['username']=$row['Username'];
                    //echo $_SESSION['username'];
                    

                    //Fetching info from db about user
                    $sql="SELECT e.AccountID, CurrentBalance, AccountStatusDescription, AccountTypeDescription, InterestRateDescription, InterestRateValue FROM account, accountstatustype, accounttype, savingsinterestrates,userlogins e WHERE e.Username='Faria_SM' AND e.AccountID=account.AccountID AND account.AccountTypeID=accounttype.AccountTypeID AND account.AccountStatusTypeID=accountstatustype.AccountStatusTypeID AND account.InterestSavingsRateID=savingsinterestrates.InterestSavingsRateID";
                    $result=mysqli_query($connect,$sql);
                    $resultCheck=mysqli_num_rows($result);

                    if($resultCheck>0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            //session_start();
                           $_SESSION['AccountID']=$row['AccountID'];
                           $_SESSION['CurrentBalance']=$row['CurrentBalance'];
                           $_SESSION['AccountStatusDescription']=$row['AccountStatusDescription'];
                           $_SESSION['AccountTypeDescription']=$row['AccountTypeDescription'];
                           $_SESSION['InterestRateDescription']=$row['InterestRateDescription'];
                           $_SESSION['InterestRateValue']=$row['InterestRateValue'];

                           echo $_SESSION['AccountID'];
                           echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/CustomerHome.php';\",3500);</script>";
                           exit();
                        }
                    }
                    else
                    {
                        echo "ERROR ERROR ERROR ";
                        echo $_SESSION['AccountID'];
                           echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/CustomerHome.php';\",3500);</script>";
                           exit();
                    }

                    header("Location: ../CustomerHome.php?login=1");
                    exit();
                }
                else
                {
			echo "Wrong password!!!"."<br>";
  			echo "Redirecting to login page again... "."<br>";
			$url = "http://localhost:8080/frontend/CustomerLogin.php" ;
        		header("Refresh: 3; URL= $url");
                    exit();
                }
            }
            else
            {
                echo "Wrong username !!!"."<br>";
  		echo "Redirecting to login page again... "."<br>";
		$url = "http://localhost:8080/frontend/CustomerLogin.php" ;
        	header("Refresh: 3; URL= $url");
                exit();
            }
        }

    }
}
else if(isset($_POST['logout']))
{
    session_start();
    session_unset();
    session_destroy();
    echo "Logged Out";
    echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/CustomerLogin.php';\",1500);</script>";
    exit();
}
else
{
    header("Location: ../CustomerLogin.php?login=error");
    exit();
}
