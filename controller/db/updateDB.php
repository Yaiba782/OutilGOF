<?php
    /**
     * Created by Yaiba.
     * Date: 24/03/2016
     * Time: 11:05
     */

    include_once('../../includes/includes.php');
    include_once('../../model/modelsLoader.php');

    // Changes the maximum execution time for this script to 1 hour
    set_time_limit(3600);

    //Changes the maximum memory used by this script to 1Go
    ini_set('memory_limit', '1024M');


    /*
     *
     * Function used to feed the database with the excel files
     * This is where you will have to update fields if their name changes
     *
     */
    function sendDB($file){
        // Sets the variable used in the return; Array with the answer of each file
        $reponse = array();

        // Demandes d'intervention
        if(isset($file['interventionFile']) && !empty($file['interventionFile'])){

        }

        // Rendez vous
        if(isset($file['rdvFile']) && !empty($file['rdvFile'])){

        }

        // Matériel
        if(isset($file['materielFile']) && !empty($file['materielFile'])){
            // Loads the file
            $excel = PHPExcel_IOFactory::load($file['materielFile']['tmp_name']);

            // Gets the active sheet
            $sheet = $excel->getActiveSheet();

            // Sets the headers in an array
            $headers = $sheet->rangeToArray('A1:AAA1');

            $i = 0;
            foreach($sheet->getRowIterator() as $row){
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE);

                // Instanciates objects Materiel
                if($i!=0){
                    $id_materiel= $sheet->getCellByColumnAndRow(intval(array_search('Clé GMAO',$headers[0])),$row->getRowIndex())->getValue();
                    $serie = $sheet->getCellByColumnAndRow(intval(array_search('Série',$headers[0])),$row->getRowIndex())->getValue();
                    $numero = $sheet->getCellByColumnAndRow(intval(array_search('N° immatriculation EF',$headers[0])),$row->getRowIndex())->getValue();
                    $numero_europe = $sheet->getCellByColumnAndRow(intval(array_search('N° immatriculation européenne',$headers[0])),$row->getRowIndex())->getValue();
                    $nom_stf = $sheet->getCellByColumnAndRow(intval(array_search('STF',$headers[0])),$row->getRowIndex())->getValue();
                    $id_flotte = $sheet->getCellByColumnAndRow(intval(array_search('Flotte',$headers[0])),$row->getRowIndex())->getValue();
                    $statut_operationnel = $sheet->getCellByColumnAndRow(intval(array_search('Statut opérationnel',$headers[0])),$row->getRowIndex())->getValue();
                    $etat_acquisition = $sheet->getCellByColumnAndRow(intval(array_search('Etat d\'acquisition',$headers[0])),$row->getRowIndex())->getValue();
                    $situation_materiel = $sheet->getCellByColumnAndRow(intval(array_search('Situation matériel',$headers[0])),$row->getRowIndex())->getValue();
                    $site_realisateur = $sheet->getCellByColumnAndRow(intval(array_search('Site réalisateur',$headers[0])),$row->getRowIndex())->getValue();
                    $coupon = $sheet->getCellByColumnAndRow(intval(array_search('Coupon',$headers[0])),$row->getRowIndex())->getValue();

                    $materiel = new materiel($id_materiel, $serie, $numero, $numero_europe, $nom_stf, $id_flotte, $statut_operationnel, $etat_acquisition, $situation_materiel, $site_realisateur , $coupon, $GLOBALS['connexion']);


                }
                $i++;

            }
            $reponse[] = "Import des flottes réussi.";
        }

        // Restrictions
        if(isset($file['restrictionFile']) && !empty($file['restrictionFile'])){

        }

        // Flottes
        if(isset($file['flotteFile']) && !empty($file['flotteFile'])){
            // Loads the file
            $excel = PHPExcel_IOFactory::load($file['flotteFile']['tmp_name']);

            // Gets the active sheet
            $sheet = $excel->getActiveSheet();

            // Sets the headers in an array
            $headers = $sheet->rangeToArray('A1:AAA1');

            $i = 0;
            foreach($sheet->getRowIterator() as $row){
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE);

                // Instanciates objects Flotte
                if($i!=0){
                    $id_flotte = $sheet->getCellByColumnAndRow(intval(array_search('Flotte',$headers[0])),$row->getRowIndex())->getValue();
                    $nom_flotte = $sheet->getCellByColumnAndRow(intval(array_search('Description',$headers[0])),$row->getRowIndex())->getValue();
                    $stf= $sheet->getCellByColumnAndRow(intval(array_search('STF',$headers[0])),$row->getRowIndex())->getValue();
                    $flotte = new flotte($id_flotte,$nom_flotte,trim($stf, "\n"),$GLOBALS['connexion']);

                    // Creates Flotte in Database
                    $flotte->createFlotteInDatabase($GLOBALS['connexion']);
                }
                $i++;

            }
            $reponse[] = "Import des flottes réussi.";
        }

        // Return of the answer once everything tried to be uploaded in DB
        return $reponse;
    }