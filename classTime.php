<?php
class Time{
	public $hour;
	public $minute;
	public $second;
	
	function __construct($hour,$minute,$second){ /*»инициализация числами*/
		$this->hour=$hour;
		$this->minute=$minute;
		$this->second=$second;
		if (($this->hour >= 60) or ($this->minute >= 60) or ($this->second >= 60) or ($this->hour < 0) or ($this->minute < 0) or ($this->second < 0)) {
			echo ("ERROR. ѕараметры времени должны быть меньше 60 и больше 0!"."<br>");
		}
	}
	public static function getByString($q){  /*инициализация строкой*/
		list($hour, $minute, $second) = explode(":",$q);
		$time = new Time($hour, $minute, $second); 
		return $time; /*возращение зачени¤ объекта*/
	}
   public static function getBySeconds($seconds){ /*инициализация секундами*/
		$hour = floor($seconds/3600);
		$second = floor($seconds - ($hour*3600));
		$minute = floor($second/60);
		$second = $second - ($minute*60);
	  	$time = new Time($hour,$minute,$second);
		return $time;
   }
	public function turnToSeconds(){ /*перевод времени в секунды*/
		$h=(int)($this->hour);
		$m=(int)($this->minute);
		$s=(int)($this->second);
		$secondy = (int)($h*3600+$m*60+$s);
		return $secondy;
	}
	public function differenceBetweenTime($time){ /*разница в секундах между двумя временами*/
		$diffrence=($this->turnToSeconds())-($time->turnToSeconds());
		var_dump (abs($diffrence)); echo "<br>";
		return abs($diffrence);
	}
	public function additionWithSeconds($addTime){ /*сложение времени с секундами*/
		$addition=($this->turnToSeconds())+($addTime);
		$add= Time::getBySeconds($addition);
		var_dump ($add); echo "<br>";
		return ($add);
	}
	public function differenceWithSeconds($subtractTime){ /*вычетание времени с секундами*/
		$difference=($this->turnToSeconds())-($subtractTime);
		$diff= Time::getBySeconds($difference);
		var_dump ($diff); echo "<br>";
		return ($diff);
	}
	public function compareMoments($comparisonTime){ /*сравнение моментов времени*/
		$thefirst=($this->turnToSeconds());
		$thesecond=($comparisonTime->turnToSeconds());
		if ($thefirst > $thesecond) { echo "Первое время больше!"."<br>";}
			else { echo "Второе время больше!"."<br>";}
	}
	public function turnToMinutes(){ /*перевод времени в минуты*/
		$h=(int)($this->hour);
		$m=(int)($this->minute);
		$s=(int)($this->second);
		
		$minutes = (int)($h*3600+$m+floor($s/60));
		return $minutes;
	}	
}
/*
$time1=new Time('0','2','59');
$time2=new Time('0','0','13');
	
	
$time1->differenceBetweenTime($time2);

$timeForMath=20;
$time1->additionWithSeconds($timeForMath);

$time1->differenceWithSeconds($timeForMath);

$time1->compareMoments($time2);

$time1->turnToMinutes();

var_dump ($time1); echo "<br>";
$time10="11:20:45";
$time4= Time::getByString($time10); 
var_dump ($time4); echo "<br>";
$secondS=66;
$time5= Time::getBySeconds($secondS); 
var_dump ($time5); echo "<br>";
*/