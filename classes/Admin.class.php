  <?php
    require_once 'dbconnect.class.php';
    
    class Admin
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

        public function AddResponsable($cin,$nom,$prenom,$email,$login,$psw,$sexe)
        {
            try {
                $sql = "INSERT INTO `responsable` (`cin`, `Num_serie`, `nom`, `prenom`, `email`, `login`, `psw`, `sexe`) VALUES ('$cin', NULL,'$nom', '$prenom', '$email','$login','$psw','$sexe')";
                $result = $this->execReq($sql);
                $result->execute();
                return $result;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function ReadAllResponsable()
        {
            try {
                $sql = 'SELECT * FROM responsable ';
                $result = $this->execReq($sql);
                $result->execute();
                return $result;
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        }

        public function ReadSpecificResponsable($cin)
        {
            try {
                $sql = 'SELECT * FROM responsable  WHERE cin = :cin';
                $req = $this->execReq($sql);
                $req->bindparam(":cin", $cin);
                $req->execute();
                return $req;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function UpdateResponsable($cin,$nom,$prenom,$email,$login,$psw,$sexe)
        {
            try {
                $sql = 'UPDATE responsable SET cin = :_cin , nom = :_nom, prenom = :_prenom, email = :_email,login=:_login,psw = :_psw,sexe = :_sexe WHERE cin = :_cin';
                $result = $this->execReq($sql);
                $result->bindparam(":_cin", $cin);
                $result->bindparam(":_nom", $nom);
                $result->bindparam(":_prenom", $prenom);
                $result->bindparam(":_email", $email);
                $result->bindparam(":_login", $login);
                $result->bindparam(":_psw", $psw);
                $result->bindparam(":_sexe", $sexe);
                $result->execute();
                return $result;

            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        }

        public function DeleteResponsable($cin)
        {
            try {
                $sql = 'DELETE FROM responsable WHERE cin= :cin';
                $result = $this->execReq($sql);
                $result->bindparam(":cin", $cin);
                $result->execute();
                return $result;
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        }

        public function DeleteMembres($cin)
        {
            try {
                $sql = 'DELETE FROM membres WHERE cin= :_cin';
                $result = $this->execReq($sql);
                $result->bindparam(":_cin", $cin);
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
