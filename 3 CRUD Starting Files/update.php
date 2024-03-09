<?php
    require('db_connect.php');
    
    // UPDATE quote if author, content and id are present in POST.
    if ($_POST && isset($_POST['author']) && isset($_POST['content']) && isset($_POST['id'])) {
        // Sanitize user input to escape HTML entities and filter out dangerous characters.
        $author  = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id      = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        // Build the parameterized SQL query and bind to the above sanitized values.
        $query     = "UPDATE quotes SET author = :author, content = :content WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':author', $author);        
        $statement->bindValue(':content', $content);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
        // Execute the INSERT.
        $statement->execute();
        
        // Redirect after update.
        header("Location: update.php?id={$id}");
        exit;
    } else if (isset($_GET['id'])) { // Retrieve quote to be edited, if id GET parameter is in URL.
        // Sanitize the id. Like above but this time from INPUT_GET.
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        // Build the parametrized SQL query using the filtered id.
        $query = "SELECT * FROM quotes WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
        // Execute the SELECT and fetch the single row returned.
        $statement->execute();
        $quote = $statement->fetch();
    } else {
        $id = false; // False if we are not UPDATING or SELECTING.
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>PDO Update</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    <?php include('nav.php'); ?>
    <?php if ($id): ?>
        <form method="post">
            <!-- Hidden input for the quote primary key. -->
            <input type="hidden" name="id" value="<?= $quote['id'] ?>">
            
            <!-- Quote author and content are echoed into the input value attributes. -->
            <label for="author">Author</label>
            <input id="author" name="author" value="<?= $quote['author'] ?>">
            <label for="content">Content</label>
            <input id="content" name="content" value="<?= $quote['content'] ?>">
            
            <input type="submit">
        </form>
    <?php else: ?>
        <p>No quote selected. <a href="?id=1">Try this link</a>.</p>
    <?php endif ?>
</body>
</html>

