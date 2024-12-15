<?php

interface ICharacter
{
    public function addWeapon();
}


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

$character = new GameCharacter("Peeta Mellark");
echo $character->addWeapon() . "<br>";

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


