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

    public function __construct($first, $last, $age, $gender, $phone, $email = "", $state = "", $seeking = "", $bio = "",$inDoorInterests = "", $outDoorInterests = "")
    {
        //set parent constructor values
        parent::__construct($first, $last, $age, $gender, $phone, $email, $state, $seeking, $bio);
        $this->_inDoorInterests = $inDoorInterests;
        $this->_outDoorInterests = $outDoorInterests;
    }

    #Getters and Setters
    public function getIndoorInterests()
    {
        return $this->_indoorInterests;
    }

    public function setIndoorInterests($indoorInterests): void
    {
        $this->_indoorInterests = $indoorInterests;
    }

    public function getOutdoorInterests()
    {
        return $this->_outdoorInterests;
    }

    public function setOutdoorInterests($outdoorInterests): void
    {
        $this->_outdoorInterests = $outdoorInterests;
    }

    public function getFirst()
    {
        return parent::getFirst();
    }

    public function setFirst($first): void
    {
        parent:: setFirst($first);
    }

    public function getLast()
    {
        return parent::getLast();
    }

    public function setLast($last): void
    {
        parent::setLast($last);
    }

    public function getAge()
    {
        return parent::getAge();
    }

    public function setAge($age): void
    {
        parent::setAge($age);
    }

    public function getGender()
    {
        rparent::getGender();
    }

    public function setGender($gender): void
    {
        parent::setGender($gender);
    }

    public function getPhone()
    {
        return parent::getPhone();
    }

    public function setPhone($phone): void
    {
        parent::setPhone($phone);
    }

    public function getEmail()
    {
        return parent::getEmail();
    }

    public function setEmail($email): void
    {
        parent::setEmail($email);
    }

    public function getState()
    {
        return parent::getState();
    }

    public function setState($state): void
    {
        parent::setState($state);
    }

    public function getSeeking()
    {
        return parent::getSeeking();
    }

    public function setSeeking($seeking): void
    {
        parent::setSeeking($seeking);
    }

    public function getBio()
    {
        return parent::getBio();
    }

    public function setBio($bio): void
    {
        parent::setBio($bio);
    }


}#end of class