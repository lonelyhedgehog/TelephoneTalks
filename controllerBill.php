<?php
require_once 'classTime.php';
require_once 'classBill.php';
require_once 'classListOfPayers.php';
$bill1 = new Bill('1','Иванов','89046573185','1.52','15',new Time('0','13','23'),new Time('0','17','04'));
//echo  "You need to pay  ".$bill1->getAmount()."  rub"; echo "<br>";
$bill2 = new Bill('2','Сидоров','89253748532','3','5',new Time('13','00','30'),new Time('14','25','40'));
//echo  "You need to pay  ".$bill2->getAmount()."  rub"; echo "<br>";
echo "<br>";
//$bill3 = new Bill('3','Теплов','89114568716','2.75','30',new Time('17','50','24'),new Time('17','53','40'));
//$bill4 = new Bill('4','Иванов','89046573185','3','10',new Time('10','20','23'),new Time('0','17','04'));


$arrLP[]=['bill'=> $bill1 ,'type'=>'long-distanse', 'date'=>'2016-07-08']; //масси, где храним объект Звонка, откуда можно вытянуть се, что нужно, тип зонка и дату.
$arrLP[]=['bill'=> $bill2 ,'type'=>'phone call', 'date'=>'2016-07-09'];
//$arrLP[]=['bill'=> $bill3,'type'=>'phone call', 'date'=>'2016-07-05'];
//$arrLP[]=['bill'=> $bill4,'type'=>'phone call', 'date'=>'2016-07-08'];


$bill5 = new Bill('1','Иванов','89046573185','1.52','15',new Time('0','13','23'),new Time('0','17','04'));
//echo  "You need to pay  ".$bill1->getAmount()."  rub"; echo "<br>";
$bill6 = new Bill('6','Пушкин','89046573185','3','5',new Time('13','06','30'),new Time('14','25','40'));
//echo  "You need to pay  ".$bill2->getAmount()."  rub"; echo "<br>";
echo "<br>";
$arrLP2[]=['bill'=> $bill5 ,'type'=>'long-distanse', 'date'=>'2016-07-08'];
$arrLP2[]=['bill'=> $bill6 ,'type'=>'phone call', 'date'=>'2016-07-09'];
//$arrLP2[]=['bill'=> $bill2 ,'type'=>'long', 'date'=>'2016-07-08'];




//объек СПисок звонков, который содержит масси, дату создания и порядковый номер
$listOfPayers1 = new ListPayers($arrLP,'2016-07-12','1');
$listOfPayers2 = new ListPayers($arrLP2,'2016-07-13','2');

//создаем новыый объект Bill, тип зонка, дату
$bill4 = new Bill('7','Ivanyuk','8800253535','5.75','15',new Time('17','10','24'),new Time('17','33','40'));
$typeCall = "phonecall";
$dataCall = "2016-07-12";


//$listOfPayers1->AddPhoneInArrLP($bill4, $typeCall, $dataCall); //добавляем 
//var_dump ($listOfPayers1);


//$listOfPayers1->removePhoneInArrLP($bill4->getId()); //удаляем
//var_dump ($listOfPayers1);


//данные для поиска по фамилии и телефону
$surname = "Иванов";
$telephone = "89046573185";
//$telephone1 = "88002253535";

//$listOfPayers1->searchBySurnamePhone($surname,$telephone);
//$listOfPayers1->searchBySurnamePhone($surname,$telephone1);

//дата для поиска
$searchDate = '2016-07-08';
//$searchDate1 = '2017-07-12';

//$listOfPayers1->searchByDate($searchDate);
//$listOfPayers1->searchByDate($searchDate1);

//echo "Общая сумма к  оплате по списку № ".$listOfPayers1->getListNumber()." от ".$listOfPayers1->getDateOfCreation()." равна ". $listOfPayers1->fullPrice(); echo "<br>"; echo "<br>";


//$listOfPayers1->unionList($listOfPayers2); echo "<br>";
//print_r ($listOfPayers1->unionList($listOfPayers2)); echo "<br>";
print_r ($listOfPayers1->crossingList($listOfPayers2)); echo "<br>";