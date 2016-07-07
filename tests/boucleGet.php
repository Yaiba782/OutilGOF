<?php
    /**
     * Created by Yaiba.
     * Date: 26/06/2016
     * Time: 16:08
     */
    set_time_limit(-1);
    include('../includes/connexion.php');
    include('../model/modelsLoader.php');
    $opt = array( 'http' =>
        array(
            'method' => 'GET',
            'header' => 'Authorization: Basic '.base64_encode('9503915T:Sup4sswd').' '
        )
    );
    $context = stream_context_create($opt);

    // On va chercher les SR de priorité 1
    $obligatoire = "SELECT diminutif_site_realisateur FROM site_realisateur WHERE priorite = 1";
    $obligatoire = $GLOBALS['connexion']->prepare($obligatoire);
    $obligatoire->execute();
    $listeSR = $obligatoire->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    $time = time();
    #while (time()<$time+30){
        foreach($listeSR as $sr){
            $url = "http://x64lmwbiix2.lamulatiere.dsit.sncf.fr:11280/OsmoBoard/managementVisuel/getData/".$sr['diminutif_site_realisateur'];
            $apiAnswer = file_get_contents($url,false,$context);

            $apiJson = json_decode($apiAnswer);
            $apiArray =get_object_vars($apiJson);

            //On récup toutes les DI sans RDV dans un tableau
            $diSansRdvArray = $apiArray['orphanInterventions'];

            foreach($diSansRdvArray as $orphanDi){
                $diBrut = get_object_vars($orphanDi);
                $diFin = new intervention($diBrut['id'],materiel::findIdByNumero($diBrut['efNumberMaterielRoulant'],$GLOBALS['connexion']),$diBrut['label'],null,$diBrut['status'],$diBrut['codeOperation'],null,null,apiTime($diBrut['estimatedStartDate']),apiTime($diBrut['estimatedEndDate']),$diBrut['realEndDate'],$diBrut['site'],null, null, null,0,apiTime($diBrut['realStartDate']));
                $diFin->insertDb($GLOBALS['connexion']);
            }

            // On récup les RDV et les DI liées
            $rdvArray = get_object_vars($apiArray['rdvs']);
            foreach($rdvArray as $rdv){
                $rdv = get_object_vars($rdv);

                $rdvObject = new rdv($rdv['id'],apiTime($rdv['startDate']),apiTime($rdv['endDate']),null,null,null,null);
                foreach ($rdv['interventions'] as $intervention){
                    $diBrut = get_object_vars($intervention);
                    $di = new intervention($diBrut['id'],materiel::findIdByNumero($diBrut['efNumberMaterielRoulant'],$GLOBALS['connexion']),$diBrut['label'],null,$diBrut['status'],$diBrut['codeOperation'],$rdvObject->getDateDebutRdv(),$rdvObject->getDateFinRdv(),apiTime($diBrut['estimatedStartDate']),apiTime($diBrut['estimatedEndDate']),$diBrut['realEndDate'],$diBrut['site'],null, null, null,$rdvObject->getIdRdv(),apiTime($diBrut['realStartDate']));
                    $di->insertDb($GLOBALS['connexion']);
                }

                // On envoie les RDV en base
                $rdvObject->setIdMateriel($di->getIdMateriel());
                $rdvObject->setSiteRealisateur($sr['diminutif_site_realisateur']);
                $rdvObject->sendDb($GLOBALS['connexion']);

            }
        }
        // On va chercher les SR de priorite 2 et 3
        $priorite = "SELECT diminutif_site_realisateur FROM site_realisateur WHERE priorite = 2";
        $paspriorite = "SELECT diminutif_site_realisateur FROM site_realisateur WHERE priorite = 3 AND checked = 0";

        $priorite = $GLOBALS['connexion']->prepare($priorite);
        $priorite->execute();

        $paspriorite = $GLOBALS['connexion']->prepare($paspriorite);
        $paspriorite->execute();

        $listePriorite = $priorite->fetchAll(PDO::FETCH_ASSOC);
        $listePasPriorite = $paspriorite->fetchAll(PDO::FETCH_ASSOC);

    #}
