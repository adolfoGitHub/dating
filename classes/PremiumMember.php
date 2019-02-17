<?php
/**
 * This is the premium member class and it extends.
 *
 * @author Adolfo Gonzalez
 * @version 1.0
 *
 * File: dating/classes/PremiumMember.php
 */

class PremiumMember extends Member
{
    #fields
    private $_indoorInterests;
    private $_outdoorInterests;

    public function __construct($first, $last, $age, $gender, $phone)
    {
        //set parent constructor values
        parent::__construct($first, $last, $age, $gender, $phone);
    }

    #Getters and Setters
    public function getIndoorInterests()
    {
        return $this->_indoorInterests;
    }

    public function setIndoorInterests($indoorInterests)
    {
        $this->_indoorInterests = $indoorInterests;
    }

    public function getOutdoorInterests()
    {
        return $this->_outdoorInterests;
    }

    public function setOutdoorInterests($outdoorInterests)
    {
        $this->_outdoorInterests = $outdoorInterests;
    }

    public function getFirst()
    {
        return parent::getFirst();
    }

    public function setFirst($first)
    {
        parent:: setFirst($first);
    }

    public function getLast()
    {
        return parent::getLast();
    }

    public function setLast($last)
    {
        parent::setLast($last);
    }

    public function getAge()
    {
        return parent::getAge();
    }

    public function setAge($age)
    {
        parent::setAge($age);
    }

    public function getGender()
    {
        parent::getGender();
    }

    public function setGender($gender)
    {
        parent::setGender($gender);
    }

    public function getPhone()
    {
        return parent::getPhone();
    }

    public function setPhone($phone)
    {
        parent::setPhone($phone);
    }

    public function getEmail()
    {
        return parent::getEmail();
    }

    public function setEmail($email)
    {
        parent::setEmail($email);
    }

    public function getState()
    {
        return parent::getState();
    }

    public function setState($state)
    {
        parent::setState($state);
    }

    public function getSeeking()
    {
        return parent::getSeeking();
    }

    public function setSeeking($seeking)
    {
        parent::setSeeking($seeking);
    }

    public function getBio()
    {
        return parent::getBio();
    }

    public function setBio($bio)
    {
        parent::setBio($bio);
    }


}#end of class