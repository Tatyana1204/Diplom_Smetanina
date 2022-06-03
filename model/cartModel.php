<?php
class CartModel extends BaseModel
{


    public function __construct()
    {
        parent::__construct();
    }

    function getCategories()
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

    function getPickupPoints()
    {
        require_once "pickupPoint.php";
        $stmt = $this->db->query("SELECT `pickupPointID`, `title`, `address` FROM `pickuppoints`");
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $stmt->execute();
        $data = $stmt->fetchAll();

        $points = array();
        foreach ($data as $item) {

            $points[] = new PickupPoint($item[0], $item[1], $item[2]);
        }
        return $points;
    }

    function ConfirmOrder()
    {

        if (isset($_POST['products']) && isset($_POST['orderDetails'])) {
            // TO DO: брать из сессии
            $clientId = Session::get('user');
            $totalSum = 0;
            $products = json_decode($_POST['products']);

            foreach ($products as $product) {
                $totalSum += floatval($product->price) * floatval($product->count);
            }

            $pointId = $_POST['orderDetails'][0]['value'];
            // $cardId = $_POST['cardId'];
            if ($_POST['cardId'] != 0)
                $cardId = $_POST['cardId'];
            else $cardId = NULL;

            //insert into orders
            $stmt = $this->db->prepare("INSERT INTO `orders`( `clientID`,`cardsID`, `sum`, `pickupPointID`) VALUES ( :clientID,:cardsID, :totalSum, :pickupPointID)");
            $stmt->setFetchMode(PDO::FETCH_NUM);
            $stmt->execute(array(
                ':clientID' =>  $clientId,
                ':cardsID' =>  $cardId,
                ':totalSum' =>   $totalSum,
                ':pickupPointID' => $pointId
            ));
            $orderId = $this->db->lastInsertId();
            // echo $orderId;
            if (!$orderId) {
                echo json_encode(['status' => 'error', 'error' => $this->db->errorInfo()[2]]);
                return false;
            }
            // var_dump($products);
            //insert into orders_products
            foreach ($products as $product) {
                $stmt = $this->db->prepare('INSERT INTO `orders_products`(`orderID`, `productId`, `productCount`) VALUES (:orderID,:productId,:productCount)');
                $stmt->setFetchMode(PDO::FETCH_NUM);
                $stmt->execute(array(
                    ':orderID' => $orderId,
                    ':productId' =>  $product->productId,
                    ':productCount' => $product->count
                ));
            }

            //get responce 
            if ($stmt->rowCount() > 0) {
                echo json_encode(['status' => 'success', 'orderId' => $orderId]);
            } else {
                echo json_encode(['status' => 'error', 'error' => $this->db->errorInfo()[2]]);
            }
        } else
            echo json_encode(['status' => 'error', 'error' => 'AJAX error']);
    }
    public function checkPromocode($promocode)
    {


        $stmt = $this->db->prepare("SELECT `Id`, `code` FROM `cards` WHERE `code` = :code");
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $stmt->execute(array(
            ':code' => md5($promocode)
        ));
        $data = $stmt->fetchAll();

        if (count($data) > 0) {
            $this->cardId = $data[0][0];
            echo json_encode(['status' => 'success', 'id' => $this->cardId]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
    public function confirm()
    {
        echo $this->cardId;
    }
}
