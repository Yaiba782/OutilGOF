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
            <div class="nbsp"></div>
            <div class="col-lg-12">
                <div class="panel-group" id="flotte1">
                    <div class="panel-default panel">
                        <a data-toggle="collapse"  href="#collapse1">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Flotte 1 AC | Contrat : 0
                                </h4>
                            </div>
                        </a>
                        <div class="panel-collapse collapse in" id="collapse1">
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
                                            <?php   // 1 jour = 24 * 60 * 60 = 86400 secondes
                                                    $jour = 86400;
                                            ?>
                                            <div class="col-lg-2 table-bordered"><?php echo date('d/m'); ?></div>
                                            <div class="col-lg-2 table-bordered"><?php echo date('d/m', time()+$jour); ?></div>
                                            <div class="col-lg-2 table-bordered"><?php echo date('d/m', time()+2*$jour); ?></div>
                                            <div class="col-lg-2 table-bordered"><?php echo date('d/m', time()+3*$jour); ?></div>
                                            <div class="col-lg-2 table-bordered"><?php echo date('d/m', time()+4*$jour); ?></div>
                                            <div class="col-lg-2 table-bordered"><?php echo date('d/m', time()+5*$jour); ?></div>
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
                                <tbody>
                                    <tr>
                                        <td><a href="/outilgof/tests/presentation/mr.php">BBXXXXXX</a></td>
                                        <td class="bg-success">Disponible</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>BBXXXXXX</td>
                                        <td class="bg-success">Disponible</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>BBXXXXXX</td>
                                        <td class="bg-danger">Maintenance</td>
                                        <td>24/12/2015</td>
                                        <td><?php echo date('d/m', time()+$jour); ?> 8h</td>
                                        <td>Lille</td>
                                        <td>Révision</td>
                                        <td>
                                            <a href="/outilgof/tests/presentation/immobilisation.php">
                                                <div class="col-lg-1 bg-danger heure8">8h</div>
                                                <div class="col-lg-1 bg-danger">17h</div>
                                                <div class="col-lg-1 bg-danger heure8">8h</div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>BBXXXXXX</td>
                                        <td class="bg-danger">Maintenance</td>
                                        <td>24/12/2015</td>
                                        <td><?php echo date('d/m', time()+5*$jour); ?> 17h</td>
                                        <td>Lille</td>
                                        <td>Révision</td>
                                        <td>
                                            <a href="/outilgof/tests/presentation/immobilisation.php">
                                                <div class="col-lg-1 bg-danger heure8">8h</div>
                                                <div class="col-lg-1 bg-danger">17h</div>
                                                <div class="col-lg-1 bg-danger heure8">8h</div>
                                                <div class="col-lg-1 bg-danger">17h</div>
                                                <div class="col-lg-1 bg-danger heure8">8h</div>
                                                <div class="col-lg-1 bg-danger">17h</div>
                                                <div class="col-lg-1 bg-danger heure8">8h</div>
                                                <div class="col-lg-1 bg-danger">17h</div>
                                                <div class="col-lg-1 bg-danger heure8">8h</div>
                                                <div class="col-lg-1 bg-danger">17h</div>
                                                <div class="col-lg-1 bg-danger heure8">8h</div>
                                                <div class="col-lg-1 bg-danger">17h</div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>BBXXXXXX</td>
                                        <td class="bg-success">Disponible</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-1"></div>
                                            <a href="/outilgof/tests/presentation/immobilisation.php">
                                                <div class="col-lg-1 bg-danger heure8">8h</div>
                                                <div class="col-lg-1 bg-danger">17h</div>
                                                <div class="col-lg-1 bg-danger heure8">8h</div>
                                                <div class="col-lg-1 bg-danger">17h</div>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="bg-info">
                                        <td>Contrat</td>
                                        <td>Dispo : 3</td>
                                        <td>Demandées : 3</td>
                                        <td class="bg-warning">Resultat : 0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        <?php for($j=10; $j<13; $j++){
                            $p = $j+rand(-7,0);
                            echo '
                                <div class="panel panel-default">
                                    <a data-toggle="collapse"  href="#collapse'.$j.'">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Flotte '.$j.' | Contrat : '.$p.'
                                            </h4>
                                        </div>
                                    </a>
                                    <div class="panel-collapse collapse in" id="collapse'.$j.'">
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
                                                    <div class="col-lg-2 table-bordered">'.date('d/m', time()+1*$jour).'</div>
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
                                            <tbody>
                                            <tr>
                                                <td>BBXXXXXX</td>
                                                <td class="bg-success">Disponible</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>BBXXXXXX</td>
                                                <td class="bg-danger">Maintenance</td>
                                                <td>24/12/2015</td>
                                                <td>24/12/2016</td>
                                                <td>Lille</td>
                                                <td>Heurt véhicule</td>
                                                <td>
                                                    <a href="/outilgof/tests/presentation/immobilisation.php">
                                                        <div class="col-lg-1 bg-danger heure8">8h</div>
                                                        <div class="col-lg-1 bg-danger">17h</div>
                                                        <div class="col-lg-1 bg-danger heure8">8h</div>
                                                        <div class="col-lg-1 bg-danger">17h</div>
                                                        <div class="col-lg-1 bg-danger heure8">8h</div>
                                                        <div class="col-lg-1 bg-danger">17h</div>
                                                        <div class="col-lg-1 bg-danger heure8">8h</div>
                                                        <div class="col-lg-1 bg-danger">17h</div>
                                                        <div class="col-lg-1 bg-danger heure8">8h</div>
                                                        <div class="col-lg-1 bg-danger">17h</div>
                                                        <div class="col-lg-1 bg-danger heure8">8h</div>
                                                        <div class="col-lg-1 bg-danger">17h</div>
                                                    </a>
                                                </td>
                                            </tr>';
                                                for($q = 0; $q<$p; $q++){
                                                echo '
                                            <tr>
                                                <td>BBXXXXXX</td>
                                                <td class="bg-success">Disponible</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                                    ';
                                                }
                                        echo '
                                            <tr class="bg-info">
                                                <td>Contrat</td>
                                                <td>Dispo : '.$p.'</td>
                                                <td>Demandées : 0</td>
                                                <td class="bg-success">Résultat : '.$p.'</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            ';
                        }
                         ?>
                </div>
            </div>
        </div>
        <?php echo '<script src="'.dirname('__FILE__').'/../../includes/js/jquery-2.1.4.min.js"></script>';?>
        <?php echo '<script src="'.dirname('__FILE__').'/../../includes/js/bootstrap.min.js"></script>';?>
    </body>
</html>
