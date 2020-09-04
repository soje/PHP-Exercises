<?php

    if(!isset($_GET['name']) || strlen($_GET['name']) < 1){
        die("Name parameter missing");
    }

    if(isset($_POST['logout'])){
        header('Location: ./index.php');
        return;
    }

    $names = array('Rock', 'Paper', 'Scissors');
    $human = isset($_POST['human']) ? $_POST['human'] + 0 : -1;
    $computer = rand(0,2);

    function check($human, $computer) { 

        if(($human == 0 && $computer == 2) || ($human == 1 && $computer == 0) || ($human == 2 && $computer == 1)){
            return "You Win";
        }elseif($human == $computer){
            return "Tie";
        }else {
            return "You Lost";
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
        <h1>ROCK PAPER SCISSORS</h1>
        <p>welcome: <?= htmlentities($_GET['name']) ?></p>
        <form method="post">
            <select name="human">
                <option value="-1">Select</option>
                <option value="0">Rock</option>
                <option value="1">Paper</option>
                <option value="2">Scissors</option>
                <option value="3">Test</option>
            </select>
            <input type="submit" value="Play">
            <input type="submit" value="Logout" name="logout">
        </form>
        <pre>
            <?php
                if($human == -1){
                    print "Please select a strategy and press Play.\n";
                }elseif ($human==3){
                    for($c=0;$c<3;$c++) {
                        for($h=0;$h<3;$h++) {
                            $r = check($c, $h);
                            print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
                        }
                    }
                }else {
                    $result = check($human, $computer);
                    print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
                }
            ?>
        </pre>
        
    </body>
</html>