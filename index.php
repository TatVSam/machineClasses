<?php

interface MachineInterface 
{
	public function goForward ();
    public function goBackwards();

}

abstract class Machine implements MachineInterface
{
    public $machineType;

    public function goForward ()
    {
	    echo $this->machineType . " движется вперед" . nl2br("\n");
    }

    public function goBackwards()
    {
	    echo $this->machineType . " движется назад" . nl2br("\n");
    }

    abstract public function specialBehavior ();

}



class Motorcar extends Machine
{
    public $machineType = "Motorcar";

 
    public function specialBehavior () 
    {
	    echo "Nitous Oxide System is on!" . nl2br("\n");
    }
}

class Bulldozer extends Machine
{
    public $machineType = "Бульдозер";

    public function specialBehavior () 
    {
	    echo $this->machineType . " двигает ковшом!";
    }

}

$machine_1 = new Motorcar();

function operateMachine (Machine $machine) 
{
    $machine->goForward();
    $machine->specialBehavior();
}

operateMachine ($machine_1);

$machine_2 = new Bulldozer();

operateMachine ($machine_2);

?>