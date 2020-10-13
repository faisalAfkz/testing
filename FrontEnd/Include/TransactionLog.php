<?php
if(isset($_POST['search']))
{
    require 'db_handler.php';
    $TransactionID=$_POST['TransactionID'];

    if(empty($TransactionID))
    {
        header("Location: ../Transactions.php?error=emptyfields");
        exit();
    }
    else
    {
        $sql="SELECT TransactionID FROM TransactionLog WHERE TransactionID=?";
        $pstatement=mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($pstatement,$sql))
        {
            header("Location: ../Transactions.php?errorr=sqlerror=TransactionID_error_select_sql");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($pstatement, "i", $TransactionID);
            mysqli_stmt_execute($pstatement);
            //---------------------------------
            mysqli_stmt_store_result($pstatement);
            $resultCheck=mysqli_stmt_num_rows($pstatement);
            if(!$resultCheck>0)
            {
                header("Location: ../Transactions.php?error=TransactionIDdoesnotExist");
                echo "TransactionID with the following ID does not exist.";
                exit();
            }
            else
            {
                //SQL QUERY-----------------------------------------------------------------------------------------------------------
                $sql="SELECT * FROM TransactionLog  WHERE TransactionID = $TransactionID";
                $result=mysqli_query($connect,$sql);
                $resultCheck=mysqli_num_rows($result);

                if($resultCheck>0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {   
                        echo "Transaction ID: ".$row['TransactionID']." Transaction Date: ".$row['TransactionDate']." TransactionType ID: ".$row['TransactionTypeID']." Transaction Amount: ".$row['TransactionAmount']." New Balance ".$row['NewBalance'].
                        " Account ID:  ".$row['AccountID']." CustomerID: ".$row['CustomerID']." EmployeeID: ".$row['EmployeeID'];
                        echo '<p></p>';
                    }
                }
                else
                {
                    echo "0 results";
                }
            }
    }

}
}