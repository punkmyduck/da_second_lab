<?php
    session_start();
    $connection=mysqli_connect('localhost', 'root', '', 'lab2_db');
    if ($connection==false){
        mysqli_connect_error();
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <title>

        </title>
    </head>
    <body>
        <header align="center">
        <h1>Notebook</h1>
        </header>
        <nav align="center">
            <h2>Publicate new note</h2>
            <form method="POST" action="donote.php">
                <input type="text" name="title_of_note" placeholder="title of note">
                <br>
                <input type="text" name="text_of_note" placeholder="text of note">
                <br>
                <input type="submit">
            </form>
        </nav>
        <main align="center">
            <article>
                <h2>Last 100 notes</h2>
                <hr>
                <?php
                $sql = "SELECT *  FROM `lab2`  \n"

                . "ORDER BY `lab2`.`id` DESC;";
                $counter=0;
                $result=mysqli_query($connection, $sql);
                if ($result==false){
                    echo 'something went wrong';
                    mysqli_error($connection);
                }
                while ($row=mysqli_fetch_assoc($result) and $counter<100){
                    $counter++;
                    $id=$row["id"];
                    $note_title=$row["note_title"];
                    $note_text=$row["note_text"];
                    $date=$row["date"];
                    $likes=$row["likes"];
                    $dislikes=$row["dislikes"];
                    ?>
                    <table border="1" width="750" align="center">
                        <tr>
                            <td>
                                <?php
                                echo '<h3>', $id, ': ', $note_title, '</h3><br>';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                echo $note_text, '<br><br>'; 
                                ?>
                            </td>
                        </tr>
                        <table border="1" align="center">
                            <tr>
                                <td align="right">
                                <form method="POST" action="dolikes.php">
                                    <input type="hidden" name="idofpost" value="<?php echo $id; ?>">
                                    <input type="hidden" name="likesofpost" value="<?php echo $likes; ?>">
                                    <input type="submit" name="likeonnote" value="+" />
                                </form>
                                </td>
                                <td align="left">
                                    <?php echo $likes; ?>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                <form method="POST" action="dodislikes.php">
                                    <input type="hidden" name="idofpost" value="<?php echo $id; ?>">
                                    <input type="hidden" name="dislikesofpost" value="<?php echo $dislikes; ?>">
                                    <input type="submit" name="dislikeonnote" value="-" />
                                </form>
                                </td>
                                <td align="left">
                                    <?php echo $dislikes; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Pubdate:
                                </td>
                                <td>
                                    <?php 
                                    echo $date; 
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <tr>
                            <form method="POST" action="commentaries.php">
                                <input type="text" name="comment" placeholder="comment">
                                <input type="hidden" name="idofnote" value="<?php echo $id; ?>">
                                <input type="submit">
                            </form>
                        </tr>
                        <tr>
                        <details>
                            <summary>Commentaries</summary>
                            <br>
                            <?php
                            $sqlforcomments = "SELECT *  FROM `commentaries` WHERE `id_of_note` = '$id';";
                            $commentaries=mysqli_query($connection, $sqlforcomments);
                            if ($commentaries==false){
                                mysqli_error($connection);
                            }
                            if (mysqli_num_rows($commentaries)==0) echo 'there is no commentaries';
                            else
                            while ($comms=mysqli_fetch_assoc($commentaries)){
                                $idofcom=$comms["id"];
                                $comment=$comms["comment"];
                                $pubdatecom=$comms["date"];
                                echo '<table border="1" align="center">
                                <tr>
                                <td>
                                ', $comment, '
                                </td>
                                </tr>
                                <tr>
                                <td>
                                pubdate: ', $pubdatecom,'
                                </td>
                                </tr>
                                </table><br>';
                            }
                            ?>
                            </details>
                        </tr>
                    </table>
                    <br>
                    <hr>
                    <?php
                }
                ?>
            </article>

        </main>

    </body>
</html>