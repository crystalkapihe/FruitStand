<?php
/**
 * Class FruitStand
 * It didn't make sense to me to only have one of each fruit in a fruit stand, so I added counts of the fruits
 */
class FruitStand
{
    // TBH, unless this property is used a lot, I'd probably just opt to calculate it on the fly when needed
    private $totalInventoryValue = 0;
    private $fruits = [];


    /**
     * FruitStand constructor. Add all the fruits to the fruit stand
     * @param array $inventory
     */
    public function __construct(array $inventory = []) {
        foreach ($inventory as $inv) {
            if (is_a($inv, "Fruit")) {
                $this->addFruit($inv);
            }
        }
    }

    /**
     * Print each fruit value
     */
    public function printEachFruitValue() {
        foreach ($this->fruits as $fruit) {
            $fruit->printCost();
        }
    }

    /**
     * print total inventory value
     */
    public function printTotalInventoryValue() {
        echo "<div>Total inventory value is $this->totalInventoryValue</div>";
    }

    /**
     * Print the quantity of each fruit
     */
    public function printInventory() {
        foreach ($this->fruits as $fruit) {
            $fruit->printQuantity();
        }
    }

    /**
     *
     * Add a fruit to the fruit array and increment the inventory value
     *
     * @param Fruit $newFruit The new fruit to add to the fruit stand
     */
    public function addFruit(Fruit $newFruit) {
        // add the fruit value to the existing value
        $this->totalInventoryValue += $newFruit->getTotalValue();
        // try to add to exiting count
        foreach ($this->fruits as $oldFruit) {
            // we will assume that if they have the same name and price, they are the same fruit
            if ($newFruit->getName() == $oldFruit->getName() && $newFruit->getPrice() == $oldFruit->getPrice()) {
                $oldFruit->addFruit($newFruit->getCount());
                return;
            }
        }
        // if fruit isn't found, add it as new fruit
        $this->fruits[] = $newFruit;
    }

    /**
     * Remove a fruit from the fruit array and decrement the inventory value
     *
     * @param Fruit $fruit
     * @throws OversoldError
     */
    public function removeFruit(Fruit $fruit) {
        // try to remove from exiting count
        foreach ($this->fruits as $oldFruit) {
            if ($fruit->getName() == $oldFruit->getName()) {
                $oldFruit->removeFruit($fruit->getCount());
                $this->totalInventoryValue -= $fruit->getTotalValue();
                return;
            }
        }
        // if fruit isn't found, you can't sell it
        throw new OversoldError();

    }
}
