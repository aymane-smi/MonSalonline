<?php
class Client
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    /**
     * add client by using his informations
     * Summary of addClient
     * @param mixed $fname
     * @param mixed $lname
     * @param mixed $email
     * @param mixed $phone
     * @param mixed $token
     * @return void
     */

    public function add($fname, $lname, $email, $phone, $token)
    {
        $this->db->query("INSERT INTO client(fname, lname, email, phone, token) VALUES(:fname, :lname, :email, :phone, :token)");
        $this->db->bind(":fname", $fname);
        $this->db->bind(":lname", $lname);
        $this->db->bind(":email", $email);
        $this->db->bind(":phone", $phone);
        $this->db->bind(":token", $token);
        $this->db->execute();
        return $this->db->lastId();
    }

    /**
     * edit client token by using his id
     * Summary of editToken
     * @param mixed $id
     * @param mixed $token
     * @return void
     */

    public function editToken($id, $token)
    {
        $this->db->query("UPDATE client SET token = :token WHERE id = :id");
        $this->db->bind(":token", $token);
        $this->db->bind(":id", $id);
        $this->db->execute();
    }

    public function edit($fname, $lname, $email, $phone, $token)
    {
        $this->db->query("UPDATE client SET fname = :fname, lname = :lname, email = :email, phone = :phone WHERE token = :token");
        $this->db->bind(":fname", $fname);
        $this->db->bind(":lname", $lname);
        $this->db->bind(":email", $email);
        $this->db->bind(":phone", $phone);
        $this->db->bind(":token", $token);
        $this->db->execute();
    }

    public function verifyToken($token)
    {
        $this->db->query("SELECT * FROM client WHERE token LIKE :token ");
        $this->db->bind(":token", $token);
        $this->db->execute();
        $row = $this->db->rowCount();
        if ($row)
            return true;
        else
            return false;
    }

    public function getClientByToken($token)
    {
        $this->db->query("SELECT * FROM client WHERE token = :token");
        $this->db->bind(":token", $token);
        return $this->db->single();
    }
}
