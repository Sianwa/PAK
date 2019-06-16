<?php
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="A short description." />
    <meta name="keywords" content="put, keywords, here" />
    <title>Photographers Forum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="forum.css" type="text/css">
</head>
<body>
<h1>Photographers Forum</h1>
    <div id="wrapper">
        <div id="menu">
        <a class="item" href="sessiondestroy.php">Back to PAK</a> -


        <a class="item" href="index.php">Forum Home</a> -
        <a class="item" href="create_topic.php">Create a topic</a>
            <?php
                if(isset($_SESSION['user_level']) && $_SESSION['user_level']==1)
                {            
                    echo '- <a class="item" href="create_cat.php">Create a category</a>';
                }                
            ?>
  
    <div id="userbar">
        <?php
    if(isset($_SESSION['signed_in']))
    {
        if($_SESSION['signed_in']!=NULL)
        {
            echo 'Hello <strong>' . $_SESSION['user_name'] . '</strong>. Not you? <a class="item" href="signout.php">Sign Out</a>';
        }
    }
        else
        {
            echo '<a class="item" href="signin.php">Sign In</a> or <a class="item" href="signup.php">Create an Account</a>.';
        }
    
?>
        </div>
        </div><!-- menu-->
      <div id="content">