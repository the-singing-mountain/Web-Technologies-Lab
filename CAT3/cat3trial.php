<?php

    //Implement PHP with MYSQLI databases in your domain.
    
    $host ='localhost';
    $user ='root';
    $pass ='';
    $db='christ';

    echo "<center><h1>CHRIST (Deemed to be University) Student Database</h1><br><br>";

    $conn=new mysqli($host,$user,$pass,$db);

    if($conn->connection_status == 0)
    {
        echo "Connection successful<br><br>";
    }

    if($conn->connect_error){
        die($conn->connect_error);
    }

    //1. Creating an SQL Table

        $create = "CREATE TABLE stuinfo
        (
            stuid INT NOT NULL,
            stuname VARCHAR(30) NOT NULL,
            age INT(3) NOT NULL,
            gender VARCHAR(10) NOT NULL,
            course VARCHAR(3) NOT NULL,
            address VARCHAR(50) NOT NULL,
            PRIMARY KEY(`stuid`)
        )";

    echo "<center><b>Checking for whether table exists or if it doesn't, create it: </b>";
    if($conn->query($create)==TRUE)
    {
        echo "Table created.<br><br>";
    }
    else
    {
        echo "Table not created.<br><br>";
    }

    echo "There are ".$rows." rows in the chessgames table.<br><br>";

    //1. Inserting into stuinfo table

    $insert = "INSERT INTO `stuinfo` VALUES ('1','Karthik',22,'male','MCS','Palace Guttahalli Bangalore'),('2','Ravi',22,'male','MCA','Lalbagh Bangalore'),('3','Adbul',22,'male','MCA','Adugodi Bangalore')";
    if($conn->query($insert) == TRUE)
    {
        echo "Values have been inserted!<br><br>";
    }
    else
    {
        echo "Values have not been inserted.<br><br>Error: ".mysqli_error($conn)."<br><br>";
    }

    //2. Update stuinfo table

    $update = "UPDATE  `stuinfo` SET `stuname` = 'Bhuvan' WHERE `stuid` = 1";

    if($conn->query($update) == TRUE)
    {
        echo "Values have been updated!<br><br>";
    }
    else
    {
        echo "Values have not been updated.<br><br>".mysqli_error($conn)."<br><br>";
    }

    $result = $conn->query("SELECT * FROM stuinfo");
    $rows = $result->num_rows;

    echo "There are ".$rows." rows in the stuinfo table.<br><br>";

    //3. Delete a record from stuinfo table

    $delete = "DELETE FROM `stuinfo` WHERE `stuid` = 2";

    if($conn->query($delete) == TRUE)
    {
        echo "Records have been deleted.<br><br>";
    }
    else
    {
        echo "Values have not been deleted.<br><br>";
    }

    $result = $conn->query("SELECT * FROM stuinfo");
    $rows = $result->num_rows;

    echo "There are ".$rows." rows in the stuinfo table.<br><br>";

    //4. Display the records where course = MCA

    $display = "SELECT `stuid`, `stuname` FROM `stuinfo` WHERE `course` = 'MCA'";

    $result = $conn->query($display);

    if($result){
        echo "Select query executed";
    }
    else
    {
        echo "Select query not executed".mysqli_error($conn)."<br><br>";
    }

    while($row = $result->fetch_assoc()){
        array_unshift($names,$row);
    }

    echo "Students whose course is MCA is given below:<br><br>";
    
    foreach($names as $name)
    {
        echo $name['stuid'].' \- '.$name['stuname'].'<br><br></center>';
    }

    $result->free();
?>
