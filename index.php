<?php
require 'FruitStand.php';
require 'Fruit.php';
require 'OversoldError.php';

// create a new fruit stand with original inventory
$fruitStand = new FruitStand([
    new Apple(1),
    new Banana(1),
    new Orange(1),
    new Kiwi(1),
    new Grape(1),
]);
// print initial info
$fruitStand->printEachFruitValue();
$fruitStand->printInventory();
$fruitStand->printTotalInventoryValue();

// add and remove some fruit
$fruitStand->addFruit(new Kiwi(30));
$fruitStand->addFruit(new Pear(10));
$fruitStand->removeFruit(new Banana(1));
// print info again
$fruitStand->printEachFruitValue();
$fruitStand->printInventory();
$fruitStand->printTotalInventoryValue();

// try to sell too many apples
try {
    $fruitStand->removeFruit(new Apple(5));
} catch (Exception$e) {
    echo $e->getMessage();
}