<?php
/**
 * Created by Yaiba.
 * Date: 01/02/16
 * Time: 16:29
 */
    include_once(__DIR__.'/../model/modelsLoader.php');
    session_start();
    include_once(__DIR__.'/../model/flotte.php');
    include_once(__DIR__.'/../model/materiel.php');
    include_once(__DIR__.'/../controller/controlOverview.php');
    include(__DIR__.'/../includes/html/htmlHead.php');

    // Teste si l'utilisateur est bien connecté
    testConnexion();

    if(isset($_SESSION['gof']) && $_SESSION['gof']->getAccessLvl() <1){

    }
