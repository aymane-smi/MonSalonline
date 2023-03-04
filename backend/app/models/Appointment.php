<?php
class Appointment
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    /**
     * add appointment of the client by given the date and hour
     * @param mixed $id_client
     * @param mixed $date
     * @param mixed $hour
     * @return void
     */
    public function add($id_client, $date, $hour)
    {
        $this->db->query("INSERT INTO appointment(id_client, date, hour) VALUE(:id_client, :date, :hour)");
        $this->db->bind(":id_client", $id_client);
        $this->db->bind(":date", $date);
        $this->db->bind(":hour", $hour);
        $this->db->execute();
    }

    /**
     * delete appointment by id
     * @param mixed $id
     * @return void
     */
    public function deleteById($id, $date, $hour)
    {
        $this->db->query("DELETE FROM appointment WHERE id_client = :id AND date = :date AND hour = :hour");
        $this->db->bind(":id", $id);
        $this->db->bind(":date", $date);
        $this->db->bind(":hour", $hour);
        $this->db->execute();
    }

    /**
     * edit Appointment by giving the id of the the appointment and the new date and hour
     * @param mixed $id
     * @param mixed $date
     * @param mixed $hour
     * @return void
     */
    public function edit($id, $date, $hour)
    {
        $this->db->query("UPDATE appointment SET date = :date, hour = :hour WHERE id = :id");
        $this->db->bind(":date", $date);
        $this->db->bind(":hour", $hour);
        $this->db->bind(":id", $id);
        $this->db->execute();
    }

    /**
     * get all appointment of a client
     * @param mixed $id
     * @return array
     */
    public function all($id)
    {
        $this->db->query("SELECT * FROM appointment WHERE id_client = :id");
        $this->db->bind(":id", $id);
        return $this->db->resultSet();
    }

    public function getByDate($month, $year, $day)
    {

        $this->db->query("SELECT * FROM appointment WHERE MONTH(date) = :month AND YEAR(date) = :year AND DAY(date) = :day");
        $this->db->bind(":month", $month);
        $this->db->bind(":year", $year);
        $this->db->bind(":day", $day);
        return $this->db->resultSet();
    }

    public function countByDate($date)
    {
        $this->db->query("SELECT COUNT(*) as count FROM appointment WHERE date = :date");
        $this->db->bind(":date", $date);
        return $this->db->single();
    }
}
