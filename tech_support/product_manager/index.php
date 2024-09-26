
<?php
require('../model/database.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_products';
    }
}

if ($action == 'list_products') {
    // Product list display section
    $products = get_products();
    include('product_list.php');

} elseif ($action == 'delete_product') {
    // Product removal section
    $product_code = filter_input(INPUT_POST, 'product_code');
    if ($product_code == null || $product_code == false) {
        $error = "Invalid product code.";
        include('../errors/error.php');
    } else {
        delete_product($product_code);
        header("Location: .");
    }

} elseif ($action == 'show_add_form') {
    // The display section of the add product form
    include('product_add.php');

} elseif ($action == 'add_product') {
    // Add product section
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $version = filter_input(INPUT_POST, 'version');
    $release_date = filter_input(INPUT_POST, 'release_date');

    if ($code == null || $name == null || $version == null || $release_date == null ||
        $code == false || $name == false || $version == false || $release_date == false) {
        $error = "All fields are required.";
        include('../errors/error.php');
    } else {
        add_product($code, $name, $version, $release_date);
        header("Location: .");
    }

} else {
    include('../under_construction.php');
}
?>
