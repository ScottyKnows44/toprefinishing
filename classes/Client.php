<?php


class Client
{
    private $_name;
    private $_email;
    private $_phone;
    private $_contactMethod;
    private $_service;

    public function __construct($name, $email, $phone, $contactMethod, $service)
    {
            $this->setName($name);
            $this->setEmail($email);
            $this->setPhone($phone);
            $this->setContactMethod($contactMethod);
            $this->setService($service);
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

    public function getService(){
        return $this->_service;
    }

    public function setService($service){
        $this->_service = $service;
    }
}