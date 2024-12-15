<?php

interface ICharacter
{
    public function addWeapon();
}

//User class
class GameCharacter implements ICharacter
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function addWeapon()
    {
        return "The user: $this->name have the weapons: ";
    }
}

//Decorator class
class CharacterDecorator implements ICharacter
{
    public $character;

    public function __construct(ICharacter $character)
    {
        $this->character = $character;
    }
    public function addWeapon()
    {
        return $this->character->addWeapon();
    }
}

//Add items to the user
class SwordDecorator extends CharacterDecorator
{
    public function addWeapon()
    {
        return $this->character->addWeapon() . 'a diamond sword, ';
    }
}

class BowDecorator extends CharacterDecorator
{
    public function addWeapon()
    {
        return $this->character->addWeapon() . 'a bow, ';
    }
}

class KnifeDecorator extends CharacterDecorator
{
    public function addWeapon()
    {
        return $this->character->addWeapon() . 'a knife, ';
    }
}

class TorpedoDecorator extends CharacterDecorator
{
    public function addWeapon()
    {
        return $this->character->addWeapon() . 'a torpedo, ';
    }
}

$character = new GameCharacter("Peeta Mellark"); //The user is created
echo $character->addWeapon() . "<br>"; //A new weapon is added into the user's equipment

$bow = new BowDecorator($character);
echo $bow->addWeapon(). "<br>";

$sword = new SwordDecorator($bow);
echo $sword->addWeapon() . "<br>";

$torpedo = new TorpedoDecorator($sword);
echo $torpedo->addWeapon() . "<br>" . "<br>";


$character2 = new GameCharacter("Katniss");
echo $character2->addWeapon() . "<br>";

$bow2 = new BowDecorator($character2);
echo $bow2->addWeapon() . "<br>";

$knife = new KnifeDecorator($bow2);
echo $knife->addWeapon() . "<br>" . "<br>";


