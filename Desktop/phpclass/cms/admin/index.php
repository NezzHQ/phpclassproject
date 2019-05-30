<?php

session_start();
include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
    
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
            
            <ol>
            
                <lil><a href="add.php">Add Article</a></lil>
                <lil><a href="delete.php">Delete Article</a></lil>
                <lil><a href="logout.php">Logout</a></lil>
            
            
            </ol>
            
      
        
        <br />
                            
        
        
        </div>
    </body>

</html>




    <?php
    
} else {
    if (isset($_POST['username'], $POST['password'])) {
        $username = $_POST['username'];
        $password =md5($_POST['password']);
        
        if (empty($username) or empty($password)) {
            $error = 'All fields are required!';
        } else {
            $query= $pdo->("SELECT * FROM users WHERE user_name = ? AND user_password =?");
            
            $query->bindValue(1, $username);
            $query->bindValue(2, $password);
            
            $query->excute();
            
            $num = $query->rowCount();
            
            if ($num ==1) {
                $_SESSION['logged_in'] = true;
                header('Location: index.php');
                exit();
                
            } else {
                $error = 'Incorrect details!';
            }
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
            
            <br /><br />
            
            <?php if (isset($error)) { ?>
        <small style="color:#aa0000;"><?php echo $error; ?></small>
    <?php } ?>
            
            <br /><br />
            
        <form action ="index.php" method="post" autocomplete="off">
            
            <input type="text" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="password" />
            <input type="submit" value="LOGIN" />
            
            
            
        </form>
        
        <br />
                            
        
        
        </div>
    </body>

</html>


    <?php
}
?>