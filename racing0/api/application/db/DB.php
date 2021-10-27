<?php
class DB
{
    function __construct()
    {
        /*****все проверить*****/
        $host = 'localhost';
        $port = '3306';
        $name = 'racing';
        $user = 'root';
        $password = '';
        /*****все проверить*****/

        try {
            $this->db = new PDO(
                'mysql:' .
                    'host=' . $host . ';' .
                    'port=' . $port . ';' .
                    'dbname=' . $name,
                $user,
                $password
            );
        } catch (Exception $e) {
            print_r($e->getMessage());
            die();
        }
    }

    function __destruct()
    {
        $this->db = null;
    }

    public function getUser($login)
    {
        $query = 'SELECT * FROM users WHERE login = "' . $login . '"';
        return $this->db->query($query)->fetchObject();
    }

    public function getUsers()
    {
        $query = 'SELECT * FROM users';
        $stmt = $this->db->query($query);
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            $result[] = $row;
        }
        return $result;
    }

    public function addUser($name, $login, $password)
    {
        $query1 = "INSERT INTO `users` (`id`, `name`, `login`, `password`, `token`) VALUES (NULL, '" . $name . "', '" . $login . "', '" . $password . "', NULL)";
        $this->db->query($query1);
    }
}
