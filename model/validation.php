<?php
	/*      Author: Adolfo Gonzalez
			Date:   2/1/2019
			File:   validation.php
	
			VALIDATION FUNCTIONS for dating website.
	*/
	/**
	 * This function validates a first name or last name.
	 *
	 * @param $name string variable
	 *
	 * @return bool true if valid else false
	 */
	function validName($name)
	{
		//check not null and alphabegtic
		if($name !== '' && ctype_alpha($name)) {
			return TRUE;
			
		}
		return FALSE;
	}
	
	/**
	 * This function validates that age is not null, greater than 18
	 * and is an integer
	 *
	 * @param $age  integer variable
	 *
	 * @return bool true if valid else false
	 */
	function validAge($age)
	{
		//check valid, numeric and over 18
		if($age !== '' && is_numeric($age) && $age >= 18) {
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * tThis function checks for a valid phone number.
	 *
	 * @param $phone integer variable
	 *
	 * @return bool true if valid else false
	 */
	function validPhone($phone)
	{
		//check not null and is numeric
		if($phone !== '' && is_numeric($phone)) {
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * Get outdoor activities from array.
	 *
	 * @param string $activity
	 *
	 * @return bool return true if in array else false
	 */
	function validOutdoors($activity)
	{
		global $f3;
		//return outdoor activities array
		return in_array($activity, $f3 -> get('outdoors'));
	}
	
	/**
	 * Get indoor activities from array.
	 *
	 * @param string $activity
	 *
	 * @return bool return true if in array else false
	 */
	function validIndoors($activity)
	{
		global $f3;
		//return indoor activities array
		return in_array($activity, $f3 -> get('indoors'));
	}