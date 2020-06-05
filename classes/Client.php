<?php


class Client
{
    private $_name;
    private $_email;
    private $_phone;
    private $_contactMethod;

    public function __construct($name, $email, $phone, $contactMethod)
    {
            $this->setName($name);
            $this->setEmail($email);
            $this->setPhone($phone);
            $this->setContactMethod($contactMethod);
    }

    public function getName(){
        return $this->_name;
    }

    public function setName($name){
        $this->_name = $name;
    }

    public function getEmail(){
        return $this->_email;
    }

    public function setEmail($email){
        $this->_email = $email;
    }

    public function getPhone(){
        return $this->_phone;
    }

    public function setPhone($phone){
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getContactMethod()
    {
        return $this->_contactMethod;
    }

    /**
     * @param mixed $contactMethod
     */
    public function setContactMethod($contactMethod)
    {
        $this->_contactMethod = $contactMethod;
    }

}