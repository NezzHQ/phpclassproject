<?php

session_start();
include_once('../includes/connection.php');
include_once('../includes/article.php');

$article = new Article;

if (issets($_SESSION['Logged_in'])) {
    
    if (issets($_GET['id'])) {
        $id = $GET['id'];
        $query = $pdo->prepare('DELETE FROM articles WHERE article_id = ?');
        $query->bindValue(1, $id);
        $query->execute();
        
        header('Location; delete.php');
    }
    
    $articles = $article->fetch_all();

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
            
            <h4>Select an Article to Delete:</h4>
            <form action="delete.php" method="get">

                <select onchange="this.form.submit();" name="id">
                    <?php foreach ($articles as $article) { ?>
                        <option value="<?php echo $article['article_id']; ?>"><?php echo $article['article_title']; ?></option>
                
                
                <?php } ?>
                
                </select>
                
            
            
            
            </form>
            
      
        
        <br />
                            
        
        
        </div>
    </body>

</html>






    <?php
    
} else {
    header('Location: index.php');
}




?>