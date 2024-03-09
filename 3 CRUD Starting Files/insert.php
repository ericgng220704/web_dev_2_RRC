<?php
    require('db_connect.php');
    
    if ($_POST && !empty($_POST['author']) && !empty($_POST['content'])) {
        //  Sanitize user input to escape HTML entities and filter out dangerous characters.
        $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        //  Build the parameterized SQL query and bind to the above sanitized values.

        
        //  Bind values to the parameters

        
        //  Execute the INSERT.
        //  execute() will check for possible SQL injection and remove if necessary


    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>PDO Insert</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    <?php include('nav.php'); ?>
    <form method="post" action="insert.php">
        <label for="author">Author</label>
        <input id="author" name="author">
        <label for="content">Content</label>
        <input id="content" name="content">
        <input type="submit">
    </form>
</body>
</html>