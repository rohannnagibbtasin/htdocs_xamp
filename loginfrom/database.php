<?php
    class Database{
        private $host     = 'localhost';
        private $user     = 'root';
        private $pass     = '';
        private $dbname   = 'tasin';

        private $dbh;
        private $error;
        private $stmt;

        public function __construct()
        {
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;

            $options = array(
                PDO::ATTR_PERSISTENT  =>true,
                PDO::ATTR_ERRMODE     =>PDO::ERRMODE_EXCEPTION
            );

            try{
                $this->dbh = new PDO($dsn,$this->user,$this->pass,$options);
            }
            catch(PDOException $e){
                echo "<h1 style=\"text-align: center;\">404 Not Found</h1>";
                die();
            }
        }
        public function query($query){
            $this->stmt = $this ->dbh->prepare($query);
        }
        public function bind($param,$value,$type=null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param,$value,$type);
        }
        public function exec(){
            return $this->stmt->execute();
        }
        public function resultset(){
            $this->exec();
            return $this->stmt->fethAll(PDO::FETCH_ASSOC);
        }
    }
?>