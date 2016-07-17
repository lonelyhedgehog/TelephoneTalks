<?php
include_once 'classTime.php';

class Bill { 
	private $id; 
	private $surname; 
	private $telephone; 
	private $tariff; 
	private $discount; 
	private $startTime; 
	private $endTime;
	
	function __construct($id,$surname,$telephone,$tariff,$discount,$startTime,$endTime){ /*конструктор*/
		$this->id=$id;
		$this->surname=$surname;
		$this->telephone=$telephone;
		$this->tariff=$tariff;
		$this->discount=$discount;
		$this->startTime=$startTime;
		$this->endTime=$endTime;
	}
	public function getID(){
		return $this->id;
	}
	public function getSurname(){
		return $this->surname;
	}
	public function setSurname($surname){
		$this->surname = $surname ;
	}
	public function getTelephone(){
		return $this->telephone;
	}
	public function setTelephone($telephone){
		$this->telephone = $telephone ;
	}
	public function getTariff(){
		return $this->tariff;
	}
	public function setTariff($tariff){
		$this->tariff = $tariff ;
	}
	public function getDiscount(){
		return $this->discount;
	}
	public function setDiscount($discount){
		$this->discount = $discount ;
	}
	public function getStartTime(){
		return $this->startTime;
	}
	public function setStartTime($startTime){
		$this->startTime = $startTime ;
	}
	public function getEndTime(){
		return $this->endTime;
	}
	public function setEndTime($endTime){
		$this->endTime = $endTime ;
	}
	public function getAmount(){
		$price=$this->countAmount();
		return $price;
    } 
	private function countAmount(){
		
		$endTime= $this->endTime;
		$endInMinutes=$endTime->turnToMinutes();
		$startTime=$this->startTime; 
		$startInMinutes=$startTime->turnToMinutes();
		$talkTime = $endInMinutes-$startInMinutes;
		$amount = (float)($this->tariff)*(float)$talkTime;
		$amountWthDiscount=(float)(($amount*(100-($this->discount)))/100);
		return ($amountWthDiscount);
	}
}	


