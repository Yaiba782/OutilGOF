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
	$url = '../files/xls/interventions.xls';

	$file = PHPExcel_IOFactory::load($url);


	$sheet = $file->getActiveSheet(); // Se place sur la feuille principale

    $listeInterventions = array();
    $intervention = array();
    $modele = array();
    $i=0;
  #  $tempsecoule = microtime(true);

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
                $listeInterventions[$i][] = $cell->getValue();
            }
        }
        $i++;
    }
 #   echo microtime(true)-$tempsecoule;
    print_r($modele);
	echo '</pre>';


    foreach($listeInterventions as $intervention){
        foreach($intervention as $key => $value){/*
            equivalentRequeteIntervention($key,$value); // TODO | Créer une fonction permettant de trouver le nom équivalent en DB
                                                        // TODO |       et renvoyer la requête correspondante
                                                        // TODO | Créer la classe intervention
*/        }
    }








