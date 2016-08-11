<?php
    /**
     * Created by Yaiba.
     * Date: 11/08/2016
     * Time: 15:01
     */

    include_once(__DIR__.'/../model/modelsLoader.php');
    session_start();
    include_once(__DIR__.'/../controller/controlAlerte.php');
    include(__DIR__.'/../includes/html/htmlHead.php');

    // Teste si l'utilisateur est bien connecté
    testConnexion();

    alerteInit();

