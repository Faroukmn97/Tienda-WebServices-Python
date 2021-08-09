<?php
    class User extends Connection{
        public function getUser(){
            $connection = new Connection();
            $sql ="SELECT * FROM tbluser";
            $sql = $connection->prepare($sql);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUsersid($user_id){
            $connection = new Connection();
            $sql ="SELECT * FROM tbluser where id_user = ?";
            $sql = $connection->prepare($sql);
            $sql->bindValue(1,$user_id);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_user($nameuse,$last_nameuse,$emailuse,$passworduse,$stateuse){
            $connection = new Connection();
            $sql ="INSERT INTO tbluser (nameuse,last_nameuse,emailuse,passworduse,stateuse) VALUES(?,?,?,?,?)";
            $sql = $connection->prepare($sql);
            $sql->bindValue(1,$nameuse);
            $sql->bindValue(2,$last_nameuse);
            $sql->bindValue(3,$emailuse);
            $sql->bindValue(4,$passworduse);
            $sql->bindValue(5,$stateuse);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function login_user($emailuse, $passworduse){
            $connection = new Connection();
            $sql ="SELECT * FROM tbluser where emailuse = ?";
            $sql = $connection->prepare($sql);
            $sql->bindValue(1,$emailuse);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>