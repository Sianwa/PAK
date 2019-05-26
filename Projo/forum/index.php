<?php


include 'connect.php';
include 'header.php';



$sql = "SELECT categories.cat_id,categories.cat_name,categories.cat_description, topics.topic_subject,topics.topic_date, topics.topic_id FROM `categories` LEFT JOIN topics on categories.cat_id = topics.topic_cat;";

 
$result = mysqli_query($con,$sql);
 
if(!$result)
{

    die(mysqli_error($con));
}
else

{
    if(mysqli_num_rows($result)==0 )
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
            echo '<a href="topic.php?id='.$row['topic_id'].'">' . $row['topic_subject'] . '</a> at '.$row['topic_date'].'';
            echo '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
        
    }
}

include 'footer.php';

?>