<?php
$conn = mysqli_connect("localhost", "root", "", "barberShop");
if(mysqli_connect_errno()){
    echo "failed to connect to sql: ".mysqli_connect_error() ;
}
?>