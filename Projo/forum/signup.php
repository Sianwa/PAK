<?php

include 'connect.php';
include 'header.php';


//echo '<h3>Sign Up</h3>';
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    echo'
        <form method="post" action="">
        <div class="table-users">
        <div class="header">FORUM</div>
        <table align = "centre">
        <tr>
        <td>Username: <br><input type="text" name="user_name" /></td>
        </tr>
        <tr>
        <td>Password: <br><input type="password" name="user_pass"></td>
        </tr>
        <tr>
        <td>Retype Password: <br><input type="password" name="user_pass_check"></td>
        </tr>
        <tr>
        <td>E-mail: <br><input type="email" name="user_email"></td>
        </tr>
        <tr>
        <td><input type="submit" value="Sign Up" /></td>
        </tr>
        </table>
        </div>
     </form>';
}
else
{
    /* so, the form has been posted, we'll process the data in three steps:
        1.  Check the data
        2.  Let the user refill the wrong fields (if necessary)
        3.  Save the data 
    */
    $errors = array(); /* declare the array for later use */
     
    if(isset($_POST['user_name']))
    {
        //the user name exists
        if(!ctype_alnum($_POST['user_name']))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if(strlen($_POST['user_name']) > 30)
        {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'The username field must not be empty.';
    }
     
     
    if(isset($_POST['user_pass']))
    {
       /*
       if(strlen($_POST['user_pass'] < 6))
        {   
            $errors[] = "The password cannot be shorter that 6 Characters.";
        }
        */

        if($_POST['user_pass'] != $_POST['user_pass_check'])
        {
            $errors[] = 'The two passwords did not match.';
        }
    }
    else
    {
        $errors[] = 'The password field cannot be empty.';
    }
     
    if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
    {
        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
        echo '<ul>';
        foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
        {
            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
        }
        echo '</ul>';
    }
    else
    {
        //the form has been posted without, so save it
        //notice the use of mysql_real_escape_string, keep everything safe!
        //also notice the sha1 function which hashes the password
        $sql = "INSERT INTO
                    users(user_name, user_pass, user_email ,user_date, user_level)
                VALUES('" . mysqli_real_escape_string($con,$_POST['user_name']) . "',
                       '" . sha1($_POST['user_pass']) . "',
                       '" . mysqli_real_escape_string($con,$_POST['user_email']) . "',
                        NOW(),
                        0)";
                         
        $result = mysqli_query($con,$sql);
        if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else
        {
            echo 'Successfully registered. You can now <a href="signin.php">sign in</a> and start posting! :-)';
        }
    }
}


include 'footer.php';
?>