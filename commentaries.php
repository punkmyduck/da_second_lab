<?php
    $connection=mysqli_connect('localhost', 'root', '', 'lab2_db');
    if ($connection==false){
        mysqli_connect_error();
    }
    $textundercom=$_POST["comment"];
    $idofnote=$_POST["idofnote"];
    $sql = "INSERT INTO `commentaries` (`id_of_note`, `comment`) VALUES ('$idofnote', '$textundercom');";
    $result=mysqli_query($connection, $sql);
    if ($result==false){
        mysqli_error($connection);
    }
    header('Location: home.php', true, 303);
?>