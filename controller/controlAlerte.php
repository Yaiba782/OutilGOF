<?php
    /**
     * Created by Yaiba.
     * Date: 11/08/2016
     * Time: 15:04
     */

    include_once(__DIR__.'/../model/modelsLoader.php');
    include_once(__DIR__.'/../includes/connexion.php');

    function alerteInit(){
        $alertesAll = "SELECT * FROM alerte WHERE supprimee = 0";
        $alertesAll = $GLOBALS['connexion']->prepare($alertesAll);
        $alertesAll->execute();

        $alertesAll = $alertesAll->fetchAll(PDO::FETCH_ASSOC);


        foreach($alertesAll as $key => $alerte){
            if($alerte['id_type_intervention']==7){
                $onglet['dispoExploitation'][] = $alerte;
            }
            if($alerte['id_type_intervention']==11){
                $onglet['rdvModifie'][] = $alerte;
            }
            if($alerte['id_type_intervention']==9){
                $onglet['interventionFin'] = $alerte;
            }
            if($alerte['id_type_intervention']==10){
                $onglet['interventionDebut'] = $alerte;
            }
        }


    }