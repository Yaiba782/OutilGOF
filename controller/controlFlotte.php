<?php

    /*
    function getFlottesByIdGof($id_gof){
        $query = " SELECT *
                   FROM gof_to_flotte gtf
                   WHERE gtf.id_gof=".intval($id_gof);

        $object = $GLOBALS['connexion']->prepare($query);
        $object->execute();
        $liste = $object->fetchAll(PDO::FETCH_ASSOC);

        $i=0;
        foreach($liste as $key => $value){
            $flottes[$i] = $value['id_flotte'];
            $i++;
        }
        return $flottes;
    }
    */