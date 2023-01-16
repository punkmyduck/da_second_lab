<?php
$connection=mysqli_connect('localhost', 'root', '', 'lab2_db');
if ($connection==false){
    mysqli_connect_error();
}
$titleofnote=$_POST["title_of_note"];
$textofnote=$_POST["text_of_note"];
$sql = "INSERT INTO `lab2` (`note_title`, `note_text`) VALUES ('$titleofnote', '$textofnote');";
$result=mysqli_query($connection, $sql);
if ($result==false){
    echo 'something went wrong.';
    mysqli_error($connection);
}
header('Location: home.php', true, 303);
?>