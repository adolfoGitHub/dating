<?php

/**
 * This is the member class used to create a member object.
 *
 * @author Adolfo Gonzalez
 * @version 1.0
 *
 * File: dating/classes/member.php
 */
class Member
{
    #fields
    private $_first;
    private $_last;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;

    #constructor
    public function __construct($first, $last, $age, $gender, $phone)
    {
        $this->_first = $first;
        $this->_last = $last;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
    }

    #getters and setters
    public function getFirst()
    {
        return $this->_first;
    }

    public function setFirst($_first)
    {
        $this->_first = $_first;
    }

    public function getLast()
    {
        return $this->_last;
    }

    public function setLast($_last)
    {
        $this->_last = $_last;
    }

    public function getAge()
    {
        return $this->_age;
    }

    public function setAge($_age)
    {
        $this->_age = $_age;
    }

    public function getGender()
    {
        return $this->_gender;
    }

    public function setGender($_gender)
    {
        $this->_gender = $_gender;
    }

    public function getPhone()
    {
        return $this->_phone;
    }

    public function setPhone($_phone)
    {
        $this->_phone = $_phone;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($_email)
    {
        $this->_email = $_email;
    }

    public function getState()
    {
        return $this->_state;
    }

    public function setState($_state)
    {
        $this->_state = $_state;
    }

    public function getSeeking()
    {
        return $this->_seeking;
    }

    public function setSeeking($_seeking)
    {
        $this->_seeking = $_seeking;
    }

    public function getBio()
    {
        return $this->_bio;
    }

    public function setBio($_bio)
    {
        $this->_bio = $_bio;
    }
}#end of class