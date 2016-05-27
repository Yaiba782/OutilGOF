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

    $OAIArray[] = getOAI($_SESSION['gof']->getId());

    foreach ($OAIArray as $OAI){

    }
    ?>
<ul class="nav nav-tabs" id="myTab" xmlns="http://www.w3.org/1999/html">
        <li class="active"><a href="#section1"><h4>DI périmées</h4></a></li>
        <li><a href="#section2"><h4>DI bientôt périmées</h4></a></li>
    </ul>
    <div class="tab-content">
        <div id="section1" class="tab-pane active fade in">
            Tab1
        </div>
        <div id="section2" class="tab-pane  fade in">
            Tab2
        </div>
    </div>

   <script type="text/javascript">
        $(document).ready(function() {
            $("#myTab").click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            });
        });
   </script>

    <?php include(dirname(__FILE__).'/../includes/html/htmlFooter.php');?>
