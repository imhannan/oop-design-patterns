<?php
interface Stuff {
    public function admit();
    public function paySalary();
    public function setWorkingHour();
    public function resign();
}

abstract class FirstGradeStuff implements Stuff{
    public function admit(){}
    public function paySalary(){}
    public function setWorkingHour(){}
    public function resign(){}

    abstract function makeResult();

    abstract function takeExam();
}

abstract class SecondGradeStuff implements Stuff{
    public function admit(){}
    public function paySalary(){}
    public function setWorkingHour(){}
    public function resign(){}

    abstract function beautifyCampus();
}

class Teacher extends FirstGradeStuff {
    public function takeExam()
    {

    }

    public function makeResult()
    {

    }
}

class Principle extends FirstGradeStuff {
    public int $increment = 30;

    public function makeResult()
    {

    }

    public function takeExam()
    {

    }

    public function paySalary()
    {
        echo "paying salary with {$this->increment} percent increment".PHP_EOL;
    }
}

class Employee extends SecondGradeStuff {
    public function beautifyCampus()
    {

    }
}



class StuffManager{
    public function generalWork(Stuff $stuff)
    {
        $stuff->admit();
        $stuff->paySalary();
        $stuff->setWorkingHour();
    }

    public function exam(FirstGradeStuff $firstGradeStuff)
    {
        $firstGradeStuff->takeExam();
        $firstGradeStuff->makeResult();
    }
}

$principle = new Principle();
$sm = new StuffManager();
$sm->generalWork($principle);
$sm->exam($principle);
