<?php


class Bid extends Client
{
    private $_description;
    private $_price;

    public function __construct($name, $email, $phone, $contactMethod, $service)
    {
        parent::__construct($name, $email, $phone, $contactMethod, $service);
    }

   public function setDescription($description){
        $this->_description = $description;
   }

   public function getDescription(){
        return $this->_description;
   }

   public function setPrice($price){
        $this->_price = $price;
   }

   public function getPrice(){
        return $this->_price;
   }

}