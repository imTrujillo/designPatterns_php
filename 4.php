<?php
interface IMessageStrategy 
{
    public function displayMessage($message);
}
class JSON implements IMessageStrategy
{
    public function displayMessage($message)
    {
        echo  "The message displayed in JSON is: " . json_encode($message) . "<br>";
    }
}
class Console implements IMessageStrategy
{
    public function displayMessage($message)
    {
        echo "The message displayed in console is: $message <br>";
    }
}
class TXTFile implements IMessageStrategy
{
    public function displayMessage($message)
    {
        file_put_contents('message.txt', $message);
        echo "The message was saved as message.txt";
    }
}


class Message 
{
    public $strategy;

    public function messageOption(IMessageStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function displayMessage($message)
    {
        return $this->strategy->displayMessage($message);
    }
}

class User
{
    public $message;
    
    public function __construct($option, $displayedMessage)
    {
        $this->message = new Message();
        match ($option)
        {
            'json' => $this->message->messageOption(new JSON()),
            'console' => $this->message->messageOption(new Console()),
            'txt' => $this->message->messageOption(new TXTFile()),
            default => throw new Exception("The format isn't supported.")
        };

        $this->message->displayMessage($displayedMessage);
    }
}

try{
    $user = new User("json","Testing json option");
    $user = new User("console", "Testing console option");
    $user = new User("txt", "Testing Txt Option");
}
catch (Exception $ex)
{
    echo "The following exception was generated: " . $ex->getMessage();
}