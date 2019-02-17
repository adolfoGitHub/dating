<?php
/**
 * This is the premium member class and it extends.
 *
 * @author Adolfo Gonzalez
 * @version 1.0
 *
 * File: dating/classes/premiumMember.php
 */

class PremiumMember extends Member
{
    #fields
    private $_indoorInterests;
    private $_outdoorInterests;

    /**
     * PremiumMember constructor.
     * @param $first
     * @param $last
     * @param $age
     * @param $gender
     * @param $phone
     */
    public function __construct($first, $last, $age, $gender, $phone)
    {
        //set parent constructor values
        parent::__construct($first, $last, $age, $gender, $phone);
    }

    #Getters and Setters

    /**
     * @return mixed
     */
    public function getIndoorInterests()
    {
        return $this->_indoorInterests;
    }

    /**
     * @param $indoorInterests
     */
    public function setIndoorInterests($indoorInterests)
    {
        $this->_indoorInterests = $indoorInterests;
    }

    /**
     * @return mixed
     */
    public function getOutdoorInterests()
    {
        return $this->_outdoorInterests;
    }

    /**
     * @param $outdoorInterests
     */
    public function setOutdoorInterests($outdoorInterests)
    {
        $this->_outdoorInterests = $outdoorInterests;
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        return parent::getFirst();
    }

    /**
     * @param $first
     */
    public function setFirst($first)
    {
        parent:: setFirst($first);
    }

    /**
     * @return mixed
     */
    public function getLast()
    {
        return parent::getLast();
    }

    /**
     * @param $last
     */
    public function setLast($last)
    {
        parent::setLast($last);
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return parent::getAge();
    }

    /**
     * @param $age
     */
    public function setAge($age)
    {
        parent::setAge($age);
    }

    /**
     *
     */
    public function getGender()
    {
        parent::getGender();
    }

    /**
     * @param $gender
     */
    public function setGender($gender)
    {
        parent::setGender($gender);
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return parent::getPhone();
    }

    /**
     * @param $phone
     */
    public function setPhone($phone)
    {
        parent::setPhone($phone);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return parent::getEmail();
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        parent::setEmail($email);
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return parent::getState();
    }

    /**
     * @param $state
     */
    public function setState($state)
    {
        parent::setState($state);
    }

    /**
     * @return mixed
     */
    public function getSeeking()
    {
        return parent::getSeeking();
    }

    /**
     * @param $seeking
     */
    public function setSeeking($seeking)
    {
        parent::setSeeking($seeking);
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return parent::getBio();
    }

    /**
     * @param $bio
     */
    public function setBio($bio)
    {
        parent::setBio($bio);
    }


}#end of class