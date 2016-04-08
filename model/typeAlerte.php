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
        public function test1($obj,$objOld){
            echo "salut";
        }
        public function test2($obj,$objOld){
            echo "bonjour";
        }



    }