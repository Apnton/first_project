<?php

class Auth
{
    public $db;

    public function __construct(QueryBuilder $db)
    {
        $this->db = $db;
    }

    public function register($table, $data)
    {
       if(!$this->login($table, $data)) {
           $this->db->store($table, $data);
           echo 'Вы успешно зарегистрировались!';
           return true;
       }else {
           echo 'Такой пользователь уже существует';
           return false;
       }



    }

    public function login($table, $data)
    {
        if($this->db->getUser($table, $data))
        {
            $_SESSION['user'] = $this->db->getUser($table, $data);
            return true;
        }else{
            return false;
        }
    }

    public function logout()
    {
     unset($_SESSION['user']);
    }

    public function check()
    {
        if(isset($_SESSION['user']))
        {
            return true;
        }
        return false;
    }

    public function currentUser()
    {
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
    }


}