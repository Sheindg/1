<?php
class Vehicle {
	protected $size;
	protected $weight;
	protected $weightFull;
	protected $vMotor;
	protected $fuel;
	  
public function taxCal($tax) {
return $this->vMotor * $tax * 10 + $this->weight * 0.1;
}
		
public function setWeight($value) { $this->weight=$value; }
public function setWeightFull($value) { $this->weightFull=$value; }
public function setVMotor($value) { $this->vMotor = $value; }
		
public function info () {
	return array (
		'size'=>$this->size,
		'weight'=>$this->weight,
		'weightFull'=>$this->weightFull,
		'vMotor'=>$this->vMotor,
		'fuel'=>$this->fuel,
	);
}
}	
	
class Car extends Vehicle{
	protected $transmission;
	protected $passengers;
	protected $bodyType;
		   			
public function info () {
	 return array_merge (parent::info(), array (
		'transmission'=>$this->transmission,
		'passengers'=>$this->passengers,
		'bodyType'=>$this->bodyType,
	)	);
}
}
		
class Truck extends Vehicle{
	protected $trailerWeight;
	protected $sumAxles;
	
public function info () {
	return array_merge (parent::info(), array (
		'trailerWeight'=>$this->trailerWeight,
		'sumAxles'=>$this->sumAxles,
	)	);
}
}
		
class Compact extends Car{
	protected $weightMax;
	protected $taxLitr;
}	
	
class Business extends Car{
	protected $weightMax;
	protected $taxLitr;
}	
		
class SUV extends Car{
	protected $weightMax;
	protected $taxLitr;
}	

class Light extends Truck{
	protected $weightMax;
	protected $taxLitr;
}	
		
class Heavy extends Truck{
	protected $weightMax;
	protected $taxLitr;
}
	
		
if (isset ($_POST["weight"], $_POST["motor_v"], $_POST["weightFull"])) {
	$weight =  (int) $_POST["weight"];
	$weightFull =  (int) $_POST["weightFull"];
	$vMotor = (float) $_POST["motor_v"];
	}
	if ($weight<1000) {
		echo "!!! Введёна слишком маленькая масса</br>";
		return;
	}
	if ($weightFull>22000) {
		echo "!!! Введёна слишком большая полная масса</br>"; 
		return;
	}
		else if ($weightFull<=22000 && $weightFull>5000) {
			$tax=30;
			$veh = new Truck ($weight, $weightFull, $vMotor, $tax);
		}
			else if ($weightFull<=5000 && $weightFull>2700) {
				$tax=25;
				$veh = new Truck ($weight, $vMotor, $weightFull, $tax);
			}
				else 
				{
					switch ($weight) {
						case (1000<=$weight && $weight<=1300); $tax=10; $veh = new Car ($weight, $vMotor, $weightFull, $tax); break;
						case ($weight<=1700); $tax=15; $veh = new Car ($weight, $vMotor, $weightFull, $tax); break;
						case ($weight<=2700); $tax=20; $veh = new Car ($weight, $vMotor, $weightFull, $tax); break;
					default: echo "!!! Введёна не корректная масса </br>"; 
					return;
					} 
}
      
	$veh->setWeight ($weight);
	$veh->setWeightFull ($weightFull);
	$veh->setVMotor ($vMotor);
	$taxSum = $veh->taxCal($tax);
  
echo 'Налог на транспортное средство: '.'</br>'.$tax; 
echo 'Характеристики: </br>';
foreach ($veh->info() as $key => $value)
	echo $key.' => '.(isset ($value) ? $value : 'не определено').'</br>';
  	
?>	