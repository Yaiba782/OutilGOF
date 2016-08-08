<?php
/**
 * Created by Yaiba.
 * Date: 01/02/16
 * Time: 11:58
 */
    include_once(dirname(__FILE__).'/../../includes/includes.php');
    include_once(dirname(__FILE__).'/../../model/modelsLoader.php');
    /*
     *
     * TESTE LE LOGIN UTILISATEUR
     *
     * */
    function testUser($login, $mdp){
        // Fonctionne avec LDAP

        $domain = "COMMUN.AD.SNCF.FR";
        $ldapconnect = ldap_connect($domain,389);
        if(ldap_bind($ldapconnect,$login."@".$domain,$mdp)){

            $query = "SELECT * FROM gof WHERE login='".$login."';";
            $query = $GLOBALS['connexion']->prepare($query);
            $query->execute();
            $gof = $query->fetch(PDO::FETCH_ASSOC);

            $log = $login." s'est connecté le ".date("Y-m-d H:i:s");
            to_log($log,$GLOBALS['connexion']);

            $_SESSION['gof'] = new gof($gof['id_gof'], $gof['id_stf'], $gof['nom_gof'], $gof['access_lvl']);
        }

        // Fonctionne hors LDAP
        /**
        $reponse['class'] = 'bg-danger';
        $reponse['text'] = 'Erreur';
        $reponse['script'] = null;
        $reponse['gof'] = null;

        $query = "SELECT * FROM gof WHERE login='".md5($login)."';";
        $query = $GLOBALS['connexion']->prepare($query);
        $query->execute();

        $gof = $query->fetch(PDO::FETCH_ASSOC);

        // Si l'utilisateur n'existe pas
        if($gof === false){
            $reponse['class'] = 'bg-warning';
            $reponse['text'] = 'Login inexistant.';
        }else{
            // Si le mot de passe est incorrect
            if(hash('sha512','@!#'.$mdp.'#!@&') != $gof['mdp'] && $gof['active']==1){
                $reponse['class'] = 'bg-danger';
                $reponse['text'] = 'Mauvais mot de passe.';
            // Si le compte est suspendu
            }elseif(hash('sha512','@!#'.$mdp.'#!@&') != $gof['mdp'] && $gof['active']==0){
                $reponse['class'] = 'bg-danger';
                $reponse['text'] = 'Compte suspendu.';
            // Si le login et le mdp sont corrects
            }else{
                $reponse['class'] = 'bg-success';
                $reponse['text'] = 'Connexion réussie. <a href="../overview.php">Afficher la page d\'accueil</a>';

                // Crée un nouvel objet GOF en variable de session
                $_SESSION['gof'] = new gof($gof['id_gof'], $gof['id_stf'], $gof['nom_gof'], $gof['access_lvl']);
            }
        }
         **/
    }
    function disconnectUser(){
        session_destroy();
        unset($_SESSION);
        session_start();
    }