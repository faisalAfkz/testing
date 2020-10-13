<?php
error_reporting(0);
if(isset($_POST['push']))
{
    require 'db_handler.php';

    $CustomerID;
    $OldBalance;
    $NewBalance;
    $TransactionID;
    $TransactionTypeID=$_POST['TransactionTypeID'];
    $TransactionAmount=$_POST['TransactionAmount'];
    $AccountID=$_POST['AccountID'];
    $EmployeeID=$_SESSION['EmployeeID'];
    $TransactionDate=(string)date("d-m-Y");

    $sql="SELECT AccountID FROM Account WHERE AccountID=?";
        $pstatement=mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($pstatement,$sql))
        {
            echo"error_sql";
            echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Transactions.php';\",1500);</script>";
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($pstatement, "i", $AccountID);
            mysqli_stmt_execute($pstatement);
            //---------------------------------
            mysqli_stmt_store_result($pstatement);
            $resultCheck=mysqli_stmt_num_rows($pstatement);
            if(!$resultCheck>0)
            {
                echo "AccountID with the following ID does not exist.";
                echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Transactions.php';\",1500);</script>";
                exit();
            }


        


    $sql="SELECT MAX(TransactionID) FROM TransactionLog";
    $result=mysqli_query($connect,$sql);
    $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_row($result))
            {   
                $TransactionID=(int)($row[0] +1);
            }
        }
    
    $sql="SELECT CurrentBalance FROM Account WHERE AccountID = $AccountID";
    $result=mysqli_query($connect,$sql);
     $resultCheck=mysqli_num_rows($result);
            if($resultCheck>0)
            {
                while($row = mysqli_fetch_row($result))
                {   
                    $OldBalance=(double)$row[0];
                }
            }  
    
            //----------------------
    
    if($TransactionTypeID==1)
    {
        $NewBalance=(double)($OldBalance+$TransactionAmount);
        $sql="UPDATE Account SET CurrentBalance=? WHERE AccountID = $AccountID";
        $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                    echo"Transaction SQL error for update";
                    echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Transactions.php';\",1500);</script>";
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "d",$NewBalance);
                    mysqli_stmt_execute($pstatement);
                }

    }
    else if($TransactionTypeID==2)
    {
        $NewBalance=(double)($OldBalance-$TransactionAmount-50);
        $sql="UPDATE Account SET CurrentBalance=? WHERE AccountID = $AccountID";
        $pstatement=mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($pstatement, $sql))
        {
            echo"Transaction SQL error for update";
            echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Transactions.php';\",1500);</script>";
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($pstatement, "d",$NewBalance);
            mysqli_stmt_execute($pstatement);
        }

    }
    else
    {
        $NewBalance=($OldBalance+$TransactionAmount);
        $sql="UPDATE Account SET CurrentBalance=? WHERE AccountID = $AccountID";
        $pstatement=mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($pstatement, $sql))
        {
            echo"Transaction SQL error for update";
            echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Transactions.php';\",1500);</script>";
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($pstatement, "d",$NewBalance);
            mysqli_stmt_execute($pstatement);
        }
    }

    //----


    if(empty($TransactionAmount)||empty($TransactionTypeID)||empty($AccountID))
    {
        echo"Empty Fields, Please fill up the Form";
        echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Transactions.php';\",1500);</script>";
        exit();
    }
    else
    {
        $sql="SELECT CustomerID from CustomerAccount WHERE AccountID = $AccountID";
        $result=mysqli_query($connect,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0)
        {
            while($row = mysqli_fetch_row($result))
            {   
                $CustomerID=$row[0];
            }
        }


        $sql="SELECT TransactionID FROM TransactionLog WHERE TransactionID=?";
        $pstatement=mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($pstatement,$sql))
        {
            echo"Transaction push error 2";
            echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Transactions.php';\",1500);</script>";
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($pstatement, "i", $TransactionID);
            mysqli_stmt_execute($pstatement);
            //---------------------------------
            mysqli_stmt_store_result($pstatement);
            $resultCheck=mysqli_stmt_num_rows($pstatement);
            if($resultCheck>0)
            {
                echo"Transaction ID does not exist";
                echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Transactions.php';\",1500);</script>";
                //echo "TransactionID with the following ID does exist.";
                exit();
            }
            else
            {
                //SQL QUERY-----------------------------------------------------------------------------------------------------------
                $sql="INSERT INTO TransactionLog VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                    echo "SQL ERROR.";
                    echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Transactions.php';\",1500);</script>";
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "isiddiii",$TransactionID,$TransactionDate,$TransactionTypeID,$TransactionAmount,$NewBalance,$AccountID,$CustomerID,$EmployeeID);
                    mysqli_stmt_execute($pstatement);
                    echo"Transaction Successful";
                    echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Transactions.php';\",1500);</script>";
                    exit();
                }
            }
    }

} 
        }
    }