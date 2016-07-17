<?php


class ListPayers{
	
	private $listPayer;
	private $dateOfCreation;
	private $listNumber;

	function __construct($listPayer,$dateOfCreation,$listNumber){ /*конструктор*/
		$this->listPayer=$listPayer;
		$this->dateOfCreation=$dateOfCreation;
		$this->listNumber=$listNumber;
	}
	public function getDateOfCreation(){
		return $this->dateOfCreation;
	}
	public function setDateOfCreation($dateOfCreation){
		$this->dateOfCreation = $dateOfCreation ;
	}
	public function getListNumber(){
		return $this->listNumber;
	}
	public function setListNumber($listNumber){
		$this->listNumber = $listNumber ;
	}
	public function AddPhoneInArrLP($bill, $typeCall, $dataCall){ //добавление в список
		$this->listPayer[]=['bill'=>$bill ,'type'=>$typeCall,'date'=> $dataCall];
	}
	public function removePhoneInArrLP($id){ //удаление из списка
		
		foreach ($this->listPayer as $key=>$payer){
			if ($id == $payer['bill']->getId()){
				unset ($this->listPayer[$key]);
				break;
			}
		}
	}
	public function searchBySurnamePhone($surname,$telnumb){ //поик в списках по фамилии и номеру телефона
		$mas=[];
		foreach ($this->listPayer as $key=>$payer){
			$_bill=$payer['bill'];
			if (($surname == $_bill->getSurname()) and ($telnumb == $_bill->getTelephone() )){
				$mas[]=$payer;
			}
		}
		return ($mas); echo "<br>"; 
	}
	public function searchByDate($data){ //поиск по дате звонка
		$mas=[];
		foreach ($this->listPayer as $key=>$payer){
			$_date=$payer['date'];
			if ($data == $_date) {
				$mas[]=$payer;
			}
		}
		return ($mas); echo "<br>"; 
	}
	
	public function fullPrice(){ //расчет стоимости СПИСКА
		$fullSum = 0;
	 foreach ($this->listPayer as $key=>$payer){
			$_bill=$payer['bill'];
		 	$fullSum += $_bill->getAmount();
		}
		 return $fullSum; 
	}
	
	
	public function unionList ($list){ //объеденение списков 
		foreach($list->listPayer  as $newPayer){
			$issetPayer = false;
			foreach ($this->listPayer as $payer){
				if ($payer['bill']->getId() == $newPayer['bill']->getId()) $issetPayer = true;
				
			}
			if (!$issetPayer) $this->listPayer[]=$newPayer;
		}
		return ($this->listPayer);
	}
	

	
	public function crossingList ($list){ /*пересечение списков*/
		$lp3=[];
		foreach($list->listPayer  as $newPayer){
			$issetPayer = false;
			foreach ($this->listPayer as $payer){
				if ($payer['bill']->getId() == $newPayer['bill']->getId()) {
					$issetPayer = true;
				}
			}
			
			if ($issetPayer) $lp3[]=$newPayer; 
		}
		return $lp3;
	}

	
}
