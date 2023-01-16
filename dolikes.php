<?php
    $connection=mysqli_connect('localhost', 'root', '', 'lab2_db');
    if ($connection==false){
        mysqli_connect_error();
    }
    if( isset( $_POST['likeonnote'] ) )
    {
        $id=$_POST["idofpost"];
        $likes=$_POST["likesofpost"]+1;
        $sqlforlikes = "UPDATE `lab2` SET `likes` = '$likes' WHERE `lab2`.`id` = '$id';";
        $resultforlikes=mysqli_query($connection, $sqlforlikes);
        if ($resultforlikes==false){
            echo 'something went wrong';
            mysqli_error($connection);
        }
        header('Location: home.php', true, 303);
    }
?>