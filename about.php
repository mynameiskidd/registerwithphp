<?php
    session_start();
    include("header.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
This is the About Page, nothing is here but you may logout<br>
    <form action="about.php" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
    
</body>
</html>
<?php //this php code prints username if true and ends session if logout buttion is clicked
    echo"WELCOME <br>";

  if(isset($_SESSION["username"])){

    echo $_SESSION["username"];
  }
  else{
    echo "If you want your username to be displayed Go back to Home page and register<br>";
  }
   


   if (isset($_POST["logout"])) {
    session_destroy();
    header("Location:index.php");
   }

   echo"If you registred your Username and Password are stored in DB";


?>

<?php
    include("footer.html");
?>