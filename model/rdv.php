<?php

    /**
     * Created by Yaiba.
     * Date: 01/04/2016
     * Time: 13:44
     */
    include_once(dirname(__FILE__).'/../includes/functions.php');

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
        protected $exists = false;


        public function __construct($id_rdv, $date_debut_rdv, $date_fin_rdv, $site_realisateur, $libelle, $id_materiel, $statut)
        {
            $this->id_rdv = $id_rdv;
            $this->setDateDebutRdv($date_debut_rdv);
            $this->setDateFinRdv($date_fin_rdv);
            $this->site_realisateur = $site_realisateur;
            $this->libelle = $libelle;
            $this->id_materiel = $id_materiel;
            $this->statut = $statut;

            $this->setClefConcat();
        }
        /**
         * @return mixed
         */
        public function getStatut()
        {
            return $this->statut;
        }

        /**
         * @param mixed $statut
         */
        public function setStatut($statut)
        {
            $this->statut = $statut;
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
            $this->clef_concat = '-'.$this->date_debut_rdv.'-'.$this->date_fin_rdv.'-'.$this->id_materiel.'-';
        }

        public function sendDb($connexion){
            $idsBrut = $this->getAllIdRdv($connexion);
            foreach($idsBrut as $key=>$value){
                $id[] = $value[0];
            }

            // Search for existing same ID
            if(array_search($this->getIdRdv(),$id)===FALSE){
                $this->setExists(FALSE);
            }else{
                $this->setExists(TRUE);
            }

            if ($this->getExists()){
                $query = 'UPDATE rdv SET
                id_rdv = '.$this->getIdRdv().',
                date_debut_rdv = "'.$this->getDateDebutRdv().'",
                date_fin_rdv = "'.$this->getDateFinRdv().'",
                site_realisateur = "'.$this->getSiteRealisateur().'",
                libelle = "'.$this->getLibelle().'",
                clef_concat = "'.$this->getClefConcat().'"
                WHERE id_rdv = '.$this->getIdRdv().'!
                
                ';
                $update = $connexion->prepare($query);
                $update->execute();

                var_dump($update);
            }else{

                $query = 'INSERT INTO rdv
                (id_rdv, date_debut_rdv, date_fin_rdv, site_realisateur, libelle, clef_concat, id_materiel, statut)
                VALUES
                ('.$this->id_rdv.',"'.$this->date_debut_rdv.'","'.$this->date_fin_rdv.'","'.$this->site_realisateur.'","'.htmlspecialchars($this->libelle).'","'.$this->clef_concat.'",'.$this->id_materiel.', "'.$this->statut.'");';

                $insert = $connexion->prepare($query);
                $insert->execute();
                var_dump($insert);
            }
        }
        public function getMrByIdMateriel($connexion){
            $query = "SELECT * FROM materiel WHERE id_materiel = ".$this->getIdMateriel();
            $query = $connexion->prepare($query);
            $query->execute();

            return $query->fetch(PDO::FETCH_ASSOC);
        }

        private function getAllIdRdv($connexion){
            $query = 'SELECT id_rdv FROM rdv';
            $search = $connexion->prepare($query);
            $search->execute();

            return $search->fetchAll(PDO::FETCH_NUM);
        }
    }
