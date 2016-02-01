<?php
/**
 * Created by Yaiba.
 * Date: 01/02/16
 * Time: 16:29
 */
    include_once(__DIR__.'/../model/modelsLoader.php');
    include_once(__DIR__.'/../controller/controlFlotte.php');
    include_once(__DIR__.'/../controller/controlMaterielRoulant.php');

    if(isset($_SESSION['gof']) && $_SESSION['gof']->getAccesLvl() <1){
        $flottes = getFlottesByIdGof($_SESSION['gof']->getId());

        $i=0;
        foreach($flottes as $key => $value){
            $listeMateriel[$i] = getMRByIdFlotte($value);
            $i++;
        }
    }
    vardump($GLOBALS);