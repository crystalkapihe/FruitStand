<?php
/**
 * Class Fruit
 */

class Fruit
{
    protected $name;
    protected $price;
    protected $count;

    public function __construct($name, $price, $count = 0) {
        $this->name = $name;
        $this->price = $price;
        $this->count = $count;
    }


    // getters for protected properties
    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCount() {
        return $this->count;
    }

    public function getTotalValue() {
        return $this->price * $this->count;
    }

    // setters
    public function addFruit(int $count = 1) {
        $this->count += $count;
    }

    public function removeFruit(int $count = 1) {
        if ($count > $this->count) throw new OversoldError();
        $this->count -= $count;

    }

    // custom print statements
    public function printCost() {
        echo "<div>A $this->name costs $this->price</div>";
    }

    public function printQuantity() {
        echo "<div>There are $this->count $this->name</div>";
    }
}

// define individual fruits
class Apple extends Fruit
{
    public function __construct($count = 0) {
        parent::__construct("apple", 0.5, $count);
    }
}

class Banana extends Fruit
{
    public function __construct($count = 0) {
        parent::__construct("banana", 0.4, $count);
    }
}

class Orange extends Fruit
{
    public function __construct($count = 0) {
        parent::__construct("orange", 0.6, $count);
    }
}

class Kiwi extends Fruit
{
    public function __construct($count = 0) {
        parent::__construct("kiwi", 0.8, $count);
    }
}

class Grape extends Fruit
{
    public function __construct($count = 0) {
        parent::__construct("grape", 1.2, $count);
    }
}

class Pear extends Fruit
{
    public function __construct($count = 0) {
        parent::__construct("pear", 1.1, $count);
    }
}
