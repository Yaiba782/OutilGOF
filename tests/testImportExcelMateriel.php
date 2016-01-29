<?php
/**
 * Created by Yaiba.
 * Date: 09/12/15
 * Time: 17:01
 */
    set_time_limit(360);
    ini_set('memory_limit', '512M');    // FAIRE ATTENTION À LA MEMOIRE, MAYBE IMPORTER LES FICHIERS SERIE PAR SERIE
                                        // 512MO étant tout de même suffisants pour charger 20.000 DI

    echo '<meta charset="utf8"><pre>';

	include(dirname(__FILE__) . '/../model/modelsLoader.php');
    include(dirname(__FILE__).'/../includes/includes.php');
	$url = '../files/xls/1400MR.xls';

	$file = PHPExcel_IOFactory::load($url);


	$sheet = $file->getActiveSheet(); // Se place sur la feuille principale

    $listeMateriel = array();
    $materiel = array();
    $modele = array();
    $i=0;

	foreach ($sheet->getRowIterator() as $row){
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(FALSE);
        // This loops through all cells,
        //    even if a cell value is not set.
        // By default, only cells that have a value
        //    set will be iterated.

        foreach ($cellIterator as $cell) {
            if ($i == 0) {
                $modele[] = $cell->getValue();
            }else{
                $listeMateriel[$i][] = $cell->getValue();
            }
        }
        if($i != 0){
            $flottes[$i] = new flotte($listeMateriel[$i][7], null, $listeMateriel[$i][6], $_SESSION['connexion']);
            $locomotives[$i] = new materiel(null, $listeMateriel[$i][4], $listeMateriel[$i][0], $listeMateriel[$i][1], $listeMateriel[$i][6], $listeMateriel[$i][7], $listeMateriel[$i][10], $listeMateriel[$i][2],$listeMateriel[$i][8], $listeMateriel[$i][9], $listeMateriel[$i][11], $listeMateriel[$i][12]);

        }
        $i++;
    }

  #  print_r($locomotives);
    foreach($flottes as $flotte){
        $flotte->createFlotteInDatabase($_SESSION['connexion']);
    }
    foreach($locomotives as $locomotive){
        $locomotive->createMaterielInDatabase($locomotive->getIdStf(),$_SESSION['connexion']);
        echo '<br />';
    }


