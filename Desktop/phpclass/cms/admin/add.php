<?php

session_start();
include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
    if (isset($_POST['title'], $_POST['content'])) {
        $title = $_POST['title'];
        $conten = nl2br ($_POST['content']);
        
        if (empty($title) or empty($content)) {
            $erro= 'All fields are required!';
        } else {
            $query = $pdo->prepare('INSERT INTO articles (article_title, article_content, article_timestamp) VALUES (?, ?)');
            
            $query->bindValue(1, $title);
            $query->bindValue(2, $content);
            $query->bindValue(3, time());
            
            $query->execute();
            header('Location: index.php');
        }
    }
    ?>

<html>
    <head>
        <title>PHP Project</title>
        <link rel="stylesheet" href="../assets/style.css" />
    </head>

    <body>
    
        <div class="container">
            <a href="index.php" id="logo">CMS</a>
            
            <br />
            
           <h4>Add Article</h4>
            
            <form action="add.php" method="post" autocomplete="off">
                <input type="text" name="title" placeholder="title" /><br /><br />
                <textarea rows="15" cols="50" placeholder="Content" name="content"></textarea><br />
                                                                                                        
                <input type="submit" value="Add Article" />                                                                                       
            
            
            </form>
            
      
        
        <br />
                            
        
        
        </div>
    </body>

</html>


    <?php
} else{
    header('Location: index.php');
}



?>