<?php
//наследуется от базового класса pdo(отвечает за подключение БД)
class Database extends PDO{

    public function __construct(){
        //DBNAME,DBUSER,DBPASS - константы, которые хранятся в config/db
        parent::__construct(DBTYPE.':host='.DBHOST.';dbname='.DBNAME.';charset=UTF8',DBUSER,DBPASS);
    }
    
}