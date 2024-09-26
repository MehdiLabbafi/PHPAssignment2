<?php
require('../model/database.php');
require('../model/customer_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'search_customers';
    }
}

if ($action == 'search_customers') {
    include('customer_search.php');

} elseif ($action == 'display_customers') {
    $last_name = filter_input(INPUT_POST, 'last_name');
    if ($last_name == NULL || $last_name == FALSE) {
        $error = "Please enter a last name.";
        include('../errors/error.php');
    } else {
        $customers = get_customers_by_last_name($last_name);
        include('customer_list.php');
    }

} elseif ($action == 'select_customer') {
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    if ($customer_id == NULL || $customer_id == FALSE) {
        $error = "Invalid customer ID.";
        include('../errors/error.php');
    } else {
        $customer = get_customer($customer_id);
        include('customer_edit.php');
    }

} elseif ($action == 'update_customer') {
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $postal_code = filter_input(INPUT_POST, 'postal_code');
    $country_code = filter_input(INPUT_POST, 'country_code');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');

    if ($customer_id == NULL || $customer_id == FALSE || $first_name == NULL || $last_name == NULL ||
        $address == NULL || $city == NULL || $state == NULL || $postal_code == NULL ||
        $country_code == NULL || $phone == NULL || $email == NULL || $password == NULL) {
        $error = "All fields are required.";
        include('../errors/error.php');
    } else {
        update_customer($customer_id, $first_name, $last_name, $address, $city, $state, $postal_code, $country_code, $phone, $email, $password);
        header("Location: .?action=search_customers");
    }

} else {
    $error = 'Unknown action: ' . $action;
    include('../errors/error.php');
}
?>
