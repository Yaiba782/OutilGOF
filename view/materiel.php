<?php
    /*
     * Created by Yaiba.
     */
    session_start();
    include_once('../includes/includes.php');
    testConnexion();
    include_once(dirname(__FILE__).'/../model/modelsLoader.php');
    include_once(dirname(__FILE__).'/../controller/controlMateriel.php');
    include(dirname(__FILE__).'/../includes/html/htmlHead.php');

    // Va chercher le matériel par son id
    $mr = getMRByClefGmao(intval($_GET['id']));
    // Va chercher les restrictions liées au materiel
    $restrictions = getRestrictionsById($mr->getIdMateriel());
    // Va chercher les equipements liés au matériel
    $equipements = getEquipementById($mr->getIdMateriel());

?>
    <div class="col-md-10 col-md-offset-1">
        <div class="name pull-left col-md-3">
            <h2>
                <?php echo $mr->getNumero(); ?>
            </h2>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-bordered table-stripped table-hovered">
                <tr>
                    <td>Série</td>
                    <td><?php echo $mr->getSerie() ;?></td>
                </tr>
                <tr>
                    <td>Sous-série</td>
                    <td><?php echo $mr->getSousSerie() ;?></td>
                </tr>
                <tr>
                    <td>Numéro EF</td>
                    <td><?php echo $mr->getNumero() ;?></td>
                </tr>
                <tr>
                    <td>Numéro européen</td>
                    <td><?php echo $mr->getNumeroEurope() ;?></td>
                </tr>
                <tr>
                    <td>STF</td>
                    <td><?php $stf = new stf($mr->getIdStf());
                        echo $stf->getNameById($stf->getIdStf(), $GLOBALS['connexion']);?></td>
                </tr>
                <tr>
                    <td>Flotte</td>
                    <td><?php  $flotte = new flotte($mr->getIdFlotte(),null,null,$GLOBALS['connexion']);
                            echo $flotte->getNomFlotteById($GLOBALS['connexion']);?></td>
                </tr>
                <tr>
                    <td>Statut opérationnel</td>
                    <td class="<?php echo str_replace(' ', '',$mr->getStatutOperationnel());?>"><?php echo $mr->getStatutOperationnel() ;?></td>
                </tr>
                <tr>
                    <td>Etat d'acquisition</td>
                    <td><?php echo $mr->getEtatAcquisition() ;?></td>
                </tr>
                <tr>
                    <td>Site réalisateur</td>
                    <td><?php echo $mr->getSiteRealisateur() ;?></td>
                </tr>
                <tr>
                    <td>Coupon</td>
                    <td><?php echo $mr->getCoupon() ;?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-bordered table-hovered">
                <tr>
                    <th colspan="6">Restrictions</th>
                </tr>
                <tr>
                    <th>Numéro</th>
                    <th>Description</th>
                    <th>Catégorie</th>
                    <th>Motif de pose</th>
                    <th>Date de pose</th>
                    <th>Intervention originelle</th>
                </tr>
                <?php
                    // Va chercher les restrictions sur le matériel et les affiche si il y en a
                    if(count($restrictions)>0){
                        foreach($restrictions as $key => $restriction){
                            echo "<tr>
                                    <td>".$restriction->getIdRestriction()."</td>
                                    <td>".$restriction->getDescription()."</td>
                                    <td class='".str_replace(' ', '',$restriction->getCategorie())."''>".$restriction->getCategorie()."</td>
                                    <td>".$restriction->getMotifDePose()."</td>
                                    <td>".$restriction->getDateDePose()."</td>
                                    <td>".$restriction->getInterventionOrigine()."</td>
                                </tr>";
                        }
                    }
                ?>
            </table>
            <table class="table table-bordered table-hovered">
                <tr>
                    <th>Equipement spécial</th>
                </tr>


                <?php
                    // Va chercher les équipements spéciaux et les affiche s'il y en a
                    if(count($equipements)>0){
                        foreach($equipements as $key => $equipement){
                            echo "<tr><td>".$equipement['texte_equipement']."</td></tr>";
                        }
                    }
                ?>
        </div>
    </div>
