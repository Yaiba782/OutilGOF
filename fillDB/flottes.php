<?php
/**
 * Created by Yaiba.
 * Date: 17/12/15
 * Time: 11:55
 */
    echo '<pre>';

    include(dirname(__FILE__) . '/../model/modelsLoader.php');
    include(dirname(__FILE__).'/../includes/includes.php');

    $url = '../files/xls/MR SLT.xls';

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
            $flottes[$i] = new flotte($listeMateriel[$i][7], null, $listeMateriel[$i][6], $connexion);
        }
        $i++;
    }

    foreach($flottes as $flotte){
        $flotte->createInDatabase($connexion);
    }