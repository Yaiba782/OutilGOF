<?php
/**
 * Created by Yaiba.
 * Date: 18/12/15
 * Time: 11:59
 */

class site_realisateur {
    private $id_site_realisateur;
    private $nom_site_realisateur;
    private $diminutif_site_realisateur;
    private $equivalent_gmao_diminutif_site_realisateur;

    function __construct($id_site_realisateur, $nom_site_realisateur, $diminutif_site_realisateur, $equivalent_gmao_diminutif_site_realisateur)
    {
        $this->id_site_realisateur = $id_site_realisateur;
        $this->nom_site_realisateur = $nom_site_realisateur;
        $this->diminutif_site_realisateur = $diminutif_site_realisateur;
        $this->equivalent_gmao_diminutif_site_realisateur = $equivalent_gmao_diminutif_site_realisateur;
    }

    /**
     * @return mixed
     */
    public function getIdSiteRealisateur()
    {
        return $this->id_site_realisateur;
    }

    /**
     * @param mixed $id_site_realisateur
     */
    public function setIdSiteRealisateur($id_site_realisateur)
    {
        $this->id_site_realisateur = $id_site_realisateur;
    }

    /**
     * @return mixed
     */
    public function getNomSiteRealisateur()
    {
        return $this->nom_site_realisateur;
    }

    /**
     * @param mixed $nom_site_realisateur
     */
    public function setNomSiteRealisateur($nom_site_realisateur)
    {
        $this->nom_site_realisateur = $nom_site_realisateur;
    }

    /**
     * @return mixed
     */
    public function getDiminutifSiteRealisateur()
    {
        return $this->diminutif_site_realisateur;
    }

    /**
     * @param mixed $diminutif_site_realisateur
     */
    public function setDiminutifSiteRealisateur($diminutif_site_realisateur)
    {
        $this->diminutif_site_realisateur = $diminutif_site_realisateur;
    }

    /**
     * @return mixed
     */
    public function getEquivalentGmaoDiminutifSiteRealisateur()
    {
        return $this->equivalent_gmao_diminutif_site_realisateur;
    }

    /**
     * @param mixed $equivalent_gmao_diminutif_site_realisateur
     */
    public function setEquivalentGmaoDiminutifSiteRealisateur($equivalent_gmao_diminutif_site_realisateur)
    {
        $this->equivalent_gmao_diminutif_site_realisateur = $equivalent_gmao_diminutif_site_realisateur;
    }


}