<?php
/**
 * Created by Yaiba.
 * Date: 01/02/16
 * Time: 11:58
 */
    include_once('../../includes/includes.php');
    include_once('../../model/modelsLoader.php');

    /*
     *
     * TESTE LE LOGIN UTILISATEUR
     *
     * */
    function testUser($login, $mdp){
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
                // TODO REUSSIR A REGLER LE SOUCI DE L'OBJET GOF QUI NE PASSE PAS HORS DE LA FONCTION
                $_SESSION['gof'] = new gof($gof['id_gof'], $gof['id_stf'], $gof['nom_gof'], $gof['access_lvl']);
            }
        }

        return $reponse;
    }
    function disconnectUser(){
        session_destroy();
        unset($_SESSION);
        session_start();
    }