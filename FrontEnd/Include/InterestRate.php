<?php
if(isset($_POST['ratechange']))
{
    require 'db_handler.php';
    $InterestSavingsRateID=$_POST['InterestSavingsRateID'];
    $InterestRateValue=$_POST['InterestRateValue'];
    $InterestRateDescription=$_POST['InterestRateDescription'];
    if(empty($InterestSavingsRateID)||empty($InterestRateDescription)||empty($InterestRateValue))
    {
        echo "Empty Fields\n";
        echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/CustomizeInterestRates.php';\",1500);</script>";
	exit();
    }
    else
    {
        $sql="SELECT InterestSavingsRateID FROM SavingsInterestRates WHERE InterestSavingsRateID=?";
        $pstatement=mysqli_stmt_init($connect);

        if(!mysqli_stmt_prepare($pstatement,$sql))
        {
            echo"SQL error_1";
            echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/CustomizeInterestRates.php';\",1500);</script>";
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($pstatement, "i", $InterestSavingsRateID);
            mysqli_stmt_execute($pstatement);
            //error handling
            mysqli_stmt_store_result($pstatement); //store db result
            $resultCheck=mysqli_stmt_num_rows($pstatement); //check rows
            if(!$resultCheck>0)
            {
                echo"ID does not exist";
                echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/CustomizeInterestRates.php';\",1500);</script>";
                exit();
            }
            else
            {
                //$AccountID,$CurrentBalance,$AccountTypeID,$AccountStatusTypeID,$InterestSavingsRateID
                $sql="UPDATE SavingsInterestRates SET InterestRateValue=?, InterestRateDescription=? WHERE InterestSavingsRateID=$InterestSavingsRateID";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                    echo"Sql error 2";
                    echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/CustomizeInterestRates.php';\",1500);</script>";
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "ds",$InterestRateValue,$InterestRateDescription);
                    mysqli_stmt_execute($pstatement);
                    echo"Successfully changed Interest attributes";
                    echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Manager.php';\",1500);</script>";
                    exit();
                }

        }
    }
    mysqli_stmt_close($pstatement);
    mysqli_close($connect);
}
}
else
{
    header("Location: ../Manager.php?change=check1");
    exit();
}

