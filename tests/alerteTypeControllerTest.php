<?php
    /**
     * Created by Yaiba.
     * Date: 07/04/2016
     * Time: 17:52
     */

    include('../includes/connexion.php');
    include('../model/modelsLoader.php');


    $functionsList = findAlertes('InTervEntion',$GLOBALS['connexion']);

    for($i="a";$i<"v";$i++){
        ${$i} = $i;
    }

    $di = new intervention($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n);
    $diOld = new intervention($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n);

