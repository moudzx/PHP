<?php
include 'model.php';
class Country{
    public $name;
    public $area;
    public $population;

    public function __construct($name, $area, $population) {
        $this->name = $name;
        $this->area = $area;
        $this->population = $population;
    }
}

class Controller {
    public function addCountry($name, $area, $population) {
        addCountry($name, $area, $population);
    }

    public function getAllCountries() {
        return getAllCountries();
    }

    public function addBorder($borders) {
        addBorder($borders);
    }
    public function hasBorder($country1, $country2) {
        return hasBorder($country1, $country2);
    }
}
?>