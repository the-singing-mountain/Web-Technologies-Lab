<!DOCTYPE HTML>
<html>
<head>
    <title>Chess.com Games Database</title>
</head>
<style>
    .header {
        display:center;
        background-color: black;
        text-align:center;
        color:white;
    }

    .php{
        background-color:green;
        color:white;
    }

    table, th, td {
    border: 1px solid black;
    }
</style>
<body>
    <div class = "header">
        <div class = "itemleft">
            <img src = "logo.png" width="10%" height="10%">
        </div>
        <div class = "header-center">
            <h1 id = "title">CHESS DATABASE</h1><br><br>
        </div>
    </div>
    <div class = "php">
            <?php

            //Implement PHP with MYSQLI databases in your domain.
            
            $host ='localhost';
            $username ='root';
            $password ='';
            $dbname='chessdata';

            $conn=new mysqli($host,$username,$password,$dbname);

            if($conn->connect_error){
                die($conn->connect_error);
            }

            echo "<center><h1>Connection with the database ".$dbname." has been established.</h1>";
            //1. Creating an SQL Table

            echo "<h2>Has the table been created?";
            $sql="CREATE TABLE chessgames(
                    id INT NOT NULL AUTO_INCREMENT,
                    white_player varchar(30) NOT NULL,
                    black_player varchar(30) NOT NULL,
                    white_elo INT(4) NOT NULL,
                    black_elo INT(4) NOT NULL,
                    winner varchar(30) NOT NULL,
                    PRIMARY KEY (`id`)
                )";
            
            if($conn->query($sql)==TRUE)
            {
                echo "<br>";
                echo "Yes.<br><br>";
            }
            else
            {
                echo "<center>";
                echo "<br>";
                echo "<br>";
                echo "No.<br><br>";
            }

            //2. Inserting rows into the table

            echo "<h2>Insert function will be executed.</h2><br><br>";

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

            echo "<h2>Printing table values...</h2><br><br>";

            echo "Winners of chess games below:<br><br>";

            //6. Printing the table

            while($row = $result->fetch_assoc()) {
                array_unshift($names,$row);
            }

            echo "<table>
            <tr>
                <th>ID</th>
                <th>White Player</th>
                <th>Black Player</th>
                <th>Winner</th>
            </tr>";

            foreach($names as $name)
            {
                        echo "<tr>
                            <td>".$name['id']."</td>
                            <td>".$name['white_player']."</td>
                            <td>".$name['black_player']."</td>
                            <td>".$name['winner']."</td>
                        </tr>
                        ";
            }
            echo "</table>";

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

            //5. Deleting rows based on condition

            echo "<h3>Deleting table values...</h3><br><br>";

            $delete = "DELETE FROM `chessgames` WHERE `id` = 5";

            if($conn->query($delete) == TRUE){
                echo "The record has been deleted.<br><br>";
            }
            else{
                echo "The record was not updated.<br><br>".mysqli_error($conn)."<br><br>";
            }

            $conn->close();
        ?>    
    </div>

</body>