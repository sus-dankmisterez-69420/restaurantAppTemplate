<?php
require_once "model/Database.php";
class Reservations {
    private $db;

    public function __construct()
    {
        $this->db = new DataHandler(DB_HOST, DB_NAME, DB_USER, DB_PASS);
    }

    public function getReservations($limit, $offset, $todayOnly = true): array {
        $sql = "SELECT * FROM reservations";
        $params = [];
        if ($todayOnly) {
            $sql .= " WHERE reservation_time BETWEEN ? AND ?";
            $today = new DateTime('today midnight');
            $tomorrow = new DateTime('tomorrow midnight');
            $params[] = [date_format($today, "Y-m-d H:i:s"), PDO::PARAM_STR];
            $params[] = [date_format($tomorrow, "Y-m-d H:i:s"), PDO::PARAM_STR];
        }

        $sql .= " LIMIT ? OFFSET ?";
        $params[] = [$limit, PDO::PARAM_INT];
        $params[] = [$offset, PDO::PARAM_INT];

        return $this->db->get($sql, $params);

    }

    public function getReservation($id) {
        $sql = "SELECT * FROM reservations WHERE id = ?";
        $result = $this->db->get($sql, [[$id, PDO::PARAM_INT]]);
        return $result[0];
    }

    public function createReservation($name, $time, $email, $phone, $adults, $kids, $table) {
        $sql = "INSERT INTO reservations (reservation_name, reservation_time, reservation_e_mail, reservation_phone_number, reservation_adults, reservation_kids, reservation_table)".
        "VALUES (?,?,?,?,?,?,?)";
        $params = [];
        $params[] = [$name, PDO::PARAM_STR];
        $params[] = [$time, PDO::PARAM_STR];
        $params[] = [$email, PDO::PARAM_STR];
        $params[] = [$phone, PDO::PARAM_STR];
        $params[] = [$adults, PDO::PARAM_INT];
        $params[] = [$kids, PDO::PARAM_INT];
        $params[] = [$table, PDO::PARAM_INT];
        $this->db->set($sql, $params);
    }

    public function updateReservation($id, $name, $time, $email, $phone, $adults, $kids, $table) {
        $sql = "UPDATE reservations SET reservation_name = ?, reservation_time = ?, reservation_e_mail = ?, reservation_phone_number = ?, reservation_adults = ?, reservation_kids = ?, reservation_table = ? WHERE id = ?";
        $params = [];
        $params[] = [$name, PDO::PARAM_STR];
        $params[] = [$time, PDO::PARAM_STR];
        $params[] = [$email, PDO::PARAM_STR];
        $params[] = [$phone, PDO::PARAM_STR];
        $params[] = [$adults, PDO::PARAM_INT];
        $params[] = [$kids, PDO::PARAM_INT];
        $params[] = [$table, PDO::PARAM_INT];
        $params[] = [$id, PDO::PARAM_INT];
        var_dump($sql, $params);
        $this->db->set($sql, $params);
    }

}