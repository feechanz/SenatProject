<?php
	session_start();
	
	include_once '../Function/koneksi.php';
	include_once '../Dao/AccountDao.php';
	include_once '../Dao/Account.php';

	if(isset($_POST['login']))
	{	
		
		$accountdao = new AccountDao();
		$account = $accountdao -> get_one_account($_POST['user'],$_POST['pass']);	
		if( isset($account) )
		{
			$_SESSION['isLogin'] = true;
			$_SESSION['accountid'] = $account->getAccountid();
			$_SESSION['name'] = $account->getName();
			$_SESSION['nrp'] = $account->getNrp();
			$_SESSION['status'] = $account->getStatus();
			header("location: ../index.php?page=Index");		
		
		}
		else
		{
			print "	<script> 
					alert('user login / password salah')
					</script>";
			$_SESSION['isLogin'] = false;
			//session_destroy();		
		}
			
					
	}

?>

<html>
	<head>
    	<link rel="stylesheet" href="../Style/Style.css" />
        <title>Login</title>
    </head>
    <body>
    <form action="login.php" method="post" > 
        <div class="login">
            <fieldset >
            <legend > Login </legend>
            <div>
                <div> User Name </div>
                <div>  
                    <input type="text" name="user" />
                 </div>
            </div>
            
            <div>
                <div> Password </div>
                <div>  
                    <input type="password" name="pass" />
                 </div>
            </div>
            
            <div>
                <div> Don't have an account? <a href="signup.php">Sign Up</a></div>
                <div>  
                    <input type="submit" name="login" value="login" />
                 </div>
            </div>
            
            </fieldset> 
        </div>
    
    </form>
    </body>
</html>

