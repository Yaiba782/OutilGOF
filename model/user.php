<?php
/**
 * Created by Yaiba.
 * Date: 28/01/16
 * Time: 14:42
 */

    class gof extends stf{
        protected $id;
        protected $stf;
        protected $nom_gof;
        protected $login;
        protected $mdp;
        protected $active;
        protected $access_lvl;

        /**
         * @return mixed
         */
        public function getAccessLvl()
        {
            return $this->access_lvl;
        }

        /**
         * @param mixed $access_lvl
         */
        public function setAccessLvl($access_lvl)
        {
            $this->access_lvl = $access_lvl;
        }

        function __construct($id, $stf, $nom_gof, $access_lvl)
        {
            $this->id = $id;
            $this->stf = $stf;
            $this->nom_gof = $nom_gof;
            $this->access_lvl = $access_lvl;
        }


        /**
         * @return mixed
         */
        public function getStf()
        {
            return $this->stf;
        }

        /**
         * @param mixed $stf
         */
        public function setStf($stf)
        {
            $this->stf = $stf;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getNomGof()
        {
            return $this->nom_gof;
        }

        /**
         * @param mixed $nom_gof
         */
        public function setNomGof($nom_gof)
        {
            $this->nom_gof = $nom_gof;
        }

        /**
         * @return mixed
         */
        public function getLogin()
        {
            return $this->login;
        }

        /**
         * @param mixed $login
         */
        public function setLogin($login)
        {
            $this->login = $login;
        }

        /**
         * @return mixed
         */
        public function getMdp()
        {
            return $this->mdp;
        }

        /**
         * @param mixed $mdp
         */
        public function setMdp($mdp)
        {
            $this->mdp = $mdp;
        }

}