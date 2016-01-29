<!DOCTYPE html5>
<html>
<head>
    <link href="./../../includes/css/bootstrap.min.css" rel="stylesheet">
    <link href="./../../includes/css/style.css" rel="stylesheet">
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
        <div class="panel-group " id="accordion">
            <div class="panel panel-default">
                <a data-toggle="collapse" href="#collapse1" >
                    <div class="col-lg-10 panel-heading col-lg-offset-1 bg-danger"><h4>Urgent</h4></div>
                </a>
                <div class="nbsp"></div>
                <div class="panel-collapse panel-body collapse in" id="collapse1">
                    <div class="nbsp"></div>
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-lg-4">Texte et lien concernant une alerte</div>
                            <div class="col-lg-offset-4 col-lg-4"><input type="button" value="Vu"/><input type="button" value="Supprimer"/></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">Texte et lien concernant une autre alerte</div>
                            <div class="col-lg-offset-4 col-lg-4"><input type="button" value="Vu"/><input type="button" value="Supprimer"/></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">Texte et lien concernant une alerte</div>
                            <div class="col-lg-offset-4 col-lg-4"><input type="button" value="Vu"/><input type="button" value="Supprimer"/></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="nbsp"></div>
            <div class="panel-group " id="accordion">
                <div class="panel panel-default">
                    <a data-toggle="collapse" href="#collapse2" >
                        <div class="col-lg-10 panel-heading col-lg-offset-1 bg-warning"><h4>A surveiller</h4></div>
                    </a>
                    <div class="nbsp"></div>
                    <div class="panel-collapse panel-body collapse in" id="collapse2">
                        <div class="nbsp"></div>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-4">Texte et lien concernant une alerte à surveiller</div>
                                <div class="col-lg-offset-4 col-lg-4"><input type="button" value="Supprimer"/></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">Texte et lien concernant une autre alerte à surveiller</div>
                                <div class="col-lg-offset-4 col-lg-4"><input type="button" value="Supprimer"/></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">Texte et lien concernant une alerte à surveiller </div>
                                <div class="col-lg-offset-4 col-lg-4"><input type="button" value="Supprimer"/></div>
                            </div>
                        </form>
                    </div>
                </div>        </div>
    </div>
    <script src="./../../includes/js/jquery-2.1.4.min.js"></script>
    <script src="./../../includes/js/bootstrap.min.js"></script>
</body>
</html>