<?php
/**
 * Created by Yaiba.
 * Date: 17/12/15
 * Time: 10:49
 */

    include(dirname(__FILE__) . '/../model/modelsLoader.php');
    include(dirname(__FILE__).'/../includes/includes.php');

    $stfQuery = ' SELECT id_stf
                      FROM stf
                      WHERE diminutif_stf
                      LIKE "SLT"';

    $stf = $connexion->prepare($stfQuery);
    $stf->execute();
    $result = $stf->fetch(PDO::FETCH_ASSOC);

#    var_dump($result);
    foreach ($result as $key => $value){
       $id_stf = $value;
    }