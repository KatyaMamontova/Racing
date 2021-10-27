<?php
class Users
{
    function __construct($db)
    {
        $this->db = $db;
    }

    public function login($login, $password)
    {
        $user = $this->db->getUser($login);
        if ($user) {
            if ($password == $user->password) {
                return array(
                    'name' => $user->name,
                    'token' => md5(rand())
                );
            }
        }
    }

    public function signup($name, $login, $password)
    {
        $this->db->addUser($name, $login, $password);
    }

    public function logout($token)
    {
        /* return */
    }



    /* public function login($login, $password)
    {

        $hashSum = md5($login . $password);
        $sumWithRndNum = md5($hashSum . rand());

        $dbSum = $sumWithRndNum;                    //это пока - для проверки
        //$name = 'Katya';                          //и это тоже

        if ($sumWithRndNum === $dbSum) {            //потом здесь будет алгоритм для поиска соответствующей строки в базе данных

            return array(
                $name = 'Katya'
            );                                      //просто я хз, как она будет устроена
        } else {
            return new Error();
        }
    }

    public function logout($login, $password)       //...в чем смысл этой штуки?..
    {
        $login = null;
        $password = null;
    } */
}
