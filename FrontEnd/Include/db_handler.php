<?php

$servername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="bankingsystem";

$connect=mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$connect)
{
    die("Connection Error: ".mysqli_connect_error());
}