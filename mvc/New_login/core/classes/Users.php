<?php
    class Users{
        protected $db;
        public function __construct(){
            $this->db = Database::instance();
        }

        public function get($table, $fields = array()){
            $columns = implode(',  ',array_keys($fields));
            $sql = "select * from `{$table}` where `{$columns}` = :{$columns}";
            if ($stmt = $this->db->prepare($sql)){
                foreach ($fields as $key => $value){
                    $stmt->bindValue(":{$key}", $value);
                }

                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_OBJ);
            }
        }

    }