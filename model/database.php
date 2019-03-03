<?php
	/*
			Author: Adolfo Gonzalez
			Date:   2/1/2019
			File:   validation.php
	
			Validation Functions for dating website.

	 		CREATE TABLE Members (
	 			member_id INT PRIMARY KEY AUTO_INCREMENT,
	 			fname VARCHAR(15),
				lname VARCHAR(20),
				age INT(2),
				gender CHAR(1),
				phone INT(10),
				email VARCHAR(50),
				state CHAR(2),
				seeking CHAR(1),
				bio  BLOB,
				premium CHAR(1),
				image VARCHAR(100),
				interests BLOB));
	*/
	require '/home/agonzale/config.php';
	
	class Database
		{
		/**
		 * This function is used to connect to database.
		 *
		 * @return    return void
		 */
			function connect() {
				try {
					//Instantiate a database object
					$dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
					//echo "Connected to database!!!";
					return $dbh;
				}
				catch(PDOException $e) {
					echo $e -> getMessage();
					return;
				}
			}
		
		/**
		 * This funciton is used to insert a new mamber to the database.
		 *
		 * @param $fname        string first name
		 * @param $lname        string last name
		 * @param $age          int age
		 * @param $gender       string  gender
		 * @param $phone        int phone
		 * @param $email        string email
		 * @param $state        string state
		 * @param $seeking      string seeking
		 * @param $bio          string biography
		 * @param $premium      int 1 for premium 0 for non-premium
		 * @param $interests    string interests
		 *
		 * @return bool
		 */
			function insertMember($fname, $lname, $age, $gender, $phone, $email, $state, $seeking, $bio, $premium,
			                      $interests) {
				global $dbh;
				//connect to database
				$dbh = $this  -> connect();
				
				//1. define the query
				$sql = "INSERT INTO Members('fname','lname','age','gender','phone','email','state'
    							 'seeking','bio', 'premium', 'interests')
            					VALUES (:fname, :lname, :age, :gender, :phone, :email, :state,
            								:seeking, : bio, :premium,:interests)";
				
				//2. prepare the statement
				$statement = $dbh -> prepare($sql);
				
				//3. bind parameters
				$statement -> bindParam(':fname', $fname, PDO::PARAM_STR);
				$statement -> bindParam(':lname', $lname, PDO::PARAM_STR);
				$statement -> bindParam(':age', $age, PDO::PARAM_INT);
				$statement -> bindParam(':gender', $gender, PDO::PARAM_STR);
				$statement -> bindParam(':phone', $phone, PDO::PARAM_STR);
				$statement -> bindParam(':email', $email, PDO::PARAM_STR);
				$statement -> bindParam(':state', $state, PDO::PARAM_STR);
				$statement -> bindParam(':seeking', $seeking, PDO::PARAM_STR);
				$statement -> bindParam(':bio', $bio, PDO::PARAM_STR);
				$statement -> bindParam(':premium', $premium, PDO::PARAM_BOOL);
				$statement -> bindParam(':interests', $interests, PDO::PARAM_STR);
				
				//4. execute the statement
				$success = $statement -> execute();
				
				//5. return the result
				return $success;
			}
		
		/**
		 * This function gets all  members from the database.
		 *
		 * @return array
		 */
			function getMembers() {
				global $dbh;
				//connect to database
				$dbh = $this -> connect();
				
				//1. define the query
				$sql = 'SELECT * FROM Members';
				
				//2. prepare the statement
				$statement = $dbh -> prepare($sql);
				
				//3. bind parameters
				//--No BINDING--//
				
				//4. execute the statement
				$statement -> execute();
				
				//5. return the result
				$result = $statement -> fetchAll(PDO::FETCH_ASSOC);
				
				//print_r($result);
				return $result;
			}
		
		/**
		 * This class get members by id number.
		 *
		 * @param $id    int member id
		 *
		 * @return Member|PremiumMember
		 */
			function getMember($id) {
				global $dbh;
				//connect to database
				$dbh = $this -> connect();
				
				//1. define the query
				$sql = 'SELECT * FROM  Members WHERE member_id = :id';
				
				//2. prepare the statement
				$statement = $dbh -> prepare($sql);
				
				//3. bind parameters
				$statement -> bindParam(':id', $id, PDO::PARAM_INT);
				
				//4. execute the statement
				$statement -> execute();
				
				//5. return the result
				$result = $statement -> fetch(PDO::FETCH_ASSOC);
				
					return new Member($result['fname'], $result['last'], $result['age'], $result['gender'],
						$result['phone'], $result['email'], $result['state'], $result['seeking'], $result['bio'],
						$result['interests']);
			}
		}