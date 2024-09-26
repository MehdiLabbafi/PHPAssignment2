<?php
function get_products() {
    global $db;
    $query = 'SELECT * FROM products ORDER BY productCode';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $products;
}

function delete_product($product_code) {
    global $db;
    $query = 'DELETE FROM products WHERE productCode = :product_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_code', $product_code);
    $statement->execute();
    $statement->closeCursor();
}


function add_product($code, $name, $version, $release_date) {
    global $db;
    $query = 'INSERT INTO products
                 (productCode, name, version, releaseDate)
              VALUES
                 (:code, :name, :version, :release_date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':release_date', $release_date);
    $statement->execute();
    $statement->closeCursor();
}
?>
