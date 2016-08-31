<?php
    /**
     * Created by Yaiba.
     * Date: 27/05/2016
     * Time: 14:47
     */
    include_once(dirname(__FILE__).'/../includes/includes.php');
    include_once(dirname(__FILE__).'/../model/modelsLoader.php');


    // id_type_alerte = 3 est le type alerte liée aux DI dont la date de butée <= J
    function getOAI($idStf){
        $query = "SELECT * FROM alerte WHERE id_stf='".intval($idStf)."' AND id_type_alerte = '3' AND supprimee='0'";

        $querySent = $GLOBALS['connexion']->prepare($query);
        $querySent->execute();
        $result = $querySent->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    // Cherche dans les DI lesquelles sont à $HEURE de la butée
    function getPerimeSoon($idStf, $heure){
        if($heure == 48){
            $id_type_alerte = 4;
        }elseif($heure == 72){
            $id_type_alerte = 5;
        }elseif($heure == 96){
            $id_type_alerte = 6;
        }

        $query = "SELECT * FROM alerte WHERE id_stf='".intval($idStf)."' AND id_type_alerte = '".$id_type_alerte."' AND supprimee='0'";

        $querySent = $GLOBALS['connexion']->prepare($query);
        $querySent->execute();
        $result = $querySent->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }