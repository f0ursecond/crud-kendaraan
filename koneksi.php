<?php
    $conn = mysqli_connect("localhost","root","","crud1");

    if (mysqli_connect_errno())
    {
        echo "failed to connect to MySQL: " . mysqli_connect_error ();
    }
?>