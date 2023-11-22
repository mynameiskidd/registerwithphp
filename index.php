<?php 
 include("header.html");//this is the simple reference to raw html files
 include("database.php");//including connection to my SQL database
 session_start();//trying to make a session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regestration form</title>
</head>
<body>
    <h1>WELCOMME TO MY REGESTRATION FORM</h1>
    <h2>This is my first PHP/SQL project, no CSS used so don't mind my "design"</h2>
    <label>*all the code comments are included so don't mind to inspect the code*</label>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>"    method="post">
        Username:<br> 
        <input type="text" name="username"><br>
        Password:<br>
        <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Digital Footprint"><br>
        
    </form>
    
</body>
</html>


<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){//this is a simple but works every time, cheking with a global variable Server if my method is POST and not GET(by default)
        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);// so I'm taking user input from html form to FILTER users' username so it's more sequire
        $password = $_POST["password"];//I tend to not filtering the password since i'm gonna hash it anyway
        if(empty($username) ){
            echo "Username is missing";
        }
        elseif(empty($password) ){
            echo "Password is missing";
        }
        else{
            $hash = password_hash($password, PASSWORD_DEFAULT);//so i'm storing a hashed password
            $sql = "INSERT INTO users (user, passwords)
                    VALUES('$username', '$hash')";//so this is the first usage of raw SQL CODE connected to DB named businessdb and table "users". i'm inserting user input of username and hashed password
            
            try{//the whole try method is just a way to handle dublicates in username since i set it up to be unique
                mysqli_query($conn,$sql);// values $sql with SQL code to insert info passing through referensed $conn createed in database.php with query function 
                echo "You are In";// if success - welcome to the database
            }
            catch(mysqli_sql_exception){
                echo "Username is taken";
            }
        
            
    }
    }


    if(isset($_POST["submit"])){
    

        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];

            header("Location:about.php");

        }


   }
    













    include("footer.html");
    mysqli_close($conn);

?>



 