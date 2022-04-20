<?php
require_once "model/Database.php";

class Products {
    public function readProducts($limit, $offset) {
        $sql = "SELECT * FROM products INNER JOIN product_subtypes ON products.product_subtype = product_subtypes.subtype_code INNER JOIN product_types ON product_subtypes.type_code = product_types.type_code";
        var_dump((new DataHandler(DB_HOST, DB_NAME, DB_USER, DB_PASS))->get($sql, []));
    }
}