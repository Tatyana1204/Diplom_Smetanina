<?php
class LoginModel  extends BaseModel
{
    function getLog()
    {
        $stmt = $this->db->prepare("SELECT userID, `role` FROM users WHERE login = :login AND password = :password");
        $stmt->execute(array(
            ':login' => $_POST['login'],
            ':password' => md5($_POST['password'])
        ));

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $count = $stmt->rowCount();
        if ($count > 0) {
            Session::init();

            Session::set('loggedIn', true);
            Session::set('user', $user['userID']);
            Session::set('role', $user['role']);


            header('location: ' . URL . '/dashboard/products');
        } else {
            // Session::set('loggedIn', false);

            //Здесь изменяем путь с '/login' на '/login/failed'
            header('location: ' . URL . '/login/failed');
        }
    }

    function  Register($userName,$userLastName, $userTel, $userEmail,$userPass){

        $stmtUser = $this->db->prepare("INSERT INTO `users`(`login`, `password`, `role`) VALUES (:userlogin, :userpassword, :userrole)");
        $stmtUser->execute(array(
            ':userlogin' => $userEmail,
            ':userpassword' => md5($userPass),
            ':userrole' => "user"
        ));

        $clientId = $this->db->lastInsertId();

        if ($clientId >= 1){
            $stmtClient = $this->db->prepare("INSERT INTO `clients`(`clientID`, `name`, `lastname`, `phone`, `tarif`) VALUES (:clientID, :userName, :lastname, :phone, :tarif)");
            $stmtClient->execute(array(
                ':clientID' => $clientId,
                ':userName' => $userName,
                ':lastname' => $userLastName,
                ':phone' => $userTel,
                ':tarif' => "10%"
            ));
           
            if ($stmtClient->rowCount() > 0) {
               return true;
            } else {
                return false;
            }
        }
        else{
            return false;
        }
        
    }
}
