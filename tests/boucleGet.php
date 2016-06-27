<?php
    /**
     * Created by Yaiba.
     * Date: 26/06/2016
     * Time: 16:08
     */
    include('./testSR.php');
    $opt = array( 'http' =>
        array(
            'method' => 'GET',
            'header' => 'Authorization: Basic FjiezofGzhFKEZfezp= '
        )
    );
    $context = stream_context_create($opt);

    // On va chercher les SR de priorité 1
    $obligatoire = "SELECT diminutif_site_realisateur FROM site_realisateur WHERE priorite = 1";
    $obligatoire = $GLOBALS['connexion']->prepare($obligatoire);
    $obligatoire->execute();
    $listeSR = $obligatoire->fetchAll(PDO::FETCH_ASSOC);

    $time = time();
    while (time()<$time+30){
        foreach($listeSR['diminutif_site_realisateur'] as $sr){
            $url = "http://x64lmwbiix2.lamulatiere.dsit.sncf.fr:11280/OsmoBoard/managementVisuel/getData/".$sr;

            $result = file_get_contents($url,false,$context);
        }
        // On va chercher les SR de priorite 2 et 3
        $priorite = "SELECT diminutif_site_realisateur FROM site_realisateur WHERE priorite = 2";
        $paspriorite = "SELECT diminutif_site_realisateur FROM site_realisateur WHERE priorite = 3";

        $priorite = $GLOBALS['connexion']->prepare($priorite);
        $priorite->execute();

        $paspriorite = $GLOBALS['connexion']->prepare($paspriorite);
        $paspriorite->execute();


        $listePriorite = $priorite->fetchAll(PDO::FETCH_ASSOC);
        $listePasPriorite = $paspriorite->fetchAll(PDO::FETCH_ASSOC);

    }
