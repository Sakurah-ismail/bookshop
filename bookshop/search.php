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
<body >
    <h1 class="center">Book Shop</h1>
    <h3 class="center">Search Book</h3>
    <?php
        
        $searched_books = fetch_data_from_database();
       
    ?>
    <form class="equal"  method="POST">
        

        <?php  echo "Book title : ";?>
        <input type="text"  placeholder="Book Title" name="title"  ?><br><br>
        <?php  echo "Author : ";?>
        <input type="text"  placeholder="Author" name="author"  ?><br><br>
        <?php  echo "ISBN : ";?>
        <input type="text"  placeholder="ISBN" name="isbn"  ?><br><br>
        
        <button  type="submit" >Search</button>
    </form>
    <form class="equal" action="index.php" method="POST">
        <button  type="submit" >Back</button>
    </form>
    
    <?php 
    if(!empty($_POST["title"]))
        foreach($searched_books as $book => $val)
            if($_POST["title"] != $val["title"]) 
                unset($searched_books[$book]);    
    ?>
    <?php 
    if(!empty($_POST["author"]))
        foreach($searched_books as $book => $val)
            if($_POST["author"] != $val["author"]) 
                unset($searched_books[$book]);    
    ?>
    <?php 
    if(!empty($_POST["isbn"]))
        foreach($searched_books as $book => $val)
            if($_POST["isbn"] != $val["isbn"]) 
                unset($searched_books[$book]);    
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
            <?php foreach($searched_books as $book): ?>
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
   

</body>
</html>