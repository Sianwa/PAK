<?php
include 'connect.php';
include 'header.php';

if(isset($_SESSION['signed_in'])&&$_SESSION['signed_in'] == true)
{
    //the user is signed in
    //if($_SERVER['REQUEST_METHOD'] != 'POST')
    //{   
        $sql = "SELECT
        `posts.post_topic`,
        `posts.post_content`,
        `posts.post_date`,
        `posts.post_by`,
        `users.user_id`,
        `users.user_name`
    FROM
        `posts`
    LEFT JOIN
        `users`
    ON
        `posts.post_by = users.user_id`
    WHERE
        `posts.post_topic` = '" . mysqli_real_escape_string($con,$_GET['id'])."';
        $result = mysqli_query($con,$sql)";
        if(!$result)
        {
            die(mysqli_error($con));
        }

        else
        {
            if(mysqli_num_rows($result)==0)
            {
                echo 'No categories defined yet.';
            }
            else
            {
                //prepare the table        
                echo '<table border="1">
                <tr>
                <th>Category</th>
                <th>Last topic</th>
                </tr>';            

                while($row = mysqli_fetch_assoc($result))
                {               
                    echo '<tr>';
                    echo '<td class="leftpart">';
                    echo '<h3><a href="category.php?id='.$row['cat_id'].'">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];
                    echo '</td>';
                    echo '<td class="rightpart">';
                    echo '<a href="topic.php?id=">Topic subject</a> at 10-10';
                    echo '</td>';
                    echo '</tr>';
                }
            }
        }    
    //}
}
else
{
    //the user is not signed in
    echo 'Sorry, you have to be <a href="/Projo/forum/signin.php">signed in</a> to create a topic.';
}

include 'footer.php';
?>