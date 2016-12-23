<?php
    include "mail.php";
    $formulaire = false;
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $formulaire = true;
        $email = htmlspecialchars($_POST['email']);
        $pseudo = htmlspecialchars($_POST['pseudo']);

        function_mail($email, 'carte de voeux', '_mail.html', array('PRENOM' => $pseudo));
        header( "Refresh:3; url=index.html");
    }
?>

<html>
    <head>
        <style>
            *{ padding: 0; margin: 0; }
            main{
                text-align: center;
                background: url('img/background.jpeg');
                width: 100vw;
                height: 100vh;
            }

            form{
                width: 50%;
                margin-left: auto;
                margin-right: auto;
                padding-top: 1em;
            }
            form label{
                width: 100%;
            }
            form input, form button{
                width: 100%;
                margin: 20px;
                padding: 20px;
            }
            h3, h4, h5{
                padding: 2em;
            }
        </style>
    </head>
    <body>
        <main>
            <?php
            if($formulaire){
            ?>
                <h3>Votre carte est envoyé à <?php echo $pseudo; ?></h3>
                <h4>à l'adresse <?php echo $email; ?></h4>
                <h5>Vous allez être ridirigé dans quelques instants</h5>
            <?php

            }
            else{

            ?>

                <h3>Pour envoyer votre carte de voeux vous devez indiquer le destinaire dans le fomulaire ci-dessous : </h3>
                <form action="index.php" method="post">
    				<label>E-mail de la personne devant recevoir vos voeux : </label>
    				<input type="text" name="email" placeholder="email" />
    				<input type="text" name="pseudo" placeholder="pseudo ou prénom" />
    				<button name="send-email">Envoyer la carte de voeux</button>
    			</form>

            <?php

            }

            ?>
        </main>
    </body>
</html>
