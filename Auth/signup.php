<?php
	include_once '../Function/koneksi.php';
	include_once '../Dao/AccountDao.php';
	include_once '../Dao/Account.php'; 
	
	if(isset($_POST['signup']))
	{	
		$username=$_POST['username'];
		$password=$_POST['password'];
		$name=$_POST['name'];
		$nrp=$_POST['nrp'];
		$email=$_POST['email'];
		$status= 1;
		
		$account = new Account();
		$account -> setUsername($username);
		$account -> setPassword($password);
		$account -> setName($name);
		$account -> setNrp($nrp);
		$account -> setEmail($email);
		$account -> setStatus($status);
		//$Account -> setPhotos($photos);
		
		$accountdao = new AccountDao();
		$result = $accountdao -> insert_account($account);
		if($result)
		{
			header("location:login.php");
		}
		else
		{
			echo "Account Gagal Dibuat";
			header("location:signup.php");
		}
	}
?>
<html>
    <head>
    	<link rel="stylesheet" href="../Style/Style.css" />
        <title>Sign Up</title>
    </head>
    <body>
    <form action="signup.php" method="post" > 
        <div class="login">
            <fieldset >
            <legend > Create New Account </legend>
            <div>
                <div> User Name </div>
                <div>  
                    <input type="text" name="username" />
                 </div>
            </div>
            
            <div>
                <div> Password </div>
                <div>  
                    <input type="password" name="password" />
                 </div>
            </div>
            <div>
                <div> Name </div>
                <div>  
                    <input type="text" name="name" />
                 </div>
            </div>
            <div>
                <div> Nrp </div>
                <div>  
                    <input type="text" name="nrp" />
                 </div>
            </div>
            <div>
                <div> Email </div>
                <div>  
                    <input type="text" name="email" />
                 </div>
            </div>
            
            <div>
                <div></div>
                <div>  
                    <input type="submit" name="signup" value="SignUp" />
                    
                 </div>
            </div>
            
            </fieldset> 
        </div>
    
    </form>
    </body>
</html>