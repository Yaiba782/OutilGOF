<?php

    /**
     * Created by Yaiba.
     * Date: 01/04/2016
     * Time: 13:44
     */
    class rdv
    {
        protected $id_rdv;
        protected $date_debut_rdv;
        protected $date_fin_rdv;
        protected $site_realisateur;
        protected $libelle;
        protected $statut;
        protected $clef_concat;
        protected $id_materiel;

        public function __construct($id_rdv, $date_debut_rdv, $date_fin_rdv, $site_realisateur, $libelle, $id_materiel, $statut)
        {
            $this->id_rdv = $id_rdv;
            $this->date_debut_rdv = $date_debut_rdv;
            $this->date_fin_rdv = $date_fin_rdv;
            $this->site_realisateur = $site_realisateur;
            $this->libelle = $libelle;
            $this->id_materiel = $id_materiel;
            $this->statut = $statut;

            $this->setClefConcat();
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
        public function getIdRdv()
        {
            return $this->id_rdv;
        }

        /**
         * @param mixed $id_rdv
         */
        public function setIdRdv($id_rdv)
        {
            $this->id_rdv = $id_rdv;
        }

        /**
         * @return mixed
         */
        public function getDateDebutRdv()
        {
            return $this->date_debut_rdv;
        }

        /**
         * @param mixed $date_debut_rdv
         */
        public function setDateDebutRdv($date_debut_rdv)
        {
            $this->date_debut_rdv = $date_debut_rdv;
        }

        /**
         * @return mixed
         */
        public function getDateFinRdv()
        {
            return $this->date_fin_rdv;
        }

        /**
         * @param mixed $date_fin_rdv
         */
        public function setDateFinRdv($date_fin_rdv)
        {
            $this->date_fin_rdv = $date_fin_rdv;
        }

        /**
         * @return mixed
         */
        public function getSiteRealisateur()
        {
            return $this->site_realisateur;
        }

        /**
         * @param mixed $site_realisateur
         */
        public function setSiteRealisateur($site_realisateur)
        {
            $this->site_realisateur = $site_realisateur;
        }

        /**
         * @return mixed
         */
        public function getLibelle()
        {
            return $this->libelle;
        }

        /**
         * @param mixed $libelle
         */
        public function setLibelle($libelle)
        {
            $this->libelle = $libelle;
        }

        /**
         * @return mixed
         */
        public function getClefConcat()
        {
            return $this->clef_concat;
        }

        /**
         * @param mixed $clef_concat
         */
        public function setClefConcat()
        {
            $this->clef_concat = '_'.$this->date_debut_rdv.'_'.$this->date_fin_rdv.'_'.$this->id_materiel.'_';
        }

        public function sendDb($connexion){
            $query = 'INSERT INTO rdv
            (id_rdv, date_debut_rdv, date_fin_rdv, site_realisateur, libelle, clef_concat, id_materiel, statut)
            VALUES
            ('.$this->id_rdv.',"'.$this->date_debut_rdv.'","'.$this->date_fin_rdv.'","'.$this->site_realisateur.'","'.htmlspecialchars($this->libelle).'","'.$this->clef_concat.'",'.$this->id_materiel.', "'.$this->statut.'");';

            $insert = $connexion->prepare($query);
            $insert->execute();


        }
    }