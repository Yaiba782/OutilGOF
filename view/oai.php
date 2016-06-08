<?php
    /**
     * Created by Yaiba.
     * Date: 27/05/2016
     * Time: 14:47
     */
    include_once('../includes/includes.php');
    include_once(dirname(__FILE__).'/../model/modelsLoader.php');
    session_start();
    testConnexion();
    include_once(dirname(__FILE__).'/../controller/controlOai.php');
    include(dirname(__FILE__).'/../includes/html/htmlHead.php');

    // Cherche en base les différentes OAI liées au GOF actuel

    $OAIArray = getOAI($_SESSION['gof']->getId());
    $PerimeDeuxJours = getPerimeSoon($_SESSION['gof']->getId(), 48);
    $PerimeTroisJours = getPerimeSoon($_SESSION['gof']->getId(), 72);
    $PerimeQuatreJours = getPerimeSoon($_SESSION['gof']->getId(), 96);

    ?>
    <div class="content">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#section1">
                    <h4>DI périmées</h4></a></li>
            <li class=""><a href="#section2">
                    <h4>Butée 48H</h4></a>
            </li>
            <li class=""><a href="#section3">
                    <h4>Butée 72H</h4></a>
            </li>
            <li class=""><a href="#section4">
                    <h4>Butée 96H</h4></a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="section1" class="tab-pane fade active in">
                <h3>DI périmées</h3>
                <div class="col-md-10 col-md-offset-1">
                    <table class="table-bordered table table-hovered">
                        <tbody>
                        <tr>
                            <th>Numéro DI</th>
                            <th>Intitulé</th>
                            <th>Date de detection</th>
                        </tr>
                        <?php
                            foreach ($OAIArray as $OAI){
                                echo '<tr><td>'.$OAI['id_intervention'].'</td>';
                                echo '<td>'.$OAI['texte_alerte'].'</td>';
                                echo '<td>'.date($OAI['date_detection']).'</td>
                                <td><a href="#" target="_blank"><i class="fa fa-external-link"></i> Envoyer un OAI</a></td></tr>';
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="section2" class="tab-pane  fade in">
                <div id="section1" class="tab-pane fade active in">
                    <h3>DI périmées sous 48h</h3>
                    <div class="col-md-10 col-md-offset-1">
                        <table class="table-bordered table table-hovered">
                            <tbody>
                            <tr>
                                <th>Numéro DI</th>
                                <th>Intitulé</th>
                                <th>Date de detection</th>
                            </tr>

                            <?php
                                foreach ($PerimeDeuxJours as $soon){
                                    echo '<tr><td>'.$soon['id_intervention'].'</td>';
                                    echo '<td>'.$soon['texte_alerte'].'</td>';
                                    echo '<td>'.date($soon['date_detection']).'</td></tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="section3" class="tab-pane  fade in">
                <div id="section1" class="tab-pane fade active in">
                    <h3>DI périmées sous 72h</h3>
                    <div class="col-md-10 col-md-offset-1">
                        <table class="table-bordered table table-hovered">
                            <tbody>
                            <tr>
                                <th>Numéro DI</th>
                                <th>Intitulé</th>
                                <th>Date de detection</th>
                            </tr>

                            <?php
                                foreach ($PerimeTroisJours as $soonD){
                                    echo '<tr><td>'.$soonD['id_intervention'].'</td>';
                                    echo '<td>'.$soonD['texte_alerte'].'</td>';
                                    echo '<td>'.date($soonD['date_detection']).'</td></tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="section4" class="tab-pane  fade in">
                <div id="section1" class="tab-pane fade active in">
                    <h3>DI périmées sous 96h</h3>
                    <div class="col-md-10 col-md-offset-1">
                        <table class="table-bordered table table-hovered">
                            <tbody>
                            <tr>
                                <th>Numéro DI</th>
                                <th>Intitulé</th>
                                <th>Date de detection</th>
                            </tr>

                            <?php
                                foreach ($PerimeQuatreJours as $soonT){
                                    echo '<tr><td>'.$soonT['id_intervention'].'</td>';
                                    echo '<td>'.$soonT['texte_alerte'].'</td>';
                                    echo '<td>'.date($soonT['date_detection']).'</td></tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <script type="text/javascript">
       $(document).ready(function() {
           $("#myTab a").click(function (e) {
               e.preventDefault();
               $(this).tab('show');
           });
       });
   </script>

    <?php include(dirname(__FILE__).'/../includes/html/htmlFooter.php');?>
