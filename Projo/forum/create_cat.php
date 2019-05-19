<?php
include 'connect.php';
include 'header.php';

echo '<tr>';
    echo '<td class="leftpart">';
        echo '<h3><a href="category.php?id=">Go to Categories Page</a></h3>';
        // In Case We want users to add categories quicker but just an if as of now  <input type="submit" value="Add category" /> 
    echo '</td>';
   
    
    echo '<h2>Create a Category</h2>';
    
    
    if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
    { 
        //if a user is signed in      
        if($_SERVER['REQUEST_METHOD'] != 'POST')  
        {  
            //the form hasn't been posted yet, display it    
            echo '<form method="post" action="">
            <table align= "centre">
              <tr>        
              <td>Category name: <br><input type="text" name="cat_name" /></td>
              </tr>
              <tr>
              <td>Category description: <br><textarea name="cat_description" /></textarea></td>
              </tr>
              <tr>
              <td><input type="submit" value="Add category" /></td>
              </tr>
              </table>
              </form>';
            }
            else
            {                
                //the form has been posted, so save it
                $sql = "INSERT INTO categories(cat_name, cat_description) VALUES('" . mysqli_real_escape_string($con,$_POST['cat_name']) . "', '" . mysqli_real_escape_string($con,$_POST['cat_description']) ."' )";    
                $result = mysqli_query($con,$sql);
                if(!$result)
                {
                    //something went wrong, display the error
                    echo 'Error' . mysqli_error($con);
                }
                else
                {
                    echo 'New category successfully added.';
                }
            }
        }        
        else
        {
            //the user is not signed in
            echo 'Sorry, you have to be <a href="/Projo/forum/signin.php">signed in</a> to create a topic.';
        }



include 'footer.php';

?>