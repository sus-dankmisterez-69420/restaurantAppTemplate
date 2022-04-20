<?php
require_once "model/Reservations.php";

class ReservationsController {
    public function read($id = null) {
        if ($id == null) {
            (new Reservations())->getReservations(100, 0, true);
        } else {
            (new Reservations())->getReservation($id);
        }
        
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['name']) ? $_POST['name'] : die();
            $date = isset($_POST['date']) ? $_POST['date'] : die();
            $time = isset($_POST['time']) ? $_POST['time'] : die();
            $email = isset($_POST['email']) ? $_POST['email'] : die();
            $phone = isset($_POST['phone']) ? $_POST['phone'] : die();
            $adults = isset($_POST['adults']) ? $_POST['adults'] : die();
            $kids = isset($_POST['kids']) ? $_POST['kids'] : die();
            $table = isset($_POST['table']) ? $_POST['table'] : die();
            $time = str_replace('T', ' ', $time);
            (new Reservations())->createReservation($name, $time, $email, $phone, $adults, $kids, $table);
        } 
        else {
            require "view/reservations/form.php";
        }
    }
    public function update($u_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['name']) ? $_POST['name'] : die();
            $date = isset($_POST['date']) ? $_POST['date'] : die();
            $time = isset($_POST['time']) ? $_POST['time'] : die();
            $email = isset($_POST['email']) ? $_POST['email'] : die();
            $phone = isset($_POST['phone']) ? $_POST['phone'] : die();
            $adults = isset($_POST['adults']) ? $_POST['adults'] : die();
            $kids = isset($_POST['kids']) ? $_POST['kids'] : die();
            $table = isset($_POST['table']) ? $_POST['table'] : die();
            $time = str_replace('T', ' ', $time);
            (new Reservations())->updateReservation($u_id, $name, $time, $email, $phone, $adults, $kids, $table);
        } else {
            $reservation = (new Reservations())->getReservation($u_id);
            require "view/reservations/form.php";
        }
    }
}