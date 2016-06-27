<?php
    /**
     * Created by Yaiba.
     * Date: 08/04/2016
     * Time: 11:49
     */

    class typeAlerte
    {
        protected $id_typeAlerte;
        protected $obj = null;
        protected $objOld = null;
        protected $connexion = null;
        public $functionList = [];


        /**
         * typeAlerte constructor.
         */
        public function __construct($type, $connexion)
        {
            $this->findAlertes($type,$connexion);
        }
        /**
         * @return array
         */
        public function getFunctionList()
        {
            return $this->functionList;
        }

        /**
         * @param array $functionList
         */
        public function setFunctionList($functionList)
        {
            $this->functionList = $functionList;
        }

        /**
         * @return mixed
         */
        public function getIdTypeAlerte()
        {
            return $this->id_typeAlerte;
        }

        /**
         * @param mixed $id_typeAlerte
         */
        public function setIdTypeAlerte($id_typeAlerte)
        {
            $this->id_typeAlerte = $id_typeAlerte;
        }

        /**
         * @return null
         */
        public function getObj()
        {
            return $this->obj;
        }

        /**
         * @param null $obj
         */
        public function setObj($obj)
        {
            $this->obj = $obj;
        }

        /**
         * @return null
         */
        public function getObjOld()
        {
            return $this->objOld;
        }

        /**
         * @param null $objOld
         */
        public function setObjOld($objOld)
        {
            $this->objOld = $objOld;
        }

        /*
         *
         * FUNCTIONS
         *
         * */

        protected function findAlertes($type,$connexion){
            $query ='SELECT functionName from type_alerte WHERE class="'.strtolower(htmlspecialchars($type)).'"';
            $send = $connexion->prepare($query);
            $send->execute();

            $this->setFunctionList($send->fetchAll(PDO::FETCH_ASSOC));
        }
        public function checkDates($obj,$objOld,$connexion){

        }

        public function dispoMR($obj, $objOld,$connexion){
            $query = "SELECT id_materiel,statut_operationnel,numero,id_stf FROM materiel m WHERE m.id_materiel = (
                          SELECT id_materiel
                          FROM intervention i
                          WHERE i.id_intervention = ".$obj->getIdIntervention()."
                      )";
            $query = $connexion->prepare($query);
            $query->execute();

            $MR = $query->fetch(PDO::FETCH_ASSOC);

            if($obj->getStatutIntervention() == "ENCOURSREAL" && $MR['statut_operationnel'] == "Dispo exploqitation" ){
                $array['id_type_alerte']=7;
                $array['texte_alerte']="Le matériel ".$MR['numero']." est disponible alors que la DI ".$obj->getIdIntervention()." est en cours de réalisation.";
                $array['id_stf']=$MR['id_stf'];
                $array['id_gof']=null;
                $array['id_materiel']=$MR['id_materiel'];

                alerte::createAlerte($array, $GLOBALS['connexion']);
            }
        }

    }