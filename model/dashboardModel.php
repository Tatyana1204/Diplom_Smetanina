<?php
class DashboardModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
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
    public function getProducts()
    {
        require_once "products.php";
        $stmt = $this->db->query("SELECT `productID`, `categoryID`, `img`, `title`, `description`, `ML`, `price`, `sale` FROM `products` ORDER BY  `categoryID`,`title` ");
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $stmt->execute();
        $data = $stmt->fetchAll();

        $products = array();
        foreach ($data as $item) {

            $products[] = new Products($item[0], $item[1], $item[2], $item[3], $item[4], $item[5], $item[6], $item[7]);
        }
        return $products;
    }

    // ПРОДУКТЫ
    public function UpdateProduct()
    {
        $file = $_FILES["userfile"];
        // var_dump($file);


        if (!(
            ($file['type'] == 'image/gif')
            || ($file['type'] == 'image/png')
            || ($file['type'] == 'image/jpeg')
            // || ($file['type'] == 'image/jpg')
        )) {
            echo json_encode(['status' => 'error', 'error' => 'invalid format']);
            return false;
        }

        if ($file["size"] < 0) {

            echo json_encode(['status' => 'error', 'error' => 'File size is too big']);
            return false;
        }
        if ($file["error"] < 0) {
            echo json_encode(['status' => 'error', 'error' => 'File has errors']);
            return false;
        }
        $name = $file['name'];
        $path = ImagePath . '/'. $name;

        if (!move_uploaded_file($_FILES["userfile"]['tmp_name'], $path)) {
            echo json_encode(['status' => 'error', 'error' => 'server error']);
            return false;
        }
        
        $imageSrc = "/public/images/". $name;

        $stmt = $this->db->prepare("UPDATE `products` SET 
        `title`= :title,
        `img`= :img,
        `price`= :price, 
        `description` = :description ,
        `ML` = :ML,
        `sale` =  :sale,
        `categoryId`= :categoryId 
        WHERE `productId` = :productId");
        $stmt->execute(array(
            ':title' => $_POST['title'],
            ':img' =>  $imageSrc,
            ':price' =>  $_POST['price'],
            ':description' => $_POST['description'],
            ':ML' => $_POST['ML'],
            ':sale' => $_POST['sale'],
            ':categoryId' => $_POST['category'],
            ':productId' => $_POST['id']
        ));

        //`categoryID`, `img`, `title`, `description`, `ML`, `price`, `sale`

        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function AddProduct()
    {

        $file = $_FILES["userfile"];
        


        if (!(
            ($file['type'] == 'image/gif')
            || ($file['type'] == 'image/png')
            || ($file['type'] == 'image/jpeg')
            // || ($file['type'] == 'image/jpg')
        )) {
            echo json_encode(['status' => 'error', 'error' => 'invalid format']);
            return false;
        }

        if ($file["size"] < 0) {

            echo json_encode(['status' => 'error', 'error' => 'File size is too big']);
            return false;
        }
        if ($file["error"] < 0) {
            echo json_encode(['status' => 'error', 'error' => 'File has errors']);
            return false;
        }
        $name = $file['name'];
        $path = ImagePath . '/'. $name;

        if (!move_uploaded_file($_FILES["userfile"]['tmp_name'], $path)) {
            echo json_encode(['status' => 'error', 'error' => 'server error']);
            return false;
        }

        $imageSrc = "/public/images/". $name;
        //изменение в бд
        $stmt = $this->db->prepare("INSERT INTO `products`( `categoryID`, `img`, `title`, `description`, `ML`, `price`, `sale`) VALUES (:categoryId, :img, :title, :description, :ml, :price, :sale)");
        $stmt->execute(array(
            ':title' => $_POST['title'],
            ':categoryId' => $_POST['category'],
            ':ml' => $_POST['ml'],
            ':price' => $_POST['price'],
            ':sale' => $_POST['sale'],
            ':description' => $_POST['description'],
            ':img' =>  $imageSrc
        ));


        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    
    public function DeleteProduct()
    {
        $stmt = $this->db->prepare("DELETE FROM `products` WHERE  `productID` = :productId");
        $stmt->execute(array(
            ':productId' => $_POST['id']
        ));

        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    // КАТЕГОРИИ
    public function UpdateCategory()
    {
        $file = $_FILES["userfile"];
       
        if (!(
            ($file['type'] == 'image/gif')
            || ($file['type'] == 'image/png')
            || ($file['type'] == 'image/jpeg')
             || ($file['type'] == 'image/jpg')
        )) {
            echo json_encode(['status' => 'error', 'error' => 'invalid format']);
            return false;
        }

        if ($file["size"] < 0) {

            echo json_encode(['status' => 'error', 'error' => 'File size is too big']);
            return false;
        }
        if ($file["error"] < 0) {
            echo json_encode(['status' => 'error', 'error' => 'File has errors']);
            return false;
        }
       
        $name = $file['name'];
        $path = ImagePath . '/'. $name;

        if (!move_uploaded_file($_FILES["userfile"]['tmp_name'], $path)) {
            echo json_encode(['status' => 'error', 'error' => 'server error']);
            return false;
        }
        // путь до изображения который сохраняется в бд
        $imageSrc = "/public/images/". $name;
     
        //сохранить в бд 
        $stmt = $this->db->prepare("UPDATE `categories` SET `category`= :title ,`description`= :description,`img` = :img WHERE `id`= :categoryId");
        $stmt->execute(array(
            ':title' => $_POST['title'],
            ':description' => $_POST['description'],
            ':img' => $imageSrc,
            ':categoryId' => $_POST['id']
        ));


        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'success', 'img' => $imageSrc, 'title' => $_POST['title'], 'decs' =>$_POST['description']]);
        } else {
            echo json_encode(['status' => 'error', 'id' => $_POST['id'] ]);
        }
    }

    public function AddCategory()
    {
        $file = $_FILES["userfile"];
       
        //сохранение изображения в папке 
        if (!(
            ($file['type'] == 'image/gif')
            || ($file['type'] == 'image/png')
            || ($file['type'] == 'image/jpeg')
             || ($file['type'] == 'image/jpg')
        )) {
            echo json_encode(['status' => 'error', 'error' => 'invalid format']);
            return false;
        }

        if ($file["size"] < 0) {

            echo json_encode(['status' => 'error', 'error' => 'File size is too big']);
            return false;
        }
        if ($file["error"] < 0) {
            echo json_encode(['status' => 'error', 'error' => 'File has errors']);
            return false;
        }
        $name = $file['name'];
        $path = ImagePath . '/'. $name;

        if (!move_uploaded_file($_FILES["userfile"]['tmp_name'], $path)) {
            echo json_encode(['status' => 'error', 'error' => 'server error']);
            return false;
        }
      // путь до изображения который сохраняется в бд
        $imageSrc = "/public/images/". $name;
       
        $stmt = $this->db->prepare("INSERT INTO `categories`(`category`, `description`, `img`) VALUES (:category, :description, :img)");
        $stmt->execute(array(
            ':category' => $_POST['title'],
            ':description' => $_POST['description'],
            ':img' =>  $imageSrc,

        ));


        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'success' ]);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
    public function DeleteCategory()
    {
        //получаем все товары категории, которую собираемся удалить
        $stmt = $this->db->prepare("SELECT * FROM `products` WHERE `categoryID`= :categoryId");
        $stmt->execute(array(
            ':categoryId' => $_POST['id']
        ));
        // если у этой категории есть товары, то не удаляем
        //т.е мы не можем удалить категории с товарами
        if ($stmt->rowCount() == 0) {
            $stmt = $this->db->prepare("DELETE FROM `categories` WHERE `id` = :categoryId");
            $stmt->execute(array(
                ':categoryId' => $_POST['id']
            ));
            if ($stmt->rowCount() > 0) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error']);
            }
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    //Карты
    function getCards(){
        require 'cards.php';
        $stmt = $this->db->query('SELECT `Id`, `title`, `img`, `description`, `price`, `code` FROM `cards` ');
        $stmt->setFetchMode(PDO::FETCH_NUM);

        $stmt->execute();
        $data = $stmt->fetchAll();

        $cards = array();
        foreach ($data as $item) {

            $cards[] = new Cards($item[0], $item[1], $item[2], $item[3],$item[4], $item[5]);
        }
        return $cards;
    }
    public function UpdateCard(){
        
        echo json_encode(['status' => 'success',]);
    }

    public function AddCard(){
       
        echo json_encode(['status' => 'success',]);
    }
    public function DeleteCard(){
      
        echo json_encode(['status' => 'success',]);
    }

}
