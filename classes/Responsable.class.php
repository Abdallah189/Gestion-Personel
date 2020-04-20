<?php
    require_once 'dbconnect.class.php';
    
    class Responsable
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

        
        public function AddMembre($cin,$nom,$prenom,$age,$tel,$pro,$sexe)
        {
            try {
                $sql = "INSERT INTO `membres` (`cin`, `Num_serie`, `nom`, `prenom`, `age`, `tel`, `profession`, `sexe`) VALUES ('$cin', NULL, '$nom', '$prenom', '$age', '$tel', '$pro', '$sexe')";
                $result = $this->execReq($sql);
                $result->execute();
                return $result;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function ReadAllMembres()
        {
            try {
                $sql = 'SELECT * FROM membres ';
                $result = $this->execReq($sql);
                $result->execute();
                return $result;
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        }

        public function ReadSpecificMembres($cin)
        {
            try {
                $sql = 'SELECT * FROM membres WHERE cin = :cin';
                $req = $this->execReq($sql);
                $req->bindparam(":cin", $cin);
                $req->execute();
                return $req;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function UpdateMembres($cin,$nom,$prenom,$age,$tel,$pro,$sexe)
        {
            try {
                $sql = 'UPDATE membres SET cin = :_cin ,nom= :_nom,prenom = _prenom,age = :_age,tel = :_tel,profession=_pro,sexe=_sexe WHERE cin= :_cin';
                $result = $this->execReq($sql);
                $result->bindparam(":_cin", $cin);
                $result->bindparam(":_prenom", $prenom);
                $result->bindparam(":_nom", $nom);
                $result->bindparam(":_tel", $tel);
                $result->bindparam(":_pro", $pro);
                $result->bindparam(":_age", $age);
                $result->bindparam(":_sexe", $sexe);
                $result->execute();
                return $result;

            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        }

       

        public function deconnect()
        {
            unset($this->cnct);
        }

    }
