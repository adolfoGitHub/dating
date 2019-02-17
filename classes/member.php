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

    /**
     * Member constructor.
     * @param $first
     * @param $last
     * @param $age
     * @param $gender
     * @param $phone
     */
    public function __construct($first, $last, $age, $gender, $phone)
    {
        $this->_first = $first;
        $this->_last = $last;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->_first;
    }

    /**
     * @param $_first
     */
    public function setFirst($_first)
    {
        $this->_first = $_first;
    }

    /**
     * @return mixed
     */
    public function getLast()
    {
        return $this->_last;
    }

    /**
     * @param $_last
     */
    public function setLast($_last)
    {
        $this->_last = $_last;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * @param $_age
     */
    public function setAge($_age)
    {
        $this->_age = $_age;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * @param $_gender
     */
    public function setGender($_gender)
    {
        $this->_gender = $_gender;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param $_phone
     */
    public function setPhone($_phone)
    {
        $this->_phone = $_phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param $_email
     */
    public function setEmail($_email)
    {
        $this->_email = $_email;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param $_state
     */
    public function setState($_state)
    {
        $this->_state = $_state;
    }

    /**
     * @return mixed
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * @param $_seeking
     */
    public function setSeeking($_seeking)
    {
        $this->_seeking = $_seeking;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param $_bio
     */
    public function setBio($_bio)
    {
        $this->_bio = $_bio;
    }
}#end of class