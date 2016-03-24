<?php
    /**
     * Created by Yaiba.
     * Date: 24/03/2016
     * Time: 10:08
     */

    include('../../includes/html/htmlHead.php');
    include('../../controller/db/updateDB.php');
?>
    <div class="container col-lg-offset-1 col-lg-10">
        <div class="col-lg-offset-2 col-lg-8">
            <form enctype="multipart/form-data" action="#" method="post">
                <table class="table table-bordered table-hover table-strip">
                    <tr>
                        <td>
                            <label for="interventionFile">export Demandes d'intervention: </label>
                        </td>
                        <td>
                            <input type="file" accept="xls" name="interventionFile">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="rdvFile">export Rendez vous de maintenance: </label></td>
                        <td><input type="file" accept="xls" name="rdvFile"></td>
                    </tr>
                    <tr>
                        <td><label for="materielFile">export Matériel: </label></td>
                        <td><input type="file" accept="xls" name="materielFile"></td>
                    </tr>
                    <tr>
                        <td><label for="restrictionFile">export Restrictions :</label></td>
                        <td><input type="file" accept="xls" name="restrictionFile"></td>
                    </tr>
                    <tr>
                        <td><label for="flotteFile">export Flottes: </label></td>
                        <td><input type="file" accept="xls" name="flotteFile"></td>
                    </tr>
                    <tr>
                        <td>*format : .xls</td>
                        <td><input type="submit" value="Mettre à jour"></td>
                    </tr>
                </table>
            </form>
            <?php
                if(isset($_FILES) && !empty($_FILES)){
                    $reponse = sendDB($_FILES);
                }
            ?>

        </div>
    </div>