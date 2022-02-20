<?php
interface Bird{
    public function eat();

    public function sleep();
}

class BirdManager {

    public function manage(Bird $bird)
    {
        $bird->eat();
        $bird->sleep();
    }

    public function fly(FlyingBird $flyingBird)
    {
        $flyingBird->fly();
    }

    public function walk(WalkingBird $walkingBird)
    {
        $walkingBird->walk();
    }
}

abstract class FlyingBird implements Bird{
    public int $height = 30;
    abstract public function fly();

    public function eat()
    {
        echo "eating...";
    }

    public function sleep()
    {
        echo "sleeping...";
    }
}

abstract class WalkingBird implements Bird{
    public float $speed = 40.3;
    abstract public function walk();

    public function sleep()
    {
        echo 'sleeping...';
    }

    public function eat()
    {
        echo 'eating...';
    }
}

class Eagle extends FlyingBird {
    public function fly()
    {
        echo "This bird is flying above {$this->height}m".PHP_EOL;
    }
}

class Penguin extends WalkingBird {
    public function walk()
    {
        echo "This bird is walking at {$this->speed} per hour speed".PHP_EOL;
    }
}

$birdManager = new BirdManager();
$penguin = new Penguin();
$birdManager->manage($penguin);
$birdManager->fly(new Eagle());
