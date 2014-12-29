<?php
    $DBINFO['host']="hongpyo.iptime.org";
    $DBINFO['user']="trend";
    $DBINFO['pass']="trend";
    $DBINFO['name']="trend";
    
    $mysqli = new mysqli($DBINFO['host'], $DBINFO['user'], $DBINFO['pass'], $DBINFO['name']);
    
    if(mysqli_connect_errno())
    {
            echo "DB Connect Failed!!.<br>";
            exit();
    }
    
?>