<?php

class SnukeIce {
    // Instance members
    private $milkSolids;
    private $milkFat;

    // Default constructors
    public function __construct($milkSolids, $milkFat) {
        $this->milkSolids = $milkSolids;
        $this->milkFat = $milkFat;
    }

    // Getters & Setters
    public function getMilkSolids() {
        return $this->milkSolids;
    }
    public function setMilkSolids($milkSolids) {
        $this->milkSolids = $milkSolids;
    }
    public function getMilkFat() {
        return $this->milkFat;
    }
    public function setMilkFat($milkFat) {
        $this->milkFat = $milkFat;
    }

    // Processors
    public function getCategory() {
        $totalMilkSolids = $this->milkSolids + $this->milkFat;

        if ($totalMilkSolids >= 15 && $this->milkFat >= 8) {
            return "Ice cream";
        } elseif ($totalMilkSolids >= 10 && $this->milkFat >= 3) {
            return "Ice milk";
        } elseif ($totalMilkSolids >= 3) {
            return "Lacto ice";
        } else {
            return "Flavored ice";
        }
    }
}

?>