<?php
    /**
     * Created by Yaiba.
     * Date: 11/08/2016
     * Time: 15:04
     */

    include_once(__DIR__.'/../model/modelsLoader.php');
    include_once(__DIR__.'/../includes/connexion.php');


    function alerteInit(){
        $alertesAll = "SELECT * FROM alerte WHERE supprimee = 0 AND (id_gof =".$_SESSION['gof']->getId()." OR id_stf = ".$_SESSION['gof']->getStf().")";
        $alertesAll = $GLOBALS['connexion']->prepare($alertesAll);
        $alertesAll->execute();

        $alertesAll = $alertesAll->fetchAll(PDO::FETCH_ASSOC);

        $onglet = [];
        $onglet['dispoExploitation'] = [];
        $onglet['debutRdvModifie'] = [];
        $onglet['finRdvModifie'] = [];
        $onglet['dateFinReelleIntervention'] = [];
        $onglet['interventionFinPrevisionnelle'] = [];
        $onglet['interventionDebutPrevisionnel'] = [];
        $onglet['changementStatutOperationnel'] = [];

        $onglet['dispoExploitation'] = [];
        foreach($alertesAll as $key => $alerte){
            if($alerte['id_type_alerte']==7){
                $onglet['dispoExploitation'][] = $alerte;
            }
            if($alerte['id_type_alerte']==9){
                $onglet['dateFinReelleIntervention'][] = $alerte;
            }
            if($alerte['id_type_alerte']==11){
                $onglet['debutRdvModifie'][] = $alerte;
            }
            if($alerte['id_type_alerte']==12){
                $onglet['finRdvModifie'][] = $alerte;
            }
            if($alerte['id_type_alerte']==8){
                $onglet['interventionFinPrevisionnelle'][] = $alerte;
            }
            if($alerte['id_type_alerte']==10){
                $onglet['interventionDebutPrevisionnel'][] = $alerte;
            }
            if($alerte['id_type_alerte']==13){
                $onglet['changementStatutOperationnel'][] = $alerte;
            }
        }
        return $onglet;
    }

    function ongletNouveau($ongletData){
        foreach ($ongletData as $alerte){
            if ($alerte['lu']==0){
                echo "<tr>";
                    echo "<td>".$alerte['id_alerte']."</td>";
                    echo "<td>".$alerte['texte_alerte']."</td>";
                    echo "<td>".$alerte['date_detection']."</td>";
                    echo "<td class=\"small-td\"><button class=\"btn-read glyphicon glyphicon-ok pull-right\"></button></td>
                    <td class=\"small-td\"><button class=\"btn-remove glyphicon glyphicon-remove pull-right\"></button></td>
                </tr>";
            }
        }
    }
    function ongletLu($ongletData){
        foreach ($ongletData as $alerte){
            if ($alerte['lu']==1){
                echo "<tr>";
                    echo "<td>".$alerte['id_alerte']."</td>";
                    echo "<td>".$alerte['texte_alerte']."</td>";
                    echo "<td>".$alerte['date_detection']."</td>";
                    echo "<td class=\"small-td\"><button class=\"btn-remove glyphicon glyphicon-remove pull-right\"></button></td>
                </tr>";
            }
        }
    }
    function tableMaker($onglet){
        echo '<h4>Nouvelles alertes</h4>
                <table id="new-1" class="table-bordered table table-hovered">
                    <tr>
                        <th>Numéro Alerte</th>
                        <th>Intitulé</th>
                        <th>Date de detection</th>
                        <th class="small-td">Lu</th>
                        <th class="small-td">Supprimer</th>
                    </tr>';
                        ongletNouveau($onglet);
                echo '</table>';
                echo'<h4>Alertes lues</h4>';
                echo '<table class="table-bordered table table-hovered">';
                        ongletLu($onglet);
                echo '</table>';
    }