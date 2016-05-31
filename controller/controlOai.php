<?php
    /**
     * Created by Yaiba.
     * Date: 27/05/2016
     * Time: 14:47
     */
    include_once(dirname(__FILE__).'/../includes/includes.php');
    include_once(dirname(__FILE__).'/../model/modelsLoader.php');


    // id_type_alerte = 3 est le type alerte liée aux DI dont la date de butée <= J
    function getOAI($idGof){
        $query = "SELECT * FROM alerte WHERE id_gof='".intval($idGof)."' AND id_type_alerte = '3' AND supprimee='0'";

        $querySent = $GLOBALS['connexion']->prepare($query);
        $querySent->execute();
        $result = $querySent->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    // id_type_alerte = 4 est le type alerte liée aux DI dont la date de butée < 48h
    function getPerimeSoon($idGof){
        $query = "SELECT * FROM alerte WHERE id_gof='".intval($idGof)."' AND id_type_alerte = '4' AND supprimee='0'";

        $querySent = $GLOBALS['connexion']->prepare($query);
        $querySent->execute();
        $result = $querySent->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }