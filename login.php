<?php
function Login()
{
    if(empty($_POST['username']))
    {
        $this->HandleError("UserName is empty!");
        return false;
    }
    
    if(empty($_POST['password']))
    {
        $this->HandleError("Password is empty!");
        return false;
    }
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if(!$this->CheckLogin($username,$password))
    {
        return false;
    }
    
    session_start();
    
    $_SESSION[$this->GetLoginSessionVar()] = $username;
    
    return true;
}



function CheckLogin($username,$password)
{
   /* if(!$this->DBLogin())
    {
        $this->HandleError("Database login failed!");
        return false;
    } 
        might not need this?
      */       

    $qry = "SELECT name, email FROM usernames_tbl WHERE username='$username' AND password='$password' AND confirmcode='y'";
    
    $result = mysql_query($qry,$this->connection);
    
    if(!$result || mysql_num_rows($result) <= 0)
    {
        $this->HandleError("Error logging in. ".
            "The username or password does not match");
        return false;
    }
    return true;
}


?>