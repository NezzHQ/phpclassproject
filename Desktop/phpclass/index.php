<!DOCTYPE HTML>

<?php

include_once('includes/connection.php');
include_once('includes/article.php');

$article = new article;
$articles = $article->fetch_all();




?>

<html>
    <head>
        <title>PHP Project</title>
        <link rel="stylesheet" href="assets/style.css" />
    </head>

    <body>
    
        <div class="container">
            <a href="index.php" id="logo">CMS</a>
            
            
            
            <ol>
                <?php foreach ($articles as $article) { ?>
                <li>
                    <a href="article.php?id=<?php echo $articles['article_id']; 
                             ?>
                    <?php echo $article['article_title']; ?>
                    </a> 
                    - <small>
                             posted <?php echo date('l js' $article['article_timestamp']); ?>
                                                    
                        </small>
                </li>
                <?php } ?>
            
            
            
            
            </ol>
        
        <br />
                            
        <small><a href="admin">admin</a></small>
        
        </div>
    </body>

</html>