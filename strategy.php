<?php
interface TravelStrategy
{
    public function travel();
}

class BusTravelStrategy implements TravelStrategy
{
    public function travel()
    {
        // Bus travel strategy will goes here
        echo 'Bus is traveling...'.PHP_EOL;
    }
}

class TrainTravelStrategy implements TravelStrategy
{
    public function travel()
    {
        // Train travel strategy will goes here
        echo 'Train is traveling....'.PHP_EOL;
    }
}

class PlaneTravelStrategy implements TravelStrategy
{
    public function travel()
    {
        // Plane travel strategy will goes here
        echo 'Plane is traveling...'.PHP_EOL;
    }
}

//main context class
class Traveler
{
    protected $traveler;

    public function __construct(TravelStrategy $traveler)
    {
        $this->traveler = $traveler;
    }

    public function travel()
    {
        $this->traveler->travel();
    }
}
//implement strategy
$traveler = new Traveler(new BusTravelStrategy());
$traveler->travel();

$traveler1 = new Traveler(new PlaneTravelStrategy());
$traveler1->travel();