<?php
    /**
     * Created by Yaiba.
     * Date: 11/08/2016
     * Time: 15:01
     */
    include_once(__DIR__.'/../model/modelsLoader.php');
    session_start();
    include_once(__DIR__.'/../controller/controlAlerte.php');
    include(__DIR__.'/../includes/html/htmlHead.php');

    // Teste si l'utilisateur est bien connecté
    testConnexion();

    $onglet = alerteInit();
?>
<div id="tabs">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#section1"><h4>MR Dispo</h4></a></li>
        <li><a href="#section2"><h4>Début RDV modifié</h4></a></li>
        <li><a href="#section3"><h4>Fin RDV modifié</h4></a></li>
        <li><a href="#section4"><h4>Fin prev. DI</h4></a></li>
        <li><a href="#section5"><h4>Début prev. DI</h4></a></li>
    </ul>
        <div class="tab-content">
        <div role="tabpanel" id="section1" class="tab-pane fade in active">
            <h3>MR Dispo</h3>
            <div class="col-md-10 col-md-offset-1">
                <?php tableMaker($onglet['dispoExploitation']) ?>
            </div>
        </div>
        <div role="tabpanel" id="section2" class="tab-pane fade in">
            <h3>Début du RDV modifié</h3>
            <div class="col-md-10 col-md-offset-1">
                <?php tableMaker($onglet['debutRdvModifie']) ?>
            </div>
        </div>
        <div role="tabpanel" id="section3" class="tab-pane fade in">
            <h3>Fin du RDV modifiée</h3>
            <div class="col-md-10 col-md-offset-1">
                <?php tableMaker($onglet['finRdvModifie']) ?>
            </div>
        </div>
        <div role="tabpanel" id="section4" class="tab-pane fade in">
            <h3>Fin prévisionnelle de la DI modifiée</h3>
            <div class="col-md-10 col-md-offset-1">
                <?php tableMaker($onglet['interventionFinPrevisionnelle']) ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#tabs").tabs();
    });
</script>
