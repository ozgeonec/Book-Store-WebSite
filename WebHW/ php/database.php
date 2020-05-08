<?php

function Createdb(){
    $servername = "127.0.0.1:3325";
    $username = "root";
    $password= "";
    $dbname = "bookstore";



    $con = mysqli_connect($servername,$username,$password);

    //check connection
    if(!$con){
        die("Connection failed:".mysqli_connect_error());
    }
    //create db
    $sql="CREATE DATABASE IF NOT EXISTS $dbname";
    if(mysqli_query($con,$sql)){
        $con = mysqli_connect($servername,$username,$password, $dbname);
        $sql="
            CREATE TABLE IF NOT EXISTS books(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            book_name VARCHAR(25) NOT NULL,
            book_publisher VARCHAR (20),
            book_price FLOAT
            );
        ";
        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo"Cannot create table";
        }
    }else{
        echo"Error while creating database".mysqli_error($con);
    }
}
