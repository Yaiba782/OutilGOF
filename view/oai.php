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
    $PerimeSoon = getPerimeSoon($_SESSION['gof']->getId());

    ?>
    <div class="content">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#section1">
                    <h4>DI périmées</h4></a></li>
            <li class=""><a href="#section2">
                    <h4>DI bientôt périmées</h4></a></li>
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
                                echo '<td>'.date($OAI['date_detection']).'</td></tr>';
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="section2" class="tab-pane  fade in">
                <div id="section1" class="tab-pane fade active in">
                    <h3>DI bientôt périmées</h3>
                    <div class="col-md-10 col-md-offset-1">
                        <table class="table-bordered table table-hovered">
                            <tbody>
                            <tr>
                                <th>Numéro DI</th>
                                <th>Intitulé</th>
                                <th>Date de detection</th>
                            </tr>

                            <?php
                                foreach ($PerimeSoon as $soon){
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
