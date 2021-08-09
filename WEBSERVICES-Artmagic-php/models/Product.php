<?php
    class Product extends Connection{
        public function getProducts(){
            $connection = new Connection();
            $sql ="SELECT * FROM tblproduct";
            $sql = $connection->prepare($sql);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProductsid($pro_id){
            $connection = new Connection();
            $sql ="SELECT * FROM tblproduct where id_product = ?";
            $sql = $connection->prepare($sql);
            $sql->bindValue(1,$pro_id);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_product($namepro,$descriptionpro,$pricepro,$statepro,$rutaimg){
            $connection = new Connection();
            $sql ="INSERT INTO tblproduct (namepro,descriptionpro,pricepro,statepro,rutaimg) VALUES(?,?,?,?,?)";
            $sql = $connection->prepare($sql);
            $sql->bindValue(1,$namepro);
            $sql->bindValue(2,$descriptionpro);
            $sql->bindValue(3,$pricepro);
            $sql->bindValue(4,$statepro);
            $sql->bindValue(5,$rutaimg);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>