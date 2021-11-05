<?php

    //Implement PHP with MYSQLI databases in your domain.
    
    $host ='localhost';
    $user ='root';
    $pass ='';
    $db='chessdata';

    echo "<center><h1>CHESS DATABASE</h1><br><br>";
    $conn=new mysqli($host,$user,$pass,$db);

    if($conn->connect_error){
        die($conn->connect_error);
    }

    //1. Creating an SQL Table

    $sql="CREATE TABLE chessgames(
            id INT NOT NULL AUTO_INCREMENT,
            white_player varchar(30) NOT NULL,
            black_player varchar(30) NOT NULL,
            white_elo INT(4) NOT NULL,
            black_elo INT(4) NOT NULL,
            winner varchar(30) NOT NULL,
            PRIMARY KEY (`id`)
        )";

    echo "<center><b>Checking for whether table exists or if it doesn't, create it: </b>";
    if($conn->query($sql)==TRUE)
    {
        echo "Table created.<br><br>";
    }
    else
    {
        echo "Table already exists.<br><br>";
    }

    //2. Inserting rows into the table

    echo "<h3>Inserting into table...</h3><br><br>";

    $insert="INSERT INTO `chessgames` VALUES('','Magnus Carlsen','Maxime Vachier Lagrave',2825,2700,'Maxime Vachier Lagrave'), ('','Ian Nepomniatchtchi','Maxime Vachier Lagrave',2775,2700,'Ian Nepomniatchtchi'),('','Ding Liren','Ian Nepomniatchtchi',2800,2775,'Ding Liren'),('','Magnus Carlsen','Ding Liren',2825,2800,'Ding Liren'),('','Anish Giri','Maxime Vachier Lagrave',2765,2700,'Maxime Vachier Lagrave')";

    if($conn->query($insert)==TRUE){
        echo "The record has been inserted.<br><br>";
    }
    else{
        echo "The record was not inserted.<br><br>".mysqli_error($conn)."<br><br>";
    }

    $names = array();

    //3. Selecting rows into array

    $result = $conn->query("SELECT id,white_player, black_player, winner FROM chessgames ORDER BY id");    

    echo "<h3>Printing table values...</h3><br><br>";

    echo "Winners of chess games below:<br><br>";

    //6. Printing the table

    while($row = $result->fetch_assoc()) {
        array_unshift($names,$row);
    }

    foreach($names as $name)
    {
        echo $name['id'].'. '.$name['white_player'].' - '.$name['black_player']." = ".$name['winner']."<br><br>";
    }

    $result->free();

    //4. Updating certain tuples

    echo "<h3>Updating table values...</h3><br><br>";

    $update = "UPDATE `chessgames` SET winner = 'Magnus Carlsen' WHERE 'white_elo' = 2825";

    if($conn->query($update)==TRUE){
        echo "The record has been updated.<br><br>";
    }
    else{
        echo "The record was not updated.<br><br>".mysqli_error($conn)."<br><br>";
    }

    $result = $conn->query("SELECT * FROM chessgames");
    $rows = $result->num_rows;

    echo "There are ".$rows." rows in the chessgames table.<br><br>";


    //5. Deleting rows based on condition

    echo "<h3>Deleting table values...</h3><br><br>";

    $delete = "DELETE FROM `chessgames` WHERE `id` = 5";

    if($conn->query($delete) == TRUE){
        echo "The record has been deleted.<br><br>";
    }
    else{
        echo "The record was not updated.<br><br>".mysqli_error($conn)."<br><br>";
    }

    $result = $conn->query("SELECT * FROM chessgames");
    $rows = $result->num_rows;

    echo "There are ".$rows." rows in the chessgames table.<br><br>";

    $conn->close();

?>