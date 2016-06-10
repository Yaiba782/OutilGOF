<?php
    /**
     * Created by Yaiba.
     * Date: 10/06/2016
     * Time: 15:35          // C'est ce jour que le code dégueulasse commença #MaisTantQueCaMarcheCaVa
     */

    include_once(dirname(__FILE__).'/../../includes/functions.php');
    include_once(dirname(__FILE__).'/../../includes/connexion.php');

    // Fichier appelé pour mettre à jour les alertes de date de butée. Doit être appelé au moins 1 fois par jour

    $jour = 60*60*24;

    // On cherche toutes les DI dont la date de butée est passée mais qui a moins de 15jours
    $query[] = "SELECT id_intervention,code_operation_intervention,id_materiel
                  FROM `intervention`
                  WHERE butee_technique <= \"".date('Y-m-d 23:59:00')."\"
                  AND butee_technique >= \"".date('Y-m-d 23:59:00', time()-(15*$jour))."\"";

    
    // On cherche toutes les DI dont la date de butée est dans les 48h
    $query[] = " SELECT id_intervention,code_operation_intervention,id_materiel
                  FROM `intervention`
                  WHERE butee_technique < \"".date('Y-m-d 23:59:00', time()+(2*$jour))."\"
                  AND butee_technique >= \"".date('Y-m-d 23:59:00')."\"";
    
    // On cherche toutes les DI dont la date de butée est dans les 72h
    $query[] = " SELECT id_intervention,code_operation_intervention,id_materiel
                  FROM `intervention`
                  WHERE butee_technique < \"".date('Y-m-d 23:59:00', time()+(3*$jour))."\"
                  AND butee_technique >= \"".date('Y-m-d 23:59:00', time()+(2*$jour))."\"";
    
    // On cherche toutes les DI dont la date de butée est dans les 96h
    $query[] = " SELECT id_intervention,code_operation_intervention,id_materiel
                  FROM `intervention`
                  WHERE butee_technique < \"".date('Y-m-d 23:59:00', time()+(4*$jour))."\"
                  AND butee_technique >= \"".date('Y-m-d 23:59:00', time()+(3*$jour))."\"";

    // On boucle sur chacune des requetes
    $temps = 0;
    $i=3;
    foreach($query as $queryString){
        $send = $GLOBALS['connexion']->prepare($queryString);
        $send->execute();

        $reponse = $send->fetchAll(PDO::FETCH_ASSOC);

        //On boucle sur chacune des DI périmées
        foreach($reponse as $di){
            $idMR = $di['id_materiel'];

            // On va chercher l'ID de la STF liée et le numéro EF du MR
            $requete = $GLOBALS['connexion']->prepare("SELECT id_stf,numero FROM materiel WHERE id_materiel = ".$idMR);
            $requete->execute();

            $materiel = $requete->fetch(PDO::FETCH_ASSOC);

            // On check quand la DI périme
            if($temps == 0){

                // On vérifie que l'alerte n'existe pas déjà pour cette DI et qu'elle n'a pas été supprimée
                $verif = 'SELECT id_alerte FROM alerte WHERE id_intervention = '.$di['id_intervention'].' AND id_type_alerte = '.$i.' AND supprimee = 0';
                $verif = $GLOBALS['connexion']->prepare($verif);
                $verif->execute();
                $verif = $verif->fetch(PDO::FETCH_ASSOC);

                if($verif==false){
                    $alerte[] = ' INSERT INTO alerte(id_stf,texte_alerte,id_type_alerte,id_intervention)
                            VALUES('.$materiel['id_stf'].',
                                   "La DI __ '.$di['code_operation_intervention'].' __ est périmée sur le MR '.$materiel['numero'].'",'.
                        $i.','.$di['id_intervention'].')';
                }

            }elseif($temps==1){
                // On vérifie que l'alerte n'existe pas déjà pour cette DI et qu'elle n'a pas été supprimée
                $verif = 'SELECT id_alerte FROM alerte WHERE id_intervention = '.$di['id_intervention'].' AND id_type_alerte = '.$i.' AND supprimee = 0';
                $verif = $GLOBALS['connexion']->prepare($verif);
                $verif->execute();
                $verif = $verif->fetch(PDO::FETCH_ASSOC);

                if($verif==false){
                    $alerte[] = ' INSERT INTO alerte(id_stf,texte_alerte,id_type_alerte,id_intervention)
                            VALUES(' . $materiel['id_stf'] . ',
                                   "La DI __ ' . $di['code_operation_intervention'] . ' __ va périmer dans 48h sur le MR ' . $materiel['numero'] . '",' .
                        $i . ',' . $di['id_intervention'].')';
                }
            }elseif($temps==2){
                // On vérifie que l'alerte n'existe pas déjà pour cette DI et qu'elle n'a pas été supprimée
                $verif = 'SELECT id_alerte FROM alerte WHERE id_intervention = '.$di['id_intervention'].' AND id_type_alerte = '.$i.' AND supprimee = 0';
                $verif = $GLOBALS['connexion']->prepare($verif);
                $verif->execute();
                $verif = $verif->fetch(PDO::FETCH_ASSOC);

                if($verif==false){
                    $alerte[] = ' INSERT INTO alerte(id_stf,texte_alerte,id_type_alerte,id_intervention)
                            VALUES(' . $materiel['id_stf'] . ',
                                   "La DI __ ' . $di['code_operation_intervention'] . ' __ va périmer dans 72h sur le MR ' . $materiel['numero'] . '",' .
                        $i . ',' . $di['id_intervention'].')';
                }
            }elseif($temps==3){
                // On vérifie que l'alerte n'existe pas déjà pour cette DI et qu'elle n'a pas été supprimée
                $verif = 'SELECT id_alerte FROM alerte WHERE id_intervention = '.$di['id_intervention'].' AND id_type_alerte = '.$i.' AND supprimee = 0';
                $verif = $GLOBALS['connexion']->prepare($verif);
                $verif->execute();
                $verif = $verif->fetch(PDO::FETCH_ASSOC);

                if($verif==false){
                    $alerte[] = ' INSERT INTO alerte(id_stf,texte_alerte,id_type_alerte,id_intervention)
                            VALUES(' . $materiel['id_stf'] . ',
                                   "La DI __ ' . htmlspecialchars($di['code_operation_intervention']) . ' __ va périmer dans 96h sur le MR ' . $materiel['numero'] . '",' .
                        $i . ',' . $di['id_intervention'].')';
                }
            }
        }
        $temps++;
        $i++;
    }
echo count($alerte);
    // On envoie toutes les alertes fraichement créées en DB
    foreach($alerte as $key => $string){
        $envoi = $GLOBALS['connexion']->prepare($string);
        $envoi->execute();
    }