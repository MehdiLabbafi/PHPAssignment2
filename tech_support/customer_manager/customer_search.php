<?php include '../view/header.php'; ?>
<main>
    <h2>Search Customers</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="display_customers">

        <label>Last Name:</label>
        <input type="text" name="last_name">
        <input type="submit" value="Search">
    </form>
    <p><a href="../index.php">Home</a></p>
</main>
<?php include '../view/footer.php'; ?>
