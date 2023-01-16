<?php
    $connection=mysqli_connect('localhost', 'root', '', 'lab2_db');
    if ($connection==false){
        mysqli_connect_error();
    }
    if( isset( $_POST['dislikeonnote'] ) )
    {
        $id=$_POST["idofpost"];
        $dislikes=$_POST["dislikesofpost"]+1;
        $sqlfordislikes = "UPDATE `lab2` SET `dislikes` = '$dislikes' WHERE `lab2`.`id` = '$id';";
        $resultfordislikes=mysqli_query($connection, $sqlfordislikes);
        if ($resultfordislikes==false){
            echo 'something went wrong';
            mysqli_error($connection);
        }
        header('Location: home.php', true, 303);
    }
?>