<?php
class IndexModel extends BaseModel
{
    public function __construct(){
        parent::__construct();
    }

    function getCategories(){
        require_once "category.php";
        $stmt = $this->db->query("SELECT `id`, `category`,`description`,`img` FROM `categories`");
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $stmt->execute();
        $data = $stmt->fetchAll();

        $categories = array();
        foreach($data as $item){
           
            $categories[] = new Category($item[0],$item[1],$item[2],$item[3]);
        }
        return $categories;
       
    }
}