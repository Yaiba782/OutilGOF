<?php
    /**
     * Created by Yaiba.
     * Date: 19/05/2016
     * Time: 14:29
     */
    include_once(dirname(__FILE__).'/../includes/includes.php');
    include_once(dirname(__FILE__).'/../model/modelsLoader.php');



    /*
     * Fonction permettant de récupérer le MR par son ID aussi (Id = Clef GMAO)
     * */
    function getMRByClefGmao($clef){
        $query = " SELECT *
                   FROM materiel m
                    WHERE m.id_materiel=".intval($clef);

        $object = $GLOBALS['connexion']->prepare($query);
        $object->execute();
        $liste = $object->fetch(PDO::FETCH_ASSOC);


        $materiel = new materiel(intval($liste['id_materiel']),$liste['serie'],$liste['numero'], $liste['numero_europe'],intval($liste['id_stf']),intval($liste['id_flotte']),$liste['statut_operationnel'],$liste['etat_acquisition'],$liste['situation_materiel'],$liste['site_realisateur'],$liste['id_coupon'],$GLOBALS['connexion'],$liste['serie']);

        return $materiel;
    }

    /*
     * Fonction allant chercher les différentes restrictions sur le matériel
     * */

    function getRestrictionsById($id){
        $restrictions = array();

        $query = "  SELECT *
                    FROM restriction r
                    WHERE r.id_materiel=".intval($id)."
                    AND r.statut='POSEE'";

        $object = $GLOBALS['connexion']->prepare($query);
        $object->execute();
        $liste = $object->fetchAll(PDO::FETCH_ASSOC);

        foreach($liste as $list){
            $restrictions[] = new restriction($list['id_restriction'],$list['description'],$list['categorie'],$list['motif_de_pose'],$list['date_de_pose'],$list['id_flotte'],$list['id_materiel'],$list['intervention_origine'],$list['statut']);
        }
        return $restrictions;
    }
    // Va chercher les différents équipements liés à l'ID d'un materiel
    function getEquipementById($id){
        $equipement= array();

        $query = "  SELECT *
                    FROM equipement_special e
                    WHERE e.id_materiel=".intval($id);

        $object = $GLOBALS['connexion']->prepare($query);
        $object->execute();
        $liste = $object->fetchAll(PDO::FETCH_ASSOC);

        foreach($liste as $list){
            $equipement[] = $list;
        }
        return $equipement;
    }

    // TODO | Créer la fonction getHistorique et passer en paramètre combien de jours en arrière

    function getHistoriqueById($id, $days){

    }


    /*
     *
     *
     *
     * CIMETIERE DE FONCTIONS MON POTE
     *
     *
     *
     */



    /*    function getAllMR(){
            $query = " SELECT *
                       FROM materiel m";

            $object = $GLOBALS['connexion']->prepare($query);
            $object->execute();
            $liste = $object->fetchAll(PDO::FETCH_ASSOC);

            $i=0;
            foreach($liste as $key => $value){
                $materiel[$i] = new materiel(intval($value['id_materiel']),$value['serie'],$value['numero'], $value['numero_europe'],intval($value['id_stf']),intval($value['id_flotte']),$value['statut_operationnel'],$value['etat_acquisition'],$value['situation_materiel'],intval($value['id_site_realisateur']),$value['id_coupon']);
                $i++;
            }

            return $materiel;
        }
        function getMRByNumero($numero)
        {
            $query = " SELECT *
                       FROM materiel m
                       WHERE m.numero = '" . $numero . "'";

            $object = $GLOBALS['connexion']->prepare($query);
            $object->execute();
            $liste = $object->fetch(PDO::FETCH_ASSOC);

            $materiel = new materiel(intval($liste['id_materiel']), $liste['serie'], $liste['numero'], $liste['numero_europe'], intval($liste['id_stf']), intval($liste['id_flotte']), $liste['statut_operationnel'], $liste['etat_acquisition'], $liste['situation_materiel'], intval($liste['id_site_realisateur']), $liste['id_coupon']);

            return $materiel;
        }
        function getMRBySerie($serie){
            $query = " SELECT *
                       FROM materiel m
                       WHERE m.serie ='".$serie."'";

            $object = $GLOBALS['connexion']->prepare($query);
            $object->execute();
            $liste = $object->fetchAll(PDO::FETCH_ASSOC);

            $i=0;
            foreach($liste as $key => $value){
                $materiel[$i] = new materiel(intval($value['id_materiel']),$value['serie'],$value['numero'], $value['numero_europe'],intval($value['id_stf']),intval($value['id_flotte']),$value['statut_operationnel'],$value['etat_acquisition'],$value['situation_materiel'],intval($value['id_site_realisateur']),$value['id_coupon']);
                $i++;
            }

            return $materiel;
        }
        function getMRByIdFlotte($flotte){
            $query = " SELECT *
                       FROM materiel m
                       WHERE m.id_flotte =".intval($flotte);

            $object = $GLOBALS['connexion']->prepare($query);
            $object->execute();
            $liste = $object->fetchAll(PDO::FETCH_ASSOC);

            $i=0;
            foreach($liste as $key => $value){
                $materiel[$i] = new materiel(intval($value['id_materiel']),$value['serie'],$value['numero'], $value['numero_europe'],intval($value['id_stf']),intval($value['id_flotte']),$value['statut_operationnel'],$value['etat_acquisition'],$value['situation_materiel'],intval($value['id_site_realisateur']),$GLOBALS['connexion']);
                $i++;
            }

        }
    /*
    function getMRByIdStf($id_stf){
        $query = " SELECT *
                   FROM materiel m
                   WHERE m.id_stf=".intval($id_stf);

        $object = $GLOBALS['connexion']->prepare($query);
        $object->execute();
        $liste = $object->fetchAll(PDO::FETCH_ASSOC);

        $i=0;
        foreach($liste as $key => $value){
            $materiel[$i] = new materiel($value['id_materiel'],$value['serie'],$value['numero'], $value['numero_europe'],intval($value['id_stf']),intval($value['id_flotte']),$value['statut_operationnel'],$value['etat_acquisition'],$value['situation_materiel'],intval($value['id_site_realisateur']),$value['id_coupon']);
            $i++;
        }

        return $materiel;
    }
    function getMRByStatut($statut){
        $query = " SELECT *
                   FROM materiel m
                   WHERE m.statut_operationnel='".$statut."'";

        $object = $GLOBALS['connexion']->prepare($query);
        $object->execute();
        $liste = $object->fetchAll(PDO::FETCH_ASSOC);

        $i=0;
        foreach($liste as $key => $value){
            $materiel[$i] = new materiel($value['id_materiel'],$value['serie'],$value['numero'], $value['numero_europe'],intval($value['id_stf']),intval($value['id_flotte']),$value['statut_operationnel'],$value['etat_acquisition'],$value['situation_materiel'],intval($value['id_site_realisateur']),$value['id_coupon']);
            $i++;
        }

        return $materiel;
    }
    */
