
<?php
    // include the function
    include_once './functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/src/style.css">
    <title>BookShop</title>
</head>
<body class="bg-indigo-100">
    <h1 class="center">Book Shop</h1>
    <h3 class="center">Add New Books</h3>
    <?php
        $books = fetch_data_from_database();

    ?>

    <!-- displaying books in a table -->
    <form class="center" action="controller.php" method="POST">
        <input type="hidden" name="operation" value="add">
        <input type="text"  placeholder="Book Title" name="title" required><br><br>
        <input type="text"  placeholder="Author" name="author" required><br><br>
        <input type="text"  placeholder="Pages" name="pages" required><br><br>
        <input type="text"  placeholder="ISBN" name="isbn" required><br><br>
        <select  required>
            <option value="Status" hidden >Status</option>
            <option value="Available">Available</option>
            <option value="Not Available">Not Available</option>
        </select><br><br>
        <button type="submit" >Add This Book</button>
    </form>

</body>
</html>