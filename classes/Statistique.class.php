<?php
    require_once 'dbconnect.class.php';
    
    class Stat
    {
        private $cnct;

        public function __construct()
        {
            $db = new Database;
            $connect = $db->connectDB();
            $this->cnct = $connect;
        }

        private function execReq($sql)
        {
            $stmt = $this->cnct->prepare($sql);
            return $stmt;
        }

       

        public function deconnect()
        {
            unset($this->cnct);
        }

    }
