<?php

class Juice implements JuiceInterface
{
    public $name;
    public function getName()
    {
        return $this->name;
    }
    public function prepare()
    {
        return 'Preparing ' . $this->name;
    }
    public function pour()
    {
        return 'Pouring ' . $this->name;
    }
    public function mix()
    {
        return 'Mixing ' . $this->name;
    }
    public function getResult()
    {
        return $this->prepare() . PHP_EOL . $this->pour() . PHP_EOL . $this->mix() . PHP_EOL;
    }
}

interface JuiceInterface
{
    public function getName();
    public function prepare();
    public function pour();
    public function mix();
    public function getResult();
}

class AppleJuice extends Juice
{
    public function __construct()
    {
        $this->name = 'Apple Juice';
    }
}

class OrangeJuice extends Juice
{
    public function __construct()
    {
        $this->name = 'Orange Juice';
    }
}

class GrapeJuice extends Juice
{
    public function __construct()
    {
        $this->name = 'Grape Juice';
    }
}

class JuiceFactory extends Factory
{
    public function make($type): Juice
    {
        $juice = null;
        switch ($type) {
            case 'apple':
                $juice = new AppleJuice();
                break;
            case 'orange':
                $juice = new OrangeJuice();
                break;
            case 'grape':
                $juice = new GrapeJuice();
                break;
        }
        return $juice;
    }
}

abstract class Factory
{
    abstract public function make($type): JuiceInterface;
}

$juiceFactory = new JuiceFactory();

$appleJuice = $juiceFactory->make('apple');

echo $appleJuice->getResult();
