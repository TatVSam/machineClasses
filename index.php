<?php

declare(strict_types=1);

interface MachineInterface 
{
	public function goForward ();
    public function goBackwards();
    public function signal ();
    public function specialBehavior ();

}

abstract class Machine implements MachineInterface
{
    
    protected $machineType;

    public function goForward ()
    {
	    echo $this->machineType . " движется вперед." . "\n";
    }

    public function goBackwards()
    {
	    echo $this->machineType . " движется назад." . "\n";
    }

    public function signal ()
    {
	    echo $this->machineType . " сигналит." . "\n";  
    }

    abstract public function specialBehavior ();

}


class Motorcar extends Machine
{
    protected $machineType = "Легковой автомобиль";
    //индивидуальная особенность
    public const specialTrait = "Цвет";
    //значения индивидуальных особенностей задаются с помощью сеттеров
    private $specialTrait_color = "зеленый"; 

    public function getColor ()
    {
	    return $this->specialTrait_color . "\n";
    }

    public function setColor (string $specialTrait_color)
    {
	    $this->specialTrait_color = $specialTrait_color;
    }

    //особенное поведение для каждого класса
    public function specialBehavior () 
    {
	    echo $this->machineType . " включил систему закиси азота!" . "\n";
    }
    //легковые автомобили и грузовики могут включать дворники
    public function activateWipers () 
    {
	    echo $this->machineType . " включил дворники!" . "\n";
    }
}

class Bulldozer extends Machine
{
    protected $machineType = "Бульдозер";

    public const specialTrait = "Марка";

    private $specialTrait_brand = "Hitachi"; 

    public function getBrand ()
    {
	    return $this->specialTrait_brand . "\n";
    }

    public function setBrand (string $specialTrait_brand)
    {
	    $this->specialTrait_brand = $specialTrait_brand;
    }

    public function specialBehavior () 
    {
	    echo $this->machineType . " двигает ковшом!" . "\n";
    }

  public function activateWipers () 
    {
	    echo $this->machineType . " включил дворники!" . "\n";
    }

}


class Truck extends Machine
{
    protected $machineType = "Грузовик";

    public const specialTrait = "Грузоподъемность в тоннах";

    private $specialTrait_tonnage = 8; 

    public function getTonnage ()
    {
	    return $this->specialTrait_tonnage . "\n";
    }

    public function setTonnage (float $specialTrait_tonnage)
    {
	    $this->specialTrait_tonnage = $specialTrait_tonnage;
    }


    public function specialBehavior () 
    {
	    echo $this->machineType . " откидывает кузов!" . "\n";
    }

    public function activateWipers () 
    {
	    echo $this->machineType . " включил дворники!" . "\n";
    }

}

class Tractor extends Machine
{
    protected $machineType = "Трактор";

    public const specialTrait = "Двигатель";

    private $specialTrait_engine = "Kubota"; 

    public function getEngine ()
    {
	    return $this->specialTrait_engine . "\n";
    }

    public function setEngine (string $specialTrait_engine)
    {
	    $this->specialTrait_engine = $specialTrait_engine;
    }

    public function specialBehavior () 
    {
	    echo $this->machineType . " начал обработку поля!" . "\n";
    }

  public function activateWipers () 
    {
	    echo $this->machineType . " включил дворники!" . "\n";
    }

}

class Tank extends Machine
{
    protected $machineType = "Танк";

    public const specialTrait = "Оружие";

    private $specialTrait_weapon = "2А46"; 

    public function getWeapon ()
    {
	    return $this->specialTrait_weapon . "\n";
    }

    public function setWeapon (string $specialTrait_weapon)
    {
	    $this->specialTrait_weapon = $specialTrait_weapon;
    }

    public function specialBehavior () 
    {
	    echo $this->machineType . " стреляет!" . "\n";
    }

}

//полиморфная функция
function operateMachine (Machine $machine) 
{
    $machine->goForward();
    $machine->specialBehavior();
}

$machine_1 = new Motorcar();

operateMachine ($machine_1);

$machine_2 = new Bulldozer();

operateMachine ($machine_2);

$machine_3 = new Tank();

operateMachine ($machine_3);

$machine_1->activateWipers();

$machine_2->signal();

echo $machine_1::specialTrait . " - " . $machine_1->getColor();
$machine_1->setColor("красный");
echo $machine_1::specialTrait . " - " . $machine_1->getColor();


?>