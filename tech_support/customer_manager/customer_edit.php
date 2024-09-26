<?php include '../view/header.php'; ?>
<main>
    <h2>View/Update Customer</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="update_customer">
        <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer['customerID']); ?>">

        <label>First Name:</label>
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($customer['firstName']); ?>"><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($customer['lastName']); ?>"><br>

        <label>Address:</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($customer['address']); ?>"><br>

        <label>City:</label>
        <input type="text" name="city" value="<?php echo htmlspecialchars($customer['city']); ?>"><br>

        <label>State:</label>
        <input type="text" name="state" value="<?php echo htmlspecialchars($customer['state']); ?>"><br>

        <label>Postal Code:</label>
        <input type="text" name="postal_code" value="<?php echo htmlspecialchars($customer['postalCode']); ?>"><br>

        <label>Country Code:</label>
        <input type="text" name="country_code" value="<?php echo htmlspecialchars($customer['countryCode']); ?>"><br>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($customer['phone']); ?>"><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>"><br>

        <label>Password:</label>
        <input type="text" name="password" value="<?php echo htmlspecialchars($customer['password']); ?>"><br>

        <input type="submit" value="Update Customer">
    </form>
    <p>
        <a href=".?action=search_customers">Search Customers</a>
    </p>
    <p><a href="../index.php">Home</a></p>
</main>
<?php include '../view/footer.php'; ?>
