<html>
<head>
        <title>Christ (Deemed to be University) Portal</title>
        <style>
            body{
                background-image: linear-gradient(rgba(255,255,255,.7), rgba(255,255,255,.7)), url("background.png");
            }
            table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            }

            .header {
                overflow: hidden;
                background-color: black;
                padding: 20px 10px;
            }

            .header a {
                float: left;
                color: white;
                text-align: center;
                padding: 12px;
                text-decoration: none;
                font-size: 18px;
                line-height: 25px;
                border-radius: 4px;
            }

            .header button {
                float: left;
                color: white;
                text-align: center;
                padding: 12px;
                text-decoration: none;
                font-size: 18px;
                line-height: 25px;
                border-radius: 4px;
            }

            .header a:hover {
                background-color: #ddd;
                color: black;
            }

            .header button:hover {
                background-color: #ddd;
                color: black;
            }

            .header a.active {
                background-color: dodgerblue;
                color: white;
            }

            .header button.active {
                background-color: dodgerblue;
                color: white;
            }

            .header-right {
                float: right;
                background-color: black;
            }

            @media screen and (max-width: 500px) {
                .header a {
                float: none;
                display: block;
                text-align: left;
                }
                
                .header-left {
                    float: none;
                }
                
                .header-right {
                float: none;
                }
            }

            input[type = submit] {
                width: 256px;
                padding: 12px 20px;
                margin: 8px 0;;
                box-sizing: border-box;
            }

            ::placeholder{
                text-align:center;
            }

            div {
            border-radius: 5px;
            background-color: #f2f2f2;
            background-size: contain;
            padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <img src = "logo.jpg" style="margin-top: 20px; margin-left: 15px;" class = "logo" width="10%" height = "10%">
            <script src = "login.js"></script>
            <div class="header-right">
            <a href = "index.php" id = "home">Home</a>
            </div>
        </div>

        <center>
            <h1>Christ (Deemed to be University) Online Test</h1><br>
            <h1>Class: 3MCS</h1>
            <?php error_reporting(E_ERROR | E_PARSE);?>
            <h2>
            <center>
            Welcome <?php if(isset($_GET["name"])) { $name = $_GET["name"]; echo $name;} ?><br>
            Your Student ID is: <?php $student_id = $_GET["stud-id"]; echo $student_id;?><br>
            Your email address is: <?php $email = $_GET["email"]; echo $email; ?><br>
            Gender: <?php if(isset($_GET["gender"])){ $gender = $_GET["gender"]; echo $gender;}?><br>
            Expansion of PHP: <?php if(isset($_GET["phpexpansion"])) $phpexpansion = $_GET["phpexpansion"]; echo $phpexpansion."<br>"?><br>
            What is PHP? <?php if(isset($_GET["phpmeaning"])) $phpmeaning = $_GET["phpmeaning"]; echo $phpmeaning."<br>"?><br>
            Which of these does PHP support?<br>
            <?php 
            if(isset($_GET["php1"])) { $php1 = $_GET["php1"]; echo "1.".$php1."<br>";}
            if(isset($_GET["php2"])) { $php2 = $_GET["php2"]; echo "2.".$php2."<br>";}
            if(isset($_GET["php3"])) { $php3 = $_GET["php3"]; echo "3.".$php3."<br>";}
            ?>
            </h2>
            <h3>
                <?php
                $file = fopen("test_inputs.txt","w+") or die("unable to open file");
                $content = $name."\n".$student_id."\n".$email."\n".$gender."\n".$phpexpansion."\n".$phpmeaning."\n".$php1."\n".$php2."\n".$php3;
                if(fwrite($file,$content)){
                    echo "Form has been saved in test_inputs.txt\nThank you for submitting!";
                }
                fclose($file);
                ?>
            </h3>
        </center>
</body>
</html>