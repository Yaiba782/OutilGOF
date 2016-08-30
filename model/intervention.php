<?php
/**
 * Created by Yaiba.
 * Date: 09/12/15
 * Time: 17:00
 */
    include_once(dirname(__FILE__).'/../includes/functions.php');
    include_once(dirname(__FILE__).'/typeAlerte.php');

class intervention extends materiel{
    protected $id_intervention;
    protected $id_materiel;
    protected $libelle_intervention;
    protected $type_intervention;
    protected $statut_intervention;
    protected $code_operation_intervention;
    protected $id_rdv;
    protected $has_rdv;
    protected $debut_rdv;
    protected $fin_rdv;
    protected $date_debut_previsionnel_intervention;
    protected $date_fin_previsionnelle;
    protected $date_fin_reelle;
    protected $site_realisateur;
    protected $date_fin_optimale;
    protected $id_coupon;
    protected $butee_technique;
    protected $exists = false;
    protected $date_debut_reel;

    function __construct($id_intervention, $id_materiel, $libelle_intervention, $type_intervention, $statut_intervention, $code_operation_intervention, $debut_rdv,$fin_rdv, $date_debut_previsionnel_intervention, $date_fin_previsionnelle, $date_fin_reelle=null, $site_realisateur=null, $date_fin_optimale=null, $id_coupon=null, $butee_technique=null,$id_rdv=null,$date_debut_reel = null)
    {
        $this->id_intervention = $id_intervention;
        $this->id_materiel = $id_materiel;
        $this->libelle_intervention = $libelle_intervention;
        $this->type_intervention = $type_intervention;
        $this->statut_intervention = $statut_intervention;
        $this->code_operation_intervention = $code_operation_intervention;
        $this->debut_rdv = $debut_rdv;
        $this->fin_rdv = $fin_rdv;
        $this->site_realisateur = $site_realisateur;
        $this->id_coupon = $id_coupon;
        $this->setDateDebutPrevisionnelIntervention($date_debut_previsionnel_intervention);
        $this->setDateFinPrevisionnelle($date_fin_previsionnelle);
        $this->setDateFinReelle($date_fin_reelle);
        $this->setDateFinOptimale($date_fin_optimale);
        $this->setButeeTechnique($butee_technique);
        $this->id_rdv = $id_rdv;
        $this->date_debut_reel= $date_debut_reel;
    }

    /*
     *
     * GETTERS AND SETTERS
     *
     */


    /**
     * @return mixed
     */
    public function getDateDebutReel()
    {
        return $this->date_debut_reel;
    }

    /**
     * @param mixed $date_debut_reel
     */
    public function setDateDebutReel($date_debut_reel)
    {
        $this->date_debut_reel = $date_debut_reel;
    }
    /**
     * @return mixed
     */
    public function getIdIntervention()
    {
        return $this->id_intervention;
    }

    /**
     * @param mixed $id_intervention
     */
    public function setIdIntervention($id_intervention)
    {
        $this->id_intervention = $id_intervention;
    }

    /**
     * @return mixed
     */
    public function getIdMateriel()
    {
        return $this->id_materiel;
    }

    /**
     * @param mixed $id_materiel
     */
    public function setIdMateriel($id_materiel)
    {
        $this->id_materiel = $id_materiel;
    }

    /**
     * @return mixed
     */
    public function getLibelleIntervention()
    {
        return htmlspecialchars($this->libelle_intervention);
    }

    /**
     * @param mixed $libelle_intervention
     */
    public function setLibelleIntervention($libelle_intervention)
    {
        $this->libelle_intervention = $libelle_intervention;
    }

    /**
     * @return mixed
     */
    public function getTypeIntervention()
    {
        return $this->type_intervention;
    }

    /**
     * @param mixed $type_intervention
     */
    public function setTypeIntervention($type_intervention)
    {
        $this->type_intervention = $type_intervention;
    }

    /**
     * @return mixed
     */
    public function getStatutIntervention()
    {
        return $this->statut_intervention;
    }

    /**
     * @param mixed $statut_intervention
     */
    public function setStatutIntervention($statut_intervention)
    {
        $this->statut_intervention = $statut_intervention;
    }

    /**
     * @return mixed
     */
    public function getCodeOperationIntervention()
    {
        return $this->code_operation_intervention;
    }

    /**
     * @param mixed $code_operation_intervention
     */
    public function setCodeOperationIntervention($code_operation_intervention)
    {
        $this->code_operation_intervention = $code_operation_intervention;
    }

    /**
     * @return null
     */
    public function getIdRdv()
    {
        return $this->id_rdv;
    }

    /**
     * @param null $id_rdv
     */
    public function setIdRdv($id_rdv)
    {
        $this->id_rdv = $id_rdv;
    }

    /**
     * @return mixed
     */
    public function getDateDebutPrevisionnelIntervention()
    {
        return $this->date_debut_previsionnel_intervention;
    }

    /**
     * @param mixed $date_debut_previsionnel_intervention
     */
    public function setDateDebutPrevisionnelIntervention($date_debut_previsionnel_intervention)
    {
        $this->date_debut_previsionnel_intervention = $date_debut_previsionnel_intervention;
    }

    /**
     * @return mixed
     */
    public function getDateFinPrevisionnelle()
    {
        return $this->date_fin_previsionnelle;
    }

    /**
     * @param mixed $date_fin_previsionnelle
     */
    public function setDateFinPrevisionnelle($date_fin_previsionnelle)
    {
        $this->date_fin_previsionnelle = $date_fin_previsionnelle;
    }

    /**
     * @return mixed
     */
    public function getDateFinReelle()
    {
        return $this->date_fin_reelle;
    }

    /**
     * @param mixed $date_fin_reelle
     */
    public function setDateFinReelle($date_fin_reelle)
    {
        $this->date_fin_reelle = $date_fin_reelle;
    }

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getHasRdv()
    {
        return $this->has_rdv;
    }

    /**
     * @param mixed $has_rdv
     */
    public function setHasRdv($has_rdv)
    {
        $this->has_rdv = $has_rdv;
    }

    /**
     * @return null
     */
    public function getDebutRdv()
    {
        return $this->debut_rdv;
    }

    /**
     * @param null $debut_rdv
     */
    public function setDebutRdv($debut_rdv)
    {
        $this->debut_rdv = $debut_rdv;
    }

    /**
     * @return null
     */
    public function getFinRdv()
    {
        return $this->fin_rdv;
    }

    /**
     * @param null $fin_rdv
     */
    public function setFinRdv($fin_rdv)
    {
        $this->fin_rdv = $fin_rdv;
    }

    /**
     * @return null
     */
    public function getSiteRealisateur()
    {
        return $this->site_realisateur;
    }

    /**
     * @param null $site_realisateur
     */
    public function setSiteRealisateur($site_realisateur)
    {
        $this->site_realisateur = $site_realisateur;
    }
    /**
     * @return mixed
     */
    public function getDateFinOptimale()
    {
        return $this->date_fin_optimale;
    }

    /**
     * @param mixed $date_fin_optimale
     */
    public function setDateFinOptimale($date_fin_optimale)
    {
        $this->date_fin_optimale = $date_fin_optimale;
    }

    /**
     * @return mixed
     */
    public function getIdCoupon()
    {
        return $this->id_coupon;
    }

    /**
     * @param mixed $id_coupon
     */
    public function setIdCoupon($id_coupon)
    {
        $this->id_coupon = $id_coupon;
    }

    /**
     * @return mixed
     */
    public function getButeeTechnique()
    {
        return $this->butee_technique;
    }

    /**
     * @param mixed $butee_technique
     */
    public function setButeeTechnique($butee_technique)
    {
        $this->butee_technique = $butee_technique;
    }

    /**
     * @return mixed
     */
    public function getExists()
    {
        return $this->exists;
    }

    /**
     * @param mixed $exists
     */
    public function setExists($exists)
    {
        $this->exists = $exists;
    }



    /*
     *
     * FUNCTIONS
     *
     */

    private function findRdv($connexion){

        $clefIntervention = "-".$this->debut_rdv."-".$this->fin_rdv."-".$this->id_materiel."-";

        $query = 'SELECT * FROM rdv WHERE clef_concat LIKE "%'.$clefIntervention.'%" ;';

        $search = $connexion->prepare($query);
        $search->execute();

        $result = $search->fetch(PDO::FETCH_ASSOC);

        if($result['id_rdv']){
            $this->setIdRdv(intval($result['id_rdv']));
            $this->setHasRdv(1);
        }else{
            $this->setIdRdv(0);
            $this->setHasRdv(0);
        }
        return $result;
    }

    public function insertDb($connexion){
        $this->findRdv($connexion);
        $query = "";

        // Gets All existing Ids and puts them in a clean table
        $idsBrut = $this->getAllIdInterventions($connexion);
        foreach($idsBrut as $key=>$value){
            $id[] = $value[0];
        }

        // Search for existing same ID
        if(array_search($this->getIdIntervention(),$id)===FALSE){
            $this->setExists(FALSE);
        }else{
            $this->setExists(TRUE);
        }

        // If the id exists, updates the INTERVENTION, else, creates a new INTERVENTION in database
        if($this->getExists()){
            $oldIntervention = $this->getInterventionById($this->getIdIntervention(),$connexion);
            // Mise à jour uniquement sur les changements importants
            if ($oldIntervention->getIdRdv() != $this->getIdRdv() ||
                $oldIntervention->getButeeTechnique() != $this->getButeeTechnique() ||
                $oldIntervention->getDateDebutPrevisionnelIntervention() != $this->getDateDebutPrevisionnelIntervention() ||
                $oldIntervention->getDateFinReelle() != $this->getDateFinReelle() ||
                $oldIntervention->getDateFinPrevisionnelle() != $this->getDateFinPrevisionnelle() ||
                $oldIntervention->getStatutIntervention() != $this->getStatutIntervention() ||
                $oldIntervention->getStatutOperationnel() != $this->getStatutOperationnel()
            )
            {

                // On va chercher ici les différentes alertes liées aux interventions s'il y a eu modification
                $typeAlert = new typeAlerte('intervention',$connexion);
                foreach($typeAlert->functionList as $key => $functionName){
                    $typeAlert->$functionName['functionName']($this,$oldIntervention,$connexion);
                }

                $query = "UPDATE intervention SET
                      libelle_intervention = \"".$this->getLibelleIntervention()."\",
                      type_intervention = \"".$this->getTypeIntervention()."\",
                      statut_intervention = \"".$this->getStatutIntervention()."\",
                      id_rdv = \"".$this->getIdRdv()."\",
                      debut_previsionnel_intervention = \"".$this->getDateDebutPrevisionnelIntervention()."\",
                      date_fin_previsionnelle = \"".$this->getDateFinPrevisionnelle()."\",
                      date_fin_reelle = \"".$this->getDateFinReelle()."\",
                      site_realisateur = \"".$this->getSiteRealisateur()."\",
                      date_optimale = \"".$this->getDateFinOptimale()."\",
                      id_coupon = \"".$this->getIdCoupon()."\",
                      debut_rdv = \"".$this->getDebutRdv()."\",
                      fin_rdv = \"".$this->getFinRdv()."\",
                ";


                if($oldIntervention->getButeeTechnique()== null && $this->getButeeTechnique() != null){
                    $query .= "butee_technique = \"".$this->getButeeTechnique()."\",";
                }else{}
                if($this->getIdRdv()!= null){
                    $query .= "id_rdv = ".$this->getIdRdv().", ";
                }

                $query .= " updated = 1 WHERE id_intervention = ".$this->getIdIntervention();
            }

        }else{
            $query = 'INSERT INTO intervention (
                  id_intervention,
                  id_materiel,
                  libelle_intervention,
                  type_intervention,
                  statut_intervention,
                  code_operation_intervention,
                  debut_previsionnel_intervention,
                  date_fin_previsionnelle,
                  date_fin_reelle,
                  site_realisateur,
                  date_optimale,
                  butee_technique,
                  id_coupon,
                  debut_rdv,
                  fin_rdv,
              ';

            if($this->getIdRdv()!= null){
                $query .= "id_rdv, ";
            }else{}

              $query .= 'updated)

              VALUES (
              '.intval($this->getIdIntervention()).',
              '.intval($this->getIdMateriel()).',
              "'.$this->getLibelleIntervention().'",
              "'.$this->getTypeIntervention().'",
              "'.$this->getStatutIntervention().'",
              "'.$this->getCodeOperationIntervention().'",
              "'.$this->getDateDebutPrevisionnelIntervention().'",
              "'.$this->getDateFinPrevisionnelle().'",
              "'.$this->getDateFinReelle().'",
              "'.$this->getSiteRealisateur().'",
              "'.$this->getDateFinOptimale().'",
              "'.$this->getButeeTechnique().'",
              "'.$this->getIdCoupon().'",
              "'.$this->getDebutRdv().'",
              "'.$this->getFinRdv().'",
              ';
            if($this->getIdRdv()!= null){
                $query .= $this->getIdRdv().', ';
            }else{}

            $query .= ' 1)';
        }

        $send = $connexion->prepare($query);
        if (!$send) {
            echo "\nPDO::errorInfo():\n";
            vardump($connexion->errorInfo());
        }
        $send->execute();
        #var_dump($send);
    }

    private function getAllIdInterventions($connexion){
        $query = 'SELECT id_intervention FROM intervention';
        $search = $connexion->prepare($query);
        $search->execute();

        return $search->fetchAll(PDO::FETCH_NUM);
    }
    public function getInterventionById($id, $connexion){
        $query = 'SELECT * FROM intervention WHERE id_intervention='.intval($id);
        $search = $connexion->prepare($query);
        $search->execute();

        $di = $search->fetch(PDO::FETCH_ASSOC);
        $diObject = new intervention($di['id_intervention'],$di['id_materiel'],$di['libelle_intervention'],$di['type_intervention'],$di['statut_intervention'],$di['code_operation_intervention'],$di['debut_rdv'],$di['fin_rdv'],$di['debut_previsionnel_intervention'],$di['date_fin_previsionnelle'],$di['date_fin_reelle'],$di['site_realisateur'],$di['date_optimale'],$di['id_coupon'],$di['butee_technique'],$di['id_rdv']);
        return $diObject;
    }
    public function getMrByIntervention($connexion){
        $query = "SELECT * FROM materiel m WHERE m.id_materiel = (
                          SELECT id_materiel
                          FROM intervention i
                          WHERE i.id_intervention = ".$this->getIdIntervention()."
                      )";
        $query = $connexion->prepare($query);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}