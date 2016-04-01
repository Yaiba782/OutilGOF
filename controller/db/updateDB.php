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
        if(isset($file['interventionFile']) && !empty($file['interventionFile']['tmp_name'])){
            // Loads the file
            @$excel = PHPExcel_IOFactory::load($file['interventionFile']['tmp_name']);

            // Gets the active sheet
            $sheet = $excel->getActiveSheet();

            // Sets the headers in an array
            $headers = $sheet->rangeToArray('A1:AAA1');

            $i = 0;
            foreach($sheet->getRowIterator() as $row){
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE);

                // Instanciates objects Intervention
                if($i!=0){
                    $id_intervention = $sheet->getCellByColumnAndRow(intval(array_search('N°',$headers[0])),$row->getRowIndex())->getValue();
                    $id_materiel = $sheet->getCellByColumnAndRow(intval(array_search('Clé GMAO',$headers[0])),$row->getRowIndex())->getValue();
                    $libelle_intervention = $sheet->getCellByColumnAndRow(intval(array_search('Libellé de l\'intervention',$headers[0])),$row->getRowIndex())->getValue();
                    $type_intervention = $sheet->getCellByColumnAndRow(intval(array_search('Type DI',$headers[0])),$row->getRowIndex())->getValue();
                    $statut_intervention = $sheet->getCellByColumnAndRow(intval(array_search('Statut Intervention',$headers[0])),$row->getRowIndex())->getValue();
                    $code_operation_intervention = $sheet->getCellByColumnAndRow(intval(array_search('Code Opération',$headers[0])),$row->getRowIndex())->getValue();
                    $date_debut_previsionnel_intervention = $sheet->getCellByColumnAndRow(intval(array_search('Début prévisionnel',$headers[0])),$row->getRowIndex())->getValue();
                    $date_fin_previsionnelle = $sheet->getCellByColumnAndRow(intval(array_search('Fin prévisionnelle',$headers[0])),$row->getRowIndex())->getValue();
                    $date_fin_réelle = $sheet->getCellByColumnAndRow(intval(array_search('Date-heure de fin réelle',$headers[0])),$row->getRowIndex())->getValue();
                    $id_site_realisateur = $sheet->getCellByColumnAndRow(intval(array_search('Site',$headers[0])),$row->getRowIndex())->getValue();
                    $date_fin_optimale = $sheet->getCellByColumnAndRow(intval(array_search('Date optimale',$headers[0])),$row->getRowIndex())->getValue();
                    $id_coupon = $sheet->getCellByColumnAndRow(intval(array_search('N° de coupon',$headers[0])),$row->getRowIndex())->getValue();

                    $intervention = new intervention($id_intervention,$id_materiel,$libelle_intervention,$type_intervention,$statut_intervention,$code_operation_intervention,null,$date_debut_previsionnel_intervention,$date_fin_previsionnelle,$date_fin_réelle,$id_site_realisateur,$date_fin_optimale,$id_coupon);

                    // TODO | Créer la fonction pour envoyer la DI en DB
                    //$intervention->createInDatabase($GLOBALS['connexion']);

                }
                $i++;

            }
        }

        // Rendez vous
        if(isset($file['rdvFile']) && !empty($file['rdvFile']['tmp_name'])){
            // Loads the file
            @$excel = PHPExcel_IOFactory::load($file['rdvFile']['tmp_name']);

            // Gets the active sheet
            $sheet = $excel->getActiveSheet();

            // Sets the headers in an array
            $headers = $sheet->rangeToArray('A1:AAA1');

            $i = 0;
            foreach($sheet->getRowIterator() as $row){
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE);

                // Instanciates objects RDV
                if($i!=0){
                    // TODO | Créer le model RDV...
                    echo $sheet->getCellByColumnAndRow(intval(array_search('N° RDV',$headers[0])),$row->getRowIndex())->getValue()."<br />";
                }
                $i++;
            }
            $reponse[] = "Import des RDV réussi.";
        }

        // Matériel
        if(isset($file['materielFile']) && !empty($file['materielFile']['tmp_name'])){
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
                    $materiel->createMaterielInDatabase($nom_stf, $GLOBALS['connexion']);

                }
                $i++;

            }
            $reponse[] = "Import du matériel réussi.";
        }

        // Restrictions
        if(isset($file['restrictionFile']) && !empty($file['restrictionFile']['tmp_name'])){
            // Loads the file
            $excel = PHPExcel_IOFactory::load($file['restrictionFile']['tmp_name']);

            // Gets the active sheet
            $sheet = $excel->getActiveSheet();

            // Sets the headers in an array
            $headers = $sheet->rangeToArray('A1:AAA1');

            $i = 0;
            foreach($sheet->getRowIterator() as $row){
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE);

                // Instanciates objects Restriction
                if($i!=0){
                }
                $i++;
            }
            $reponse[] = "Import des restrictions réussi.";
        }

        // Flottes
        if(isset($file['flotteFile']) && !empty($file['flotteFile']['tmp_name'])){
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
                    $flotte = new flotte($id_flotte,$nom_flotte,trim($stf),$GLOBALS['connexion']);

                    vardump($flotte);
                    // Creates Flotte in Database
                    #$flotte->createFlotteInDatabase($GLOBALS['connexion']);
                }
                $i++;

            }
            $reponse[] = "Import des flottes réussi.";
        }

        // Return of the answer once everything tried to be uploaded in DB
        return $reponse;
    }