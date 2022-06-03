<?php

class ProfileModel extends BaseModel{

    function __construct(){
        parent::__construct();
    }

    function getOrders(){

        require('products.php');
        require('order.php');

        //TO DO: where is a client id
        Session::init();
        $clientId = Session::get("user");
       
        $stmt = $this->db->prepare('SELECT `orderID`, `sum`, `pickupPointID` FROM `orders` WHERE `clientID` = :clientId');
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $stmt->execute(array(
            ':clientId' => $clientId
        ));
        $data = $stmt->fetchAll();

        $stmt_products = $this->db->prepare('SELECT  `products`.`productID`,`products`.`img`, `products`.`title`,`products`.`ML`, `products`.`price`, `products`.`sale`,  `productCount`
        FROM `orders_products`
        JOIN `products` ON `products`.`productID` = `orders_products`.`productId`
        WHERE `orders_products`.`orderID` = :orderID');
        $stmt_products->setFetchMode(PDO::FETCH_NUM);
        $orders = array();
        foreach($data as $item){
           
            $stmt_products->execute(array(
                ':orderID' => $item[0]
            ));
            $productsData = $stmt_products->fetchAll();

            $orderProducts= array();
            foreach($productsData as $productDbItem){
                $orderProduct = new Products($productDbItem[0],0,$productDbItem[1], $productDbItem[2],'', $productDbItem[3],$productDbItem[4],$productDbItem[5]);
              
                 $orderProduct->count = $productDbItem[6];
                 $orderProducts[] = $orderProduct;
            }

            $orders[] = new Order($item[0], $clientId, $item[1],$item[2], $orderProducts);
            
        }
        return $orders;
    }
    public function getCategories()
    {
        require_once "category.php";
        $stmt = $this->db->query("SELECT `id`, `category`,`description`,`img` FROM `categories`");
        $stmt->setFetchMode(PDO::FETCH_NUM);

        $stmt->execute();
        $data = $stmt->fetchAll();

        $categories = array();
        foreach ($data as $item) {

            $categories[] = new Category($item[0], $item[1], $item[2], $item[3]);
        }
        return $categories;
    }
}