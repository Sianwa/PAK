<?php
include 'connect.php';
include 'header.php';   
    
    echo '<h2>Create a Category</h2>';
    
    //if a user is signed in 
    if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
    { 
        if (isset($_SESSION['user_level']) && $_SESSION['user_level']=="1")
        {              
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
        else{
            echo 'Only Admins are allowed to create a topic.';
        }
    }
    else
    {
        //the user is not signed in     
        echo 'Sorry, you have to be <a href="/Projo/forum/signin.php">signed in</a> to create a topic.';            
    }


include 'footer.php';

?>