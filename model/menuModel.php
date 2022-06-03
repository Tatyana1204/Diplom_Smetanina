<?php
class MenuModel extends BaseModel
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
    function getProducts($category)
    {
        require_once "products.php";
        $stmt = $this->db->query("SELECT `productID`, `categoryID`, `img`, `title`, `description`, `ML`, `price`, `sale` FROM `products` WHERE `categoryID` =" .  $category);
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $stmt->execute();
        $data = $stmt->fetchAll();

        $products = array();
        foreach ($data as $item) {

            $products[] = new Products($item[0], $item[1], $item[2], $item[3], $item[4], $item[5], $item[6], $item[7]);
        }
        return $products;
    }
    function getProd($productID)
    {
        require_once "products.php";
        $stmt = $this->db->query("SELECT `productID`, `categoryID`, `img`, `title`, `description`, `ML`, `price`, `sale` FROM `products` WHERE `productID` =" .  $productID);
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $stmt->execute();
        $data = $stmt->fetch();
        $prod = new Products($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7]);
        return $prod;
    }
    function getCards(){
        require_once "cards.php";
        $stmt = $this->db->query("SELECT `Id`, `title`, `img`, `description`, `price`, `code` FROM `cards`");
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $stmt->execute();
        $data = $stmt->fetchAll();

        $cards = array();
        foreach($data as $item){
           
            $cards[] = new Cards($item[0],$item[1],$item[2],$item[3],$item[4],$item[5]);
        }
        return $cards;
    }
    function getRegistration(){
            require_once "registration.php";
        }
}
