<?php
/**
 * Created by Yaiba.
 * Date: 01/02/16
 * Time: 16:29
 */
    include_once(__DIR__.'/../model/modelsLoader.php');
    session_start();
    include_once(__DIR__.'/../controller/controlFlotte.php');
    include_once(__DIR__.'/../controller/controlMaterielRoulant.php');
    include_once(__DIR__.'/../controller/controlOverview.php');
    include(__DIR__.'/../includes/html/htmlHead.php');

    if(isset($_SESSION['gof']) && $_SESSION['gof']->getAccessLvl() <1){
        $flottes = getFlottesByIdGof($_SESSION['gof']->getId());

        // TODO CREER LE getNomFlotteById POUR AFFICHER LE NOM DE LA FLOTTE
        $i=0;
        foreach($flottes as $key => $value){

            $listeMateriel[$i] = getMRByIdFlotte($value);
            $i++;
        }
        // Affiche chacune des flottes avec le MR lié
        foreach($listeMateriel as $key => $materiel){
            // 1 jour = 24 * 60 * 60 = 86400 secondes
            $jour = 86400;
            echo '
                    <div class="panel-group" id="flotte'.$key.'">
                        <div class="panel-default panel">
                            <a data-toggle="collapse"  href="#collapse'.$key.'">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        Flotte 1 AC | Contrat : 0
                                    </h4>
                                </div>
                            </a>
                            <div class="panel-collapse collapse in" id="collapse'.$key.'">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Statut opérationnel</th>
                                            <th>Debut immobilisation</th>
                                            <th>Fin immobilisation</th>
                                            <th>Lieu</th>
                                            <th>Commentaire</th>
                                            <th>
                                                <div class="col-lg-2 table-bordered">'.date('d/m').'</div>
                                                <div class="col-lg-2 table-bordered">'.date('d/m', time()+$jour).'</div>
                                                <div class="col-lg-2 table-bordered">'.date('d/m', time()+2*$jour).'</div>
                                                <div class="col-lg-2 table-bordered">'.date('d/m', time()+3*$jour).'</div>
                                                <div class="col-lg-2 table-bordered">'.date('d/m', time()+4*$jour).'</div>
                                                <div class="col-lg-2 table-bordered">'.date('d/m', time()+5*$jour).'</div>
                                                <div class="col-lg-1 table-bordered">8h</div>
                                                <div class="col-lg-1 table-bordered">17h</div>
                                                <div class="col-lg-1 table-bordered">8h</div>
                                                <div class="col-lg-1 table-bordered">17h</div>
                                                <div class="col-lg-1 table-bordered">8h</div>
                                                <div class="col-lg-1 table-bordered">17h</div>
                                                <div class="col-lg-1 table-bordered">8h</div>
                                                <div class="col-lg-1 table-bordered">17h</div>
                                                <div class="col-lg-1 table-bordered">8h</div>
                                                <div class="col-lg-1 table-bordered">17h</div>
                                                <div class="col-lg-1 table-bordered">8h</div>
                                                <div class="col-lg-1 table-bordered">17h</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>';
            afficherMRParFlotte($materiel);
            echo '    </tbody>
                    </table>
                </div>';
            //
        }


    }
