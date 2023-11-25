<?php 
 include("header.html");//This is a straightforward reference to raw HTML file
 include("database.php");//This includes establishing a connection to my SQL database
 session_start();
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
    if($_SERVER["REQUEST_METHOD"] == "POST"){//This is a simple yet reliable approach that checks the global variable 'Server' to ensure that the method is POST and not the default GET.
        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);// retrieving user input from an HTML form to filter and enhance the security of users
        $password = $_POST["password"];//I choose not to filter the password input since I intend to hash it before storage
        if(empty($username) ){
            echo "Username is missing";
        }
        elseif(empty($password) ){
            echo "Password is missing";
        }
        else{
            $hash = password_hash($password, PASSWORD_DEFAULT);//As I mentioned above
            $sql = "INSERT INTO users (user, passwords)
                    VALUES('$username', '$hash')";//This marks the initial utilization of raw SQL code connected to the 'businessdb' database and the 'users' table. 
                    //Inserting user input of username and hashed password
            try{//This entire block of 'try' method serves as a mechanism to handle duplicates in usernames(set as UNIQUE in db)
                mysqli_query($conn,$sql);//This holds the SQL code for inserting information, utilizing the referenced '$conn' created in 'database.php' through the 'query' function.
                echo "You are In";// If successful - welcome to the database
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



 