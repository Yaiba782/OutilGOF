<?php
/**
 * Created by Yaiba.
 * Date: 28/01/16
 * Time: 14:09
 */

    include_once(dirname(__FILE__).'/../includes/includes.php');
    include_once(dirname(__FILE__) . '/../model/modelsLoader.php');

    function getAllMR(){
        $query = " SELECT *
                   FROM materiel m";

        $object = $_SESSION['connexion']->prepare($query);
        $object->execute();
        $liste = $object->fetchAll(PDO::FETCH_ASSOC);

        $i=0;
        foreach($liste as $key => $value){
            $materiel[$i] = new materiel(intval($value['id_materiel']),$value['serie'],$value['numero'], $value['numero_europe'],intval($value['id_stf']),intval($value['id_flotte']),$value['statut_operationnel'],$value['clef_gmao'],$value['etat_acquisition'],$value['situation_materiel'],intval($value['id_site_realisateur']),$value['id_coupon']);
            $i++;
        }

        return $materiel;
    }
    function getMRByNumero($numero){
        $query = " SELECT *
                   FROM materiel m
                   WHERE m.numero = '".$numero."'";

        $object = $_SESSION['connexion']->prepare($query);
        $object->execute();
        $liste = $object->fetch(PDO::FETCH_ASSOC);

        $materiel = new materiel(intval($liste['id_materiel']),$liste['serie'],$liste['numero'], $liste['numero_europe'],intval($liste['id_stf']),intval($liste['id_flotte']),$liste['statut_operationnel'],$liste['clef_gmao'],$liste['etat_acquisition'],$liste['situation_materiel'],intval($liste['id_site_realisateur']),$liste['id_coupon']);

        return $materiel;
    }
    // TODO le reste...
    function getMRBySerie($serie){
        $query = " SELECT *
                   FROM materiel m
                   WHERE m.serie ='".$serie."'";

        $object = $_SESSION['connexion']->prepare($query);
        $object->execute();
        $liste = $object->fetchAll(PDO::FETCH_ASSOC);

        $i=0;
        foreach($liste as $key => $value){
            $materiel[$i] = new materiel(intval($value['id_materiel']),$value['serie'],$value['numero'], $value['numero_europe'],intval($value['id_stf']),intval($value['id_flotte']),$value['statut_operationnel'],$value['clef_gmao'],$value['etat_acquisition'],$value['situation_materiel'],intval($value['id_site_realisateur']),$value['id_coupon']);
            $i++;
        }

        return $materiel;
    }
    function getMRByIdFlotte($flotte){
        $query = " SELECT *
                   FROM materiel m
                   WHERE m.id_flotte =".intval($flotte);

        $object = $_SESSION['connexion']->prepare($query);
        $object->execute();
        $liste = $object->fetchAll(PDO::FETCH_ASSOC);

        $i=0;
        foreach($liste as $key => $value){
            $materiel[$i] = new materiel(intval($value['id_materiel']),$value['serie'],$value['numero'], $value['numero_europe'],intval($value['id_stf']),intval($value['id_flotte']),$value['statut_operationnel'],$value['clef_gmao'],$value['etat_acquisition'],$value['situation_materiel'],intval($value['id_site_realisateur']),$value['id_coupon']);
            $i++;
        }

        return $materiel;
    }
    function getMRByClefGmao($clef){
        $query = " SELECT *
                   FROM materiel m
                    WHERE m.clef_gmao=".intval($clef);

        $object = $_SESSION['connexion']->prepare($query);
        $object->execute();
        $liste = $object->fetch(PDO::FETCH_ASSOC);

        $materiel = new materiel(intval($liste['id_materiel']),$liste['serie'],$liste['numero'], $liste['numero_europe'],intval($liste['id_stf']),intval($liste['id_flotte']),$liste['statut_operationnel'],$liste['clef_gmao'],$liste['etat_acquisition'],$liste['situation_materiel'],intval($liste['id_site_realisateur']),$liste['id_coupon']);

        return $materiel;
    }
    function getMRByIdStf($id_stf){
        $query = " SELECT *
                   FROM materiel m
                   WHERE m.id_stf=".intval($id_stf);

        $object = $_SESSION['connexion']->prepare($query);
        $object->execute();
        $liste = $object->fetchAll(PDO::FETCH_ASSOC);

        $i=0;
        foreach($liste as $key => $value){
            $materiel[$i] = new materiel($value['id_materiel'],$value['serie'],$value['numero'], $value['numero_europe'],intval($value['id_stf']),intval($value['id_flotte']),$value['statut_operationnel'],$value['clef_gmao'],$value['etat_acquisition'],$value['situation_materiel'],intval($value['id_site_realisateur']),$value['id_coupon']);
            $i++;
        }

        return $materiel;
    }
    function getMRByStatut($statut){
        $query = " SELECT *
                   FROM materiel m
                   WHERE m.statut_operationnel='".$statut."'";

        $object = $_SESSION['connexion']->prepare($query);
        $object->execute();
        $liste = $object->fetchAll(PDO::FETCH_ASSOC);

        $i=0;
        foreach($liste as $key => $value){
            $materiel[$i] = new materiel($value['id_materiel'],$value['serie'],$value['numero'], $value['numero_europe'],intval($value['id_stf']),intval($value['id_flotte']),$value['statut_operationnel'],$value['clef_gmao'],$value['etat_acquisition'],$value['situation_materiel'],intval($value['id_site_realisateur']),$value['id_coupon']);
            $i++;
        }

        return $materiel;
    }