<?php
if(isset($_POST['employee_create']))
{
    require 'db_handler.php';
    $EmployeeID=$_POST['EmployeeID'];
    $FirstName=$_POST['FirstName'];
    $LastName=$_POST['LastName'];
    $Employee_Password=$_POST['Employee_Password'];
    $BitZero=0;

    if(empty($EmployeeID)||empty($FirstName)||empty($LastName)||empty($Employee_Password))
    {
        echo "Empty Fields, Please Fill up the Forms.";
        echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/include/ManagerOptions.php';\",1500);</script>";
        exit();
    }
    else
    {
        $sql="SELECT EmployeeID FROM employee WHERE EmployeeID=?";
        $pstatement=mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($pstatement,$sql))
        {
            echo "SQL error=First.";
        echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/include/ManagerOptions.php';\",1500);</script>";
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($pstatement, "i", $EmployeeID);
            mysqli_stmt_execute($pstatement);
            //error handling
            mysqli_stmt_store_result($pstatement);
            $resultCheck=mysqli_stmt_num_rows($pstatement);
            if($resultCheck>0)
            {
                echo "Employee with the following ID already exists.";
                echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/include/ManagerOptions.php';\",1500);</script>";
                exit();
            }
            else
            {
                //SQL QUERY-----------------------------------------------------------------------------------------------------------
                $sql="INSERT INTO employee VALUES(?,?,?,?,?)";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                    echo "SQL ERROR.";
                    echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/include/ManagerOptions.php';\",1500);</script>";
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "issis",$EmployeeID,$FirstName,$LastName,$BitZero,$Employee_Password);
                    mysqli_stmt_execute($pstatement);
                    echo"Successfully added a new employee";
                    echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Manager.php';\",1500);</script>";
                    exit();
                }
            }

        }
    }
}
else if(isset($_POST['employee_edit']))
{
    require 'db_handler.php';
    $EmployeeID=$_POST['_EmployeeID'];
    $FirstName=$_POST['_FirstName'];
    $LastName=$_POST['_LastName'];
    $Employee_Password=$_POST['_Employee_Password'];

    if(empty($EmployeeID)||empty($FirstName)||empty($LastName)||empty($Employee_Password))
    {
        echo"Empty Fields, please fill up the form";
        echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/include/ManagerOptions.php';\",1500);</script>";
        exit();
    }
    else
    {
        $sql="SELECT EmployeeID FROM employee WHERE EmployeeID=?";
        $pstatement=mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($pstatement,$sql))
        {
            echo"Sql error=3rd";
            echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/include/ManagerOptions.php';\",1500);</script>";
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($pstatement, "i", $EmployeeID);
            mysqli_stmt_execute($pstatement);
            //error handling
            mysqli_stmt_store_result($pstatement);
            $resultCheck=mysqli_stmt_num_rows($pstatement);
            if(!$resultCheck>0)
            {
                echo "Employee with the following ID does not exist.";
                echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/include/ManagerOptions.php';\",1500);</script>";
                exit();
            }
            else
            {
                //SQL QUERY-----------------------------------------------------------------------------------------------------------
                $sql="UPDATE employee SET FirstName=?,LastName=?,Employee_Password=? WHERE EmployeeID=$EmployeeID";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                    echo "SQL ERROR.";
                    echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/include/ManagerOptions.php';\",1500);</script>";
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "sss",$FirstName,$LastName,$Employee_Password);
                    mysqli_stmt_execute($pstatement);
                    echo"Updated Successfully";
                    echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Manager.php';\",1500);</script>";
                    exit();
                }
            }

        }
    }
    mysqli_stmt_close($pstatement);
    mysqli_close($connect);
}
else if(isset($_POST['employee_delete']))
{
    require 'db_handler.php';
    $EmployeeID=$_POST['_EmployeeID_'];
    if($EmployeeID==1)
    {
        echo"Im the boss. sorry.";
        echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/include/ManagerOptions.php';\",1500);</script>";
        exit();
    }

    if(empty($EmployeeID))
    {
        echo"empty ID, please enter an ID";
        echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/include/ManagerOptions.php';\",1500);</script>";
        exit();
    }
    else
    {
        $sql="SELECT EmployeeID FROM employee WHERE EmployeeID=?";
        $pstatement=mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($pstatement,$sql))
        {
            echo"SQL error = 3rd = del";
            echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/include/ManagerOptions.php';\",1500);</script>";
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($pstatement, "i", $EmployeeID);
            mysqli_stmt_execute($pstatement);
            //error handling
            mysqli_stmt_store_result($pstatement);
            $resultCheck=mysqli_stmt_num_rows($pstatement);
            if(!$resultCheck>0)
            {
                echo "Employee with the following ID does not exist.";
                echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/include/ManagerOptions.php';\",1500);</script>";
                exit();
            }
            else
            {
                //SQL QUERY-----------------------------------------------------------------------------------------------------------
                $sql="DELETE FROM employee WHERE EmployeeID=$EmployeeID";
                $pstatement=mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($pstatement, $sql))
                {
                    echo"del_sql_error";
                    echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/include/ManagerOptions.php';\",1500);</script>";
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($pstatement, "i",$EmployeeID);
                    mysqli_stmt_execute($pstatement);
                    echo"<p style='font-size=30px;'>Successfully Removed Employee<p>";
                    echo "<script>setTimeout(\"location.href = 'http://localhost:8080/frontend/Manager.php';\",1500);</script>";
                    exit();
                }
            }

        }
        
    }
    mysqli_stmt_close($pstatement);
    mysqli_close($connect);

}
else if(isset($_POST['Back']))
{
    header("Location:../Manager.php");
    exit();
}
else
{
    echo"Critical Error";
}