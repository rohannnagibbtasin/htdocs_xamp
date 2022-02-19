<?php

    class Database
    {

        //Properties Declaration Here That Is Needed

        private $host ="localhost";
        private $user ="root";
        private $pass ="";
        private $db;
        private $table;
        private $id;
        private $conn;
        private $email;
        private $username;

        //It Connects With MySql

        public function start($db_name){
            $this->db = $db_name;
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db}",$this->user,$this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e){
                die("Failed");
            }
        }

        //It Closes Connection With MySql

        public function close(){
            $this->conn     = null;
            $this->db       = null;
            $this->table    = null;
            $this->id       = null;
            $this->email    = null;
            $this->username = null;
        }

        //It Returns All Data In Array From 
        public function show_all_data($table_name){
            $this->table = $table_name;
            $sql = "SELECT * FROM {$this->table} ";
            $result = $this->conn->prepare($sql);
            $result->execute();
            $data = array();
            while($row=$result->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
        }

        //It Returns A Single Line Data In  Array From With Id

        public function show_single_data_by_id($table_name,$id){
            $this->table = $table_name;
            $this->id = $id;
            $sql = "SELECT * FROM {$this->table} WHERE id = :id";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':id',$this->id);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row;
        }

        //It Returns A Single Line Data In  Array From With Email

        public function show_single_data_by_email($table_name,$email){
            $this->table = $table_name;
            $this->email = $email;
            $sql = "SELECT * FROM {$this->table} WHERE email = :email";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':email',$this->email);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row;
        }

        //It Returns A Single Line Data In  Array From With Username

        public function show_single_data_by_username($table_name,$username){
            $this->table = $table_name;
            $this->username = $username;
            $sql = "SELECT * FROM {$this->table} WHERE username = :username";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':username',$this->username);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row;
        }

        //It Deletes Data From A Table With Id

        public function delete_with_id($table_name,$id){
            $this->table = $table_name;
            $this->id = $id;
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':id',$this->id);
            $result->execute();
            return $result->rowCount();
        }

        //It Deletes Data From A Table With Email

        public function delete_with_email($table_name,$email){
            $this->table = $table_name;
            $this->email = $email;
            $sql = "DELETE FROM {$this->table} WHERE email = :email";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':email',$this->email);
            $result->execute();
            return $result->rowCount();
        }

        //It Deletes Data From A Table With Username

        public function delete_with_username($table_name,$username){
            $this->table = $table_name;
            $this->username = $username;
            $sql = "DELETE FROM {$this->table} WHERE username = :username";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':username',$this->username);
            $result->execute();
            return $result->rowCount();
        }


        
    }