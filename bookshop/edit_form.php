<?php
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
<body >
    <h1 class="center"> Book Shop</h1>
    <h3 class="center">Edit Book Information</h3>
    <?php
        $books = fetch_data_from_database();
        $index = intval($_POST["index"]);
        $book = $books[$index];
    ?>

    
    <form class="equal" action="controller.php" method="POST">
        <input type="hidden" name="operation" value="edit">
        <input type="hidden" name="index" value="<?php echo $index; ?>">
        <?php  echo "Book title : ";?>
        <input type="text"  placeholder="Book Title" name="title" required value="<?php echo $book['title'] ?>"><br><br>
        <?php  echo "Author : ";?>
        <input type="text"  placeholder="Author" name="author" required value="<?php echo $book['author'] ?>"><br><br>
        <?php  echo "Pages : ";?>
        <input type="text"  placeholder="Pages" name="pages" required value="<?php echo $book['pages'] ?>"><br><br>
        <?php  echo "ISBN : ";?>
        <input type="text"  placeholder="ISBN" name="isbn" required value="<?php echo $book['isbn'] ?>"><br><br>
        <?php  echo "Availability : ";?>
        <select  required name="available">
            <option value="Status" hidden>Status</option>
            <option value="Available" <?php echo ($book['available']?"selected":"") ?>>Available</option>
            <option value="Not Available" <?php echo ($book['available']?"":"selected") ?>>Not Available</option>
        </select>
        <br><br>
        <button  type="submit" >Save</button>
    </form>

</body>
</html>