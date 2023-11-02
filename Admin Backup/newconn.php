<?php

    $con = mysqli_connect("localhost","root","","bloodbanksys","3308");
    
    if(mysqli_connect_errno())
    {
        echo "Failed to connect MySQL:".mysqli_connect_error();
    }
    
?>