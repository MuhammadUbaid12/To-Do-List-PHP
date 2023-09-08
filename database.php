<?php
function make_connection(){
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todolist";

    $con = new mysqli($host,$username,$password,$dbname);

    if($con->connect_error){
        echo "There is an error database connection " . $con->connect_error;
    }
    return $con;
        // echo "Successfully connected";
} 

function add_items($value){
   $con =  make_connection();
   $query = "INSERT into todo(id,item,status) values (NULL, '$value','0')";
   $con->query($query);
}

function get_items(){
    $con =  make_connection();
    $query = "SELECT id,item from todo where status = '0'";
    $result =  $con->query($query);
    return $result;
}

function get_items_checked(){
    $con =  make_connection();
    $query = "SELECT id,item from todo where status='1'";
    $result =  $con->query($query);
    return $result;

}

function update_items($id){
    $con =  make_connection();
    $query = "UPDATE todo set status='1' where id='$id'";
    $result =  $con->query($query);

}

function delete_items($id){
    $con =  make_connection();
    $query = "DELETE from todo where id ='$id'";
    $result =  $con->query($query);
}
