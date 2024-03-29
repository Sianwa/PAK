<?php
include 'connect.php';
include 'header.php';

if(isset($_SESSION['signed_in'])&&$_SESSION['signed_in'] == true)
{
    //the user is signed in
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {   
        $sql ="SELECT topics.topic_id, categories.cat_id, categories.cat_name,
        topics.topic_subject, posts.post_topic, posts.post_content, 
        posts.post_date, posts.post_by, users.user_id, 
        users.user_name FROM posts 
        LEFT JOIN users ON posts.post_by = users.user_id 
        INNER JOIN topics on topics.topic_id = posts.post_topic
        INNER JOIN categories ON categories.cat_id = topics.topic_cat
         WHERE posts.post_topic = '" . mysqli_real_escape_string($con, $_GET['id'])."';";       
        $result=mysqli_query($con,$sql);
        $data   = $result->fetch_all(MYSQLI_ASSOC);

        
        if(!$result)
        {
            die(mysqli_error($con));
        }

        else
        {
            if(mysqli_num_rows($result)==0)
            {
                echo 'No Topics defined yet.';
            }
            else
            {
                $count = 0;
                $maxloop = 1;
                //prepare the table        
                foreach($data as $row)
                {
                    echo '
                    <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="category.php?id='.$row['cat_id'].'">"'.$row['cat_name'].'"</a></li>
                    <li><a href="category.php?id='.$row['topic_id'].'">"'.$row['topic_subject'].'"</a></li>
                  </ul>';
                echo  '
                <div class="table-users">
                <div class="header">FORUM</div>
                <table border>
                <tr>
                <th colspan="2">'.$row['topic_subject'].'</th>
                </tr>';
                $count++;

                if ($count==$maxloop)
                {
                    break;
                }

                }
                foreach($data as $row)
                {
                    
                    echo '<tr>';
                    echo '<td class="left">';
                    echo ''.$row['user_name'].'<br>' . $row['post_date'] . '';
                    echo '</td>';
                    echo '<td class="right">';
                    echo '' . $row['post_content'].'';
                    echo '</td>';
                    echo '</tr>';
                     
                }
                
                    echo '</table>';
                    echo '<form align="centre" method="post" action="reply.php?id='.$row['topic_id'].'">';              
                    echo '<textarea name="reply-content"></textarea><br>';
                    echo '<input type="submit" value="Submit reply" />';
                    echo '</form>';
                    
            }    
        }
    }
    
}
else
    {
    //the user is not signed in
    echo 'Sorry, you have to be <a href="signin.php">signed in</a> to create a topic.';
    }

include 'footer.php';
?>