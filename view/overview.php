<?php
/**
 * Created by Yaiba.
 * Date: 01/02/16
 * Time: 16:29
 */
    include_once(__DIR__.'/../model/modelsLoader.php');
    session_start();
    include_once(__DIR__.'/../controller/controlOverview.php');
    include(__DIR__.'/../includes/html/htmlHead.php');

    // Teste si l'utilisateur est bien connecté
    testConnexion();


    overview();
