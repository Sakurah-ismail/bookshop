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
    <h3 class="center">Books Lists</h3>
    <?php
        
        $books = fetch_data_from_database();

    ?>
<table>
        <thead>
            <th>Title</th>
            <th>Author</th>
            <th>Pages</th>
            <th>ISBN</th>
            <th>Status</th>
            <th>Operations</th>
        </thead>
        <tbody>
            <?php $idx = 0 ?>
            <?php foreach($books as $book): ?>
                <tr>
                    <td> <?php echo $book['title']; ?> </td>
                    <td> <?php echo $book['author']; ?> </td>
                    <td> <?php echo $book['pages']; ?> </td>
                    <td> <?php echo $book['isbn']; ?> </td>
                    <td> <?php echo ($book['available'] ? 'Available' : 'Not Available'); ?> </td>
                    <td> 
                        <div>
                            <form  action="edit_form.php" method="POST">
                            <input type="hidden" name="operation" value="edit-request">
                            <input type="hidden" name="index" value="<?php echo $idx; ?>">
                            <button type="submit" >Edit</button>
                        </form>

                        <form  action="controller.php" method="POST">
                            <input type="hidden" name="operation" value="delete">
                            <input type="hidden" name="index" value="<?php echo $idx; ?>">
                            <button type="submit" >Delete</button>
                        </form>
                        </div>
                    </td>
                </tr>
                <?php $idx++; ?>
            <?php endforeach; ?>
        </tbody>
        

        
    </table>
    <form class="center" class="w-full flex" action="add_new.php" method="POST">
      <input type="hidden" name="operation" value="add-request">
        <button type="submit" >Add New Book</button>
    </form>