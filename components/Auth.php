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
        if($this->check()){
            return $_SESSION['user'];
        }
    }

    public function ban($table, $data)
    {

       $this->db->update($table, $data);
    }

    public function unban($table, $data)
    {
        $this->db->update($table, $data);
    }

    public function remove($table, $id)
    {
        $this->db->remove($table, $id);
    }

    public function getUserStatus($table, $id)
    {
        $banned = $this->db->getOne($table, $id);
        if($banned['banned'] <= '0')
        {
            echo 'isNormal';
            return true;
        }else{
            echo 'isBan';
            return false;
        }
    }

    public function isBan($table, $id)
    {
        if(!$this->getUserStatus($table, $id)){
            return true;
        }
        return  false;
    }

    public function isNormal($table, $id)
    {
       if(!$this->isBan($table, $id)) {
           return true;
       }
        return  false;
    }

    // ban()
    //unban()
    //remove()
    //getUserStatus() banned, normal
    //isBan() true
    //isNormal() false
    //uploadAvatar()

    //ImageManager
        //upload($image)
        //delete($path)
}