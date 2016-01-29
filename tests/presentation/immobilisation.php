<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php echo '<link href="'.dirname('__FILE__').'/../../includes/css/bootstrap.min.css" rel="stylesheet">';
            echo '<link href="'.dirname('__FILE__').'/../../includes/css/style.css" rel="stylesheet">'; ?>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <a href="./accueil.php">
                        <h1>Outil GOF 2.0</h1>
                    </a>
                </div>
                <div class="col-lg-6 col-lg-offset-3 table-bordered">
                    <div class="col-lg-4 text-center">
                        <a href="./alerte.php">
                            <h3>Alertes</h3>
                        </a>
                    </div>
                    <div class="col-lg-4 text-center">
                        <h3>Statistiques</h3>
                    </div>
                    <div class="col-lg-4 text-center">
                        <h3>Administration</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row"><h2>Immobilisation</h2></div>
                <div class="col-lg-12">
                    <div class="row col-lg-12"><h3>BBXXXXXX</h3></div>
                    <div class="row">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th rowspan="2">Immobilisation</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Lieu</th>
                                <th>Type</th>
                            </tr>
                            <tr>
                                <td>JJ/MM/AAAA HH:mm</td>
                                <td>JJ/MM/AAAA HH:mm</td>
                                <td>Paris</td>
                                <td>Type</td>
                            </tr>
                            <tr>
                                <th rowspan="2">Acheminement</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Lieu départ</th>
                                <th>Lieu arrivée</th>
                            </tr>
                            <tr>
                                <td>JJ/MM/AAAA HH:mm</td>
                                <td>JJ/MM/AAAA HH:mm</td>
                                <td>Paris</td>
                                <td>Lille</td>
                        </table>
                        <div class="nbsp"></div>
                        <table class="table table-bordered table-stripped">
                            <tr>
                                <th rowspan="3">RDV</th>
                                <th>Date debut</th>
                                <th>Date fin</th>
                                <th>Lieu</th>
                            </tr>
                            <tr>
                                <td>JJ/MM/AAAA HH:mm</td>
                                <td>JJ/MM/AAAA HH:mm</td>
                                <td>Lille</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th></th>
                                            <th>Libellé</th>
                                            <th>Type DI</th>
                                            <th>Statut DI</th>
                                            <th>Début DI</th>
                                            <th>Fin prev.</th>
                                            <th>Fin réelle</th>
                                            <th>Butée</th>
                                        </tr>
                                        <tr>
                                            <td>DI1</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>DI2</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>DI3</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <a href="#collapse1" data-toggle="collapse" data-parent="#accordion">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            Anciennes Immobilisations
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapse1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php

                                            for($i=5; $i < 7;$i++){
                                                echo '
                                            <div class="panel-group" id="accordion'.$i.'">
                                                <div class="panel panel-default">
                                                    <a href="#collapse'.$i.'" data-toggle="collapse" data-parent="#accordion'.$i.'">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                Immobilisation '.$i.'
                                                            </h4>
                                                        </div>
                                                    </a>
                                                    <div id="collapse'.$i.'" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <table class="table table-bordered table-hover">
                                                                    <tr>
                                                                        <th rowspan="2">Immobilisation</th>
                                                                        <th>Date début</th>
                                                                        <th>Date fin</th>
                                                                        <th>Lieu</th>
                                                                        <th>Type</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>JJ/MM/AAAA HH:mm</td>
                                                                        <td>JJ/MM/AAAA HH:mm</td>
                                                                        <td>Paris</td>
                                                                        <td>Type</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th rowspan="2">Acheminement</th>
                                                                        <th>Date début</th>
                                                                        <th>Date fin</th>
                                                                        <th>Lieu départ</th>
                                                                        <th>Lieu arrivée</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>JJ/MM/AAAA HH:mm</td>
                                                                        <td>JJ/MM/AAAA HH:mm</td>
                                                                        <td>Paris</td>
                                                                        <td>Lille</td>
                                                                </table>
                                                                <div class="nbsp"></div>
                                                                <table class="table table-bordered table-stripped">
                                                                    <tr>
                                                                        <th rowspan="3">RDV</th>
                                                                        <th>Date debut</th>
                                                                        <th>Date fin</th>
                                                                        <th>Lieu</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>JJ/MM/AAAA HH:mm</td>
                                                                        <td>JJ/MM/AAAA HH:mm</td>
                                                                        <td>Lille</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3">
                                                                            <table class="table table-bordered table-hover">
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>Libellé</th>
                                                                                    <th>Type DI</th>
                                                                                    <th>Statut DI</th>
                                                                                    <th>Début DI</th>
                                                                                    <th>Fin prev.</th>
                                                                                    <th>Fin réelle</th>
                                                                                    <th>Butée</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>DI1</td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>DI2</td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>DI3</td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                    <td></td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo '<script src="'.dirname('__FILE__').'/../../includes/js/jquery-2.1.4.min.js"></script>';?>
        <?php echo '<script src="'.dirname('__FILE__').'/../../includes/js/bootstrap.min.js"></script>';?>
    </body>
</html>
