<?php 

if(isset($_POST['cancel'])) {
    header("Location: index.php");
    return;
}

$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

$failure = false;

if(isset($_POST['who']) && isset($_POST['pass'])){
    $who = $_POST['who']; $pswd = $_POST['pass'];

    if(strlen($who)<1 || strlen($pswd)<1){ 
        $failure = "User name and password are required"; 
    }elseif(hash('md5', $salt.$pswd) == $stored_hash) {
        header("Location: ./game.php?name=".urlencode($who));
        return;
    }else {
        $failure = "Incorrect password";
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dario Galiani ef10ebc6</title>
    </head>
    <body>
        <h1>Please Log In</h1>

        <?php 
            if($failure !== false) echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
        ?>

        <form method="post">
            <label for="username">User Name </label><input type="text" name="who" id="username"><br/>
            <label for="password">Password </label><input type="password" name="pass" id="password"><br/>
            <input type="submit" value="Log In">
            <input type="submit" value="Cancel" name="cancel">
        </form>

    </body>
</html>