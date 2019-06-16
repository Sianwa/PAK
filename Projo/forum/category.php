<?php
include 'connect.php';
include 'header.php';

if(isset($_SESSION['signed_in'])&&$_SESSION['signed_in'] == true)
{
    //the user is signed in
    //if($_SERVER['REQUEST_METHOD'] != 'GET')
    //{   
        $sql = "SELECT `cat_id`,`cat_name`,`cat_description` FROM `categories` WHERE `cat_id` = '".mysqli_real_escape_string($con,$_GET['id']). "'; ";
        $result = mysqli_query($con,$sql);
 
        if(!$result)
        {
            die(mysqli_error($con));
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'This category does not exist.';
            }
            else
            {
                //display category data
                while($row = mysqli_fetch_assoc($result))
                {
                    echo '
                    <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="category.php?id='.$row['cat_id'].'">"'.$row['cat_name'].'"</a></li>
                  </ul>';
                    echo '<h2>Topics in "' . $row['cat_name'] . '" category</h2>';
                    
                }
                
                //do a query for the topics
                $sql = "SELECT `topic_id`, `topic_subject`, `topic_date`, `topic_cat` FROM `topics` WHERE `topic_cat` = '" . mysqli_real_escape_string($con,$_GET['id']) ."'";
                $res = mysqli_query($con,$sql);
                if(!$res)
                {
                    echo 'The topics could not be displayed, please try again later.';
                }
                else
                {
                    if(mysqli_num_rows($res) == 0)
                    {
                        echo 'There are no topics in this category yet.';
                    }
                    else
                    {
                        //prepare the table
                        echo '<table border="1">
                        <tr>
                        <th>Topic</th>
                        <th>Created at</th>
                        </tr>'; 

                    
                        while($row = mysqli_fetch_assoc($res))
                        {   
            
                            echo '<tr>';
                            echo '<td class="leftpart">';
                            echo '<h3><a href="topic.php?id='.$row['topic_id'].'">' . $row['topic_subject'] . '</a><h3>';
                            echo '</td>';
                            echo '<td class="rightpart">';
                            echo date('d-m-Y', strtotime($row['topic_date']));
                            echo '</td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                    }
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
