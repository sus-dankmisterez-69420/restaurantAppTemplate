<?php
require_once "model/Products.php";

class ProductsController {
    public function read() {
        (new Products())->readProducts(100, 0, true);
    }
}