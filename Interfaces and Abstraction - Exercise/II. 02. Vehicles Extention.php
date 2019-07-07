<?php

interface Drivable
{
    public function drive(float $distance): void;

    public function setDistanceTravelled(float $distance): void;

    public function getDistanceTravelled(): float;
}

interface AirConditioned
{
    public function getACStatus(): bool;
}

interface IPCV
{
    public function getPCVStatus(): bool;

    public function driveEmpty(float $distance): void;
}

interface Refuelable
{
    public function setFuel(float $liters): void;

    public function getFuel(): float;

    public function setFuelConsumption(float $literPerKm): void;

    public function getFuelConsumption(): float;

    public function setTankCapacity(float $tankCapacity): void;

    public function getTankCapacity(): float;

    public function isTankFillable(float $liters): bool;

    public function refuel(float $liters);

    public function fuelNeeded(float $distance): float;
}

abstract class Vehicle implements Drivable, Refuelable, AirConditioned
{
    protected const AC_MODIFIER = self::AC_MODIFIER;
    private $fuel = 0.;
    private $fuelConsumption;
    private $tankCapacity;
    private $distanceTravelled = 0;
    private $ACStatus;

    public function __construct(
        float $fuel,
        float $fuelConsumption,
        float $tankCapacity
    )
    {
        $this->setFuel($fuel);
        $this->setFuelConsumption($fuelConsumption);
        $this->setTankCapacity($tankCapacity);
    }

    public function drive(float $distance): void
    {
        $this->ACStatus = true;
        $litersNeeded = $this->fuelNeeded($distance);
        if ($litersNeeded > $this->getFuel()) {
            $class = basename(get_class($this));
            throw new \Exception("{$class} needs refueling");
        }
        $this->setFuel($this->getFuel() - $litersNeeded);
        $this->setDistanceTravelled(
            $this->getDistanceTravelled() + $distance
        );
        $class = basename(get_class($this));
        echo "{$class} travelled {$distance} km" . PHP_EOL;
    }

    public function setDistanceTravelled(float $distance): void
    {
        $this->distanceTravelled = $distance;
    }

    public function getDistanceTravelled(): float
    {
        return $this->distanceTravelled;
    }

    public function setFuel(float $liters): void
    {
        if ($liters <= 0) {
            throw new \Exception("Fuel must be a positive number");
        }
        $this->fuel = $liters;
    }

    public function getFuel(): float
    {
        return $this->fuel;
    }

    public function setFuelConsumption(float $literPerKm): void
    {
        $this->fuelConsumption = $literPerKm;
    }

    public function getFuelConsumption(): float
    {
        return $this->fuelConsumption;
    }

    public function setTankCapacity(float $tankCapacity): void
    {
        $this->tankCapacity = $tankCapacity;
    }

    public function getTankCapacity(): float
    {
        return $this->tankCapacity;
    }

    public function getACStatus(): bool
    {
        return $this->ACStatus;
    }

    public function isTankFillable(float $liters): bool
    {
        return $this->getFuel() + $liters > $this->tankCapacity;
    }

    public function fuelNeeded(float $distance): float
    {
        $fuelConsumption = $this->getFuelConsumption();
        if ($this->ACStatus === true) {
            $fuelConsumption += static::AC_MODIFIER;
        }
        return $distance * $fuelConsumption;
    }

    public function __toString()
    {
        $fuel = number_format($this->getFuel(), 2, ".", "");
        return basename(get_class($this)) . ": {$fuel}";
    }
}

class Bus extends Vehicle implements IPCV
{
    protected const AC_MODIFIER = 0.4;
    protected const AC_PCV_MODIFIER = 1.4;
    private $PCVStatus;

    public function drive(float $distance): void
    {
        $this->PCVStatus = true;
        parent::drive($distance);
    }

    public function driveEmpty(float $distance): void
    {
        $this->PCVStatus = false;
        parent::drive($distance);
    }

    public function refuel(float $liters)
    {
        if ($this->isTankFillable($liters)) {
            throw new Exception("Cannot fit fuel in tank");
        }
        $this->setFuel($this->getFuel() + $liters);
    }

    public function getPCVStatus(): bool
    {
        return $this->PCVStatus;
    }

    public function fuelNeeded(float $distance): float
    {
        $fuelConsumption = $this->getFuelConsumption();
        if ($this->PCVStatus === true) {
            $fuelConsumption += self::AC_PCV_MODIFIER;
        }
        return $distance * $fuelConsumption;
    }
}

class Car extends Vehicle
{
    protected const AC_MODIFIER = 0.9;

    public function drive(float $distance): void
    {
        parent::drive($distance);
    }

    public function refuel(float $liters)
    {
        if ($this->isTankFillable($liters)) {
            throw new Exception("Cannot fit fuel in tank");
        }
        $this->setFuel($this->getFuel() + $liters);
    }
}

class Truck extends Vehicle
{
    protected const AC_MODIFIER = 1.6;
    protected const FUEL_MODIFIER = 0.95;

    public function drive(float $distance): void
    {
        parent::drive($distance);
    }

    public function refuel(float $liters)
    {
        $this->setFuel($this->getFuel() + ($liters * self::FUEL_MODIFIER));
    }
}

class App
{
    private const CURRENT_VEHICLE_COUNT = 3;
    /**
     * @var Vehicle[]
     */
    private $vehicles = [];

    public function start(): void
    {
        $this->processInput();
        $this->initCommands();
        echo $this;
    }

    private function processInput(): void
    {
        $inputCount = self::CURRENT_VEHICLE_COUNT;
        while ($inputCount--) {
            $vehicleInput = explode(" ", trim(fgets(STDIN)));
            $vehicleType = array_shift($vehicleInput);
            $vehicleFullType = $vehicleType;
            $vehicleInput = array_map("floatval", $vehicleInput);
            try {
                $this->vehicles[$vehicleType] = new $vehicleFullType(...
                    $vehicleInput);
            } catch (Exception $e) {
                echo $e->getMessage() . PHP_EOL;
            }
        }
    }

    private function initCommands(): void
    {
        $cmdCount = (int)trim(fgets(STDIN));
        while ($cmdCount--) {
            $cmd = explode(" ", trim(fgets(STDIN)));
            $cmdToken = strtolower(array_shift($cmd));
            $cmdVehicleType = array_shift($cmd);
            $cmd = array_map("floatval", $cmd);
            try {
                $this->vehicles[$cmdVehicleType]->$cmdToken(...$cmd);
            } catch (Exception $e) {
                echo $e->getMessage() . PHP_EOL;
            }
        }
    }

    public function __toString()
    {
        return implode(PHP_EOL, $this->vehicles);
    }
}

$vehicleApp = new App();
$vehicleApp->start();
