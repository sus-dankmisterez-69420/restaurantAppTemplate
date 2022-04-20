<?php $title = "Reservations";
?>
<?php require "view/layout/header.php"; ?>

<form action="<?= APP_ROOT?>Reservations/<?=isset($reservation) ? "update/".$reservation['id'] : "create"?>" method="POST">

    <input value="<?=$reservation["reservation_name"]?>" name="name" type="text" placeholder="Reservation name">
    <input name="date" type="date">
    <input name="time" type="datetime-local">
    <input name="email" type="email" placeholder="e-mail">
    <input name="phone" type="tel" placeholder="phone">
    <input name="adults" type="number" placeholder="adults" min="0">
    <input name="kids" type="number" placeholder="kids" min="0">
    <input name="table" type="number" placeholder="table" min="0">
    <input type="submit">
</form>

