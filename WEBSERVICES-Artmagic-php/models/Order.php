<?php
    class Order extends Connection{
        public function getOrders(){
            $connection = new Connection();
            $sql ="SELECT * FROM tblorder";
            $sql = $connection->prepare($sql);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getOrdersParams($id_user,$address_order,$phone_order){
            $connection = new Connection();
            $sql ="SELECT * FROM tblorder as tbord inner join tblproduct as product on product.id_product = tbord.id_product where id_user=? and address_order= ? and phone_order=? and state_order=2";
            $sql = $connection->prepare($sql);
            $sql->bindValue(1,$id_user);
            $sql->bindValue(2,$address_order);
            $sql->bindValue(3,$phone_order);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOrdersid($pro_id){
            $connection = new Connection();
            $sql ="SELECT * FROM tblorder where id_order = ?";
            $sql = $connection->prepare($sql);
            $sql->bindValue(1,$pro_id);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getProduct_order(){
            $connection = new Connection();
            $sql ="SELECT * FROM tblorder as orderX inner join tblproduct as product on orderX.id_product = product.id_product
            where orderX.state_order=1";
            $sql = $connection->prepare($sql);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_order($id_user,$id_product,$date_order,$state_order,$address_order,$phone_order){
            $connection = new Connection();
            $sql ="INSERT INTO tblorder (id_user,id_product,date_order,state_order,address_order,phone_order) VALUES(?,?,?,?,?,?)";
            $sql = $connection->prepare($sql);
            $sql->bindValue(1,$id_user);
            $sql->bindValue(2,$id_product);
            $sql->bindValue(3,$date_order);
            $sql->bindValue(4,$state_order);
            $sql->bindValue(5,$address_order);
            $sql->bindValue(6,$phone_order);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function confirm_order($id_order,$id_user,$id_product,$address_order,$phone_order){
            $connection = new Connection();
            $sql = "UPDATE tblorder 
                    SET address_order= ?, phone_order=?, state_order=2
                    where id_order=? and id_user=? and id_product =?";
            $sql = $connection->prepare($sql);
            $sql->bindValue(1,$address_order);
            $sql->bindValue(2,$phone_order);
            $sql->bindValue(3,$id_order);
            $sql->bindValue(4,$id_user);
            $sql->bindValue(5,$id_product);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>