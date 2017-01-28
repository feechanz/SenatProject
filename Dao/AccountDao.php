<?php
include_once 'Account.php';
include_once 'AccountInterface.php';

class AccountDao implements AccountInterface {


	public function get_all_account()
	{
		$accounts = new ArrayObject();
		try
		{
			$conn = Koneksi::get_connection();
			$query = "SELECT *
						FROM account";
			$stmt = $conn -> prepare($query);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0)
			{
				while ($row = $stmt -> fetch())
				{
					$account = new Account();
					$account->setAccountid($row['accountid']);
					$account->setUsername($row['username']);
					$account->setPassword($row['password']);
					$account->setName($row['name']);
					$account->setNrp($row['nrp']);
					$account->setEmail($row['email']);
					$account->setStatus($row['status']);
					$accounts->append($account);
					
				}
			}
			
		}
		catch (PDOException $e)
		{
			echo $e -> getMessage();
			die();
		}
		try
		{
			if (!empty($conn) || $conn != null) {
				$conn = null;
			}
		}
		catch (PDOException $e)
		{
			echo $e -> getMessage();
		}
		return $accounts;
	}
	
	public function get_one_account($username,$password)
	{
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "SELECT * FROM account 
                    WHERE username = ? AND password = ?";
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $username);
			$stmt -> bindParam(2, $password);
			$result = $stmt -> execute();
			if ($stmt -> rowCount() > 0)
			{
				$account = new Account();
				while ($row = $stmt -> fetch())
				{
					$account = new Account();
					$account->setAccountid($row['accountid']);
					$account->setUsername($row['username']);
					$account->setPassword($row['password']);
					$account->setName($row['name']);
					$account->setNrp($row['nrp']);
					$account->setEmail($row['email']);
					$account->setStatus($row['status']);
				}
			}
			else
			{
				$account = NULL;
			}
		}
		catch (PDOException $e)
		{
			echo $e -> getMessage();
			die();
		}
		$conn = null;
		
		return $account;
	}
	
	public function get_one_accountid($accountid)
	{
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "SELECT * FROM account 
                    WHERE accountid = ?";
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $accountid);
			$result = $stmt -> execute();
			if ($stmt -> rowCount() > 0)
			{
				$account = new Account();
				while ($row = $stmt -> fetch())
				{
					$account = new Account();
					$account->setAccountid($row['accountid']);
					$account->setUsername($row['username']);
					$account->setPassword($row['password']);
					$account->setName($row['name']);
					$account->setNrp($row['nrp']);
					$account->setEmail($row['email']);
					$account->setStatus($row['status']);
				}
			}
			else
			{
				$account = NULL;
			}
		}
		catch (PDOException $e)
		{
			echo $e -> getMessage();
			die();
		}
		$conn = null;
		
		return $account;
	}
	
	public function insert_account($account)
	{
		$result = FALSE;
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "INSERT INTO account(username,password,name,nrp,email,status)  
					VALUES(?,?,?,?,?,?)";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $account -> getUsername());
			$stmt -> bindParam(2, $account -> getPassword());
			$stmt -> bindParam(3, $account -> getName());
			$stmt -> bindParam(4, $account -> getNrp());
			$stmt -> bindParam(5, $account -> getEmail());
			$stmt -> bindParam(6, $account -> getStatus());
			

			$result = $stmt -> execute();
			$conn -> commit();
		}
		catch (PDOException $e)
		{
			echo $e -> getMessage();
			$stmt -> rollBack();
			die();
		}
		try
		{
			if(!empty($conn) || $conn != null)
			{
				$conn = null;
			}
		}
		catch (PDOException $e)
		{
			echo $e -> getMessage();
		}
		return $result;	
	}
	
	
	
	public function update_account($account)
	{
		$result = FALSE;
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "UPDATE account  
					SET 
					password =?,
					name = ?,
					nrp = ?,
					email = ?,
					status = ?
					WHERE accountid = ?";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $account -> getPassword());
			$stmt -> bindParam(2, $account -> getName());
			$stmt -> bindParam(3, $account -> getNrp());
			$stmt -> bindParam(4, $account -> getEmail());
			$stmt -> bindParam(5, $account -> getStatus());
			$stmt -> bindParam(6, $account -> getAccountid());
			

			$result = $stmt -> execute();
			$conn -> commit();
		}
		catch (PDOException $e)
		{
			echo $e -> getMessage();
			$conn -> rollBack();
			die();
		}
		$conn = null;
		return $result;	
	}
}
?>