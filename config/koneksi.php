<?php
//menghubungkan aplikasi dgn database
$server = "localhost"; 
$username = "root";
$password = "";
$database = "si_duk";
$koneksi = mysqli_connect($server,$username, $password, $database);


if(mysqli_connect_errno()){
    echo "Koneksi Database Gagal :" . mysqli_connect_error(); 
} else{
    echo "";
}

?>