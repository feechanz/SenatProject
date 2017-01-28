<?php
include_once 'Student.php';
include_once 'StudentInterface.php';

class StudentDao implements StudentInterface {


	public function get_all_student()
	{
		$students = new ArrayObject();
		try
		{
			$conn = Koneksi::get_connection();
			$query = "SELECT *
						FROM student";
			$stmt = $conn -> prepare($query);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0)
			{
				while ($row = $stmt -> fetch())
				{
					$student = new student();
					$student->SetStudentID($row['studentid']);
					$student->setName($row['name']);
					$student->setEmail($row['email']);
					$students->append($student);
					
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
		return $students;
	}
	
	
	public function get_one_student($studentid)
	{
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "SELECT * FROM student 
                    WHERE studentid = ?";
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $studentid);
			$result = $stmt -> execute();
			if ($stmt -> rowCount() > 0)
			{
				$student = new Student();
				while ($row = $stmt -> fetch())
				{
					$student -> setStudentID($row['studentid']);
                    $student -> setName($row['name']);
                    $student -> setEmail($row['email']);
				}
			}
		}
		catch (PDOException $e)
		{
			echo $e -> getMessage();
			die();
		}
		$conn = null;
		return $student;
	}
	
	public function delete_student($studentid)
	{
		$result = FALSE;
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "DELETE FROM student WHERE studentid = ?";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $studentid);			
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
	
	public function insert_student($student)
	{
		$result = FALSE;
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "INSERT INTO student  
					VALUES(?,?,?)";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $student -> getStudentID());
			$stmt -> bindParam(2, $student -> getName());
			$stmt -> bindParam(3, $student -> getEmail());
			

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
	
	public function update_student($student)
	{
		$result = FALSE;
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "UPDATE student  
					SET name = ?,
					email = ?
					WHERE studentid = ?";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $student -> getName());
			$stmt -> bindParam(2, $student -> getEmail());
			$stmt -> bindParam(3, $student -> getStudentID());

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