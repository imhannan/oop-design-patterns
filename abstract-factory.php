<?php

interface VehicleInterface
{
    public function getName();

    public function drive();
}

class Car implements VehicleInterface
{

    public function __construct(public string $name = 'car')
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function drive(): string
    {
        return 'Driving ' . $this->name;
    }
}

class Truck implements VehicleInterface
{
    public string $name;

    public function getName()
    {
        return $this->name;
    }

    public function drive()
    {
        return 'Driving ' . $this->name;
    }
}


abstract class Factory
{
    abstract public function make(): VehicleInterface;
}

class CarFactory extends Factory
{
    public function make(): VehicleInterface
    {
        return new Car();
    }

}

class TruckFactory extends Factory
{
    public function make(): VehicleInterface
    {
        return new Truck();
    }
}

abstract class AbstractVehicleFactroy
{
    abstract public function makeVehicleFactory($type);
}

class VehicleFactory extends AbstractVehicleFactroy
{
    public function makeVehicleFactory($type)
    {
        $factory = null;
        switch ($type) {
            case 'car':
                $factory = new CarFactory();
                break;
            case 'truck':
                $factory = new TruckFactory();
                break;
        }
        return $factory;
    }
}

$carFactory = new VehicleFactory();

$car = $carFactory->makeVehicleFactory('car')->make();

echo $car->drive();
