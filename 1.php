<?php
//User Class
class UserCharacter 
{
    public $name;
    public $hp;
    public $level;

    public function __construct($name,$hp, $level)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->level=$level;
    }

}

//FACTORY METHOD
class EnemiesFactory
{
    public static function spawnEnemy($user) : Stats
    {
        if ($user->level > 0 && $user->level <= 3)
        {
            return new Skeleton();
        }
        else if ($user->level > 3 && $user->level <= 30)
        {
            return new Zombie();
        }
        else
        {
            throw new Exception("The enemy couldn't be spawned <br>");
        }
    }
}

interface Stats
{
    public function attack($user);
    public function speed();
}

//Products Classes
class Zombie implements Stats
{
    public function attack($user)
    {
        
        if ($user->hp >= 0 && $user->hp <= 100)
        {
            echo "The zombie attacks $user->name and removes 20HP. <br>";
            $user->hp -= 20;
            if ($user->hp <= 0)
                echo "$user->name has died. <br> Game Over :(. <br>";
            else
                echo "$user->name has $user->hp HP. <br>"; 
        }
        else
        {
            throw new Exception("The HP isn't within the range 0-100. <br>");
        }
    }
    public function speed()
    {
        echo "The zombie runs at 40km/h. <br>";
        return 40;
    }
}

class Skeleton implements Stats
{
    public function attack($user)
    {
        
        if ($user->hp >= 0 && $user->hp <= 100)
        {
            echo "The skeleton attacks $user->name and removes 10HP. <br>";
            $user->hp -= 10;
            if ($user->hp <= 0)
                echo "$user->name has died. <br> Game Over :( <br>.";
            else
                echo "$user->name has $user->hp HP. <br>"; 
        }
        else
        {
            throw new Exception("The HP isn't within the range 0-100.<br>");
        }
    }
    public function speed()
    {
        echo "The skeleton runs at 20km/h.<br>";
        return 20;
    }
}

try{
    $character = new UserCharacter("Mario",100,24); //Create a user
    $spawnEnemy = EnemiesFactory::spawnEnemy($character); //spawn enemy
    $spawnEnemy->attack($character); //The enemy attacks the user
    $spawnEnemy->speed(); //show details about enemy speed

    $character->level = 2; //update the user's level
    $spawnEnemy2 = EnemiesFactory::spawnEnemy($character);
    $spawnEnemy2->attack($character);
    $spawnEnemy2->speed();

    $character->level = 30;
    $spawnEnemy = EnemiesFactory::spawnEnemy($character);
    $spawnEnemy->attack($character);
    $spawnEnemy->attack($character);
    $spawnEnemy->attack($character);
    $spawnEnemy->attack($character); //when the user's hp is equal or less than 0, it's game over

    $character2 = new UserCharacter("Camilo",200,4); //the user's hp has to be within 0-100
    $spawnEnemy = EnemiesFactory::spawnEnemy($character2);
    $spawnEnemy->attack($character2);

    $character->level = 100;
    $spawnEnemy3 = EnemiesFactory::spawnEnemy($character);
    $spawnEnemy3->attack($character);
}
catch (Exception $ex){
    echo "Error: " . $ex->getMessage();
}
?>
