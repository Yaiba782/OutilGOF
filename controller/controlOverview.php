<?php
/**
 * Created by Yaiba.
 * Date: 02/02/16
 * Time: 11:14
 */

    include_once(__DIR__.'/../model/modelsLoader.php');
    include_once(__DIR__.'/../includes/connexion.php');

    // Ici qu'on va gérer la modification des droits pour les GOF sur différentes flottes
    function overview(){
        // Chargement de toutes les flottes
        if(!isset($_GET['idflotte'])){
            // Au lieu de faire par STF, on devra créer une table flotte_to_gof pour gérer les découpages de flotte par GOF
            $query = "SELECT id_flotte FROM flotte WHERE id_stf = ".$_SESSION['gof']->getStf();
            $flottes = $GLOBALS['connexion']->prepare($query);
            $flottes->execute();
            $listeFlottes = $flottes->fetchAll(PDO::FETCH_ASSOC);


            // On passe sur chacune des flottes pour chercher le matériel
            foreach($listeFlottes as $flotte){
                $m = "SELECT * FROM materiel WHERE id_flotte = ".$flotte['id_flotte'];
                $m = $GLOBALS['connexion']->prepare($m);
                $m->execute();

                $listeMateriel = $m->fetchAll(PDO::FETCH_ASSOC);

                $nomFlotte = "SELECT nom_flotte FROM flotte WHERE id_flotte =".$flotte['id_flotte'];
                $nomFlotte = $GLOBALS['connexion']->prepare($nomFlotte);
                $nomFlotte->execute();

                $nomFlotte = $nomFlotte->fetch(PDO::FETCH_ASSOC);

                echo '<div class="panel-group" id="flotte1">
                <div class="panel-default panel">
                    <a data-toggle="collapse"  href="#collapse1">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                '.$nomFlotte['nom_flotte'].'
                                <br />Contrat : 1
                            </h4>

                        </div>
                    </a>
                </div>';
                // On boucle sur le matériel
                foreach($listeMateriel as $key => $materiel){
                    // TODO || FINIR LA BOUCLE SUR LE MATERIEL
                }
            }
        }elseif(isset($_GET['idflotte'])){
            // Chargement d'un seul panel de flotte
            function loadFlotteById($idflotte){
                // TODO || CREER UNE FONCTION POUR LE CHARGEMENT D'UNE SEULE FLOTTE
            }
        }
    }
