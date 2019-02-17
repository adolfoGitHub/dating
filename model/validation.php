<?php
/*      Author: Adolfo Gonzalez
        Date:   2/1/2019
        File:   validation.php

        Validation Functions for dating website.
*/


/* VALIDATION FUNCTIONS */

/**
 * This function validates a first name or last name.
 * @param $name string variable
 * @return bool true if valid else false
 */
function validName($name)
{
    if ($name !== '' && ctype_alpha($name)){

        return true;

    }
    return false;
}

/**
 * This function validates that age is not null, greater than 18
 * and is an integer
 * @param $age  integer variable
 * @return bool true if valid else false
 */
function validAge($age)
{
    if ($age !== '' && is_numeric($age) && $age >= 18 ){
        return true;
    }
    return false;
}
/**
 * tThis function checks for a valid phone number.
 * @param $phone integer variable
 * @return bool true if valid else false
 */
function validPhone($phone)
{
    if ($phone !== '' && is_numeric($phone)){
        return true;
    }
    return false;
}
/**
 * Get outdoor activities from array.
 * @param string $activity
 * @return bool return true if in array else false
 */
function validOutdoors($activity)
{
    global $f3;
    return in_array($activity, $f3->get('outdoors'));
}
/**
 * Get indoor activities from array.
 * @param string $activity
 * @return bool return true if in array else false
 */
function validIndoors($activity)
{
    global $f3;
    return in_array($activity, $f3->get('indoors'));
}