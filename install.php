<?php

    if(isset($_POST['weiter'])) {
        
        if(file_exists("config.php")) {
            
            //Wenn die Datei schon existiert, soll sie erst gelöscht werden um ungewollte Verluste zu vermeiden
            echo "Die Datei config.php muss erst gel&ouml;scht werden um die Zugangsdaten zu speichern!";
        } else {

            //Datei erstellen
            $datei = fopen("config.php", "w+");
            
            //Werte in Datei schreiben und mit '%%' trennen (beim auslesen einfach bei '%%' splitten)
            $content = '<?php'."\n";
            $content = $content.'  $db_host = "'.$_POST['db_host'].'";'."\n";
            $content = $content.'  $db_name = "'.$_POST['db_name'].'";'."\n";
            $content = $content.'  $db_user = "'.$_POST['db_user'].'";'."\n";
            $content = $content.'  $db_pass = "'.$_POST['db_pass'].'";'."\n";
            $content = $content.'?>';
            fwrite($datei, $content);
            fclose($datei);
        }        
    }
?>
<html>
    <head>
        <title>Installer</title>
    </head>
    <body>
        <h1>Installer</h1>
        <p>Bitte gib im folgenden Formular deine Datenbankdaten an und klicke anschlie&szlig;end auf "Weiter".</p>
        <form action="install.php" method="post">
            <p>Datenbank Adresse</p>
            <input type="text" placeholder="localhost" name="db_host"><br>
            <p>Datenbank Name</p>
            <input type="text" placeholder="my_db" name="db_name"><br>
            <p>Datenbank Benutzername</p>
            <input type="text" placeholder="gayLord1998" name="db_user"><br>
            <p>Datenbank Password</p>
            <input type="password" placeholder="Test00" name="db_pass"><br>
            <br>
            <input type="submit" value="Weiter" name="weiter"/>
        </form>
    </body>
</html>