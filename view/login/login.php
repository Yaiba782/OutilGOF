<?php
/**
 * Created by Yaiba.
 * Date: 01/02/16
 * Time: 12:01
 */
    session_start();

    include(dirname(__FILE__).'/../../includes/html/htmlHead.php');
    include_once(dirname(__FILE__).'/../../includes/includes.php');
    include_once(dirname(__FILE__).'/../../controller/login/controlLogin.php');

    echo '
    <div class="col-lg-10 col-lg-offset-1 col-xs-12">
        <form class="form-horizontal col-lg-12" action="login.php" method="post">
            <div class="form-group">
                <legend>Connexion</legend>
                <div class="row">
                    <label for="login" class="col-lg-2 control-label">Login :</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="login" id="login"required placeholder="Login" />
                    </div>
                </div>
                <div class="row">
                    <label for="mdp" class="col-lg-2 control-label">Mot de passe :</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" name="mdp" required placeholder="*********" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <input type="submit" class="col-lg-offset-1 btn btn-default " value="Connexion">
                </div>
            </div>
        </form>
    </div>';

    if(isset($_POST['login']) && isset($_POST['mdp'])){
        $reponse = testUser($_POST['login'],$_POST['mdp']);

        // Affiche la réponse du test
        echo '<div class="col-lg-6 col-lg-offset-3 '.$reponse['class'].'">'.$reponse['text'].'</div>';
    }else{
        disconnectUser();
    }