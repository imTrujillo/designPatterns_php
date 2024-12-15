<?php
//old System
class Windows7
{
    public function openFileInWindows7($program)
    {
        echo "Running '$program' on Windows 7";
    }
}

//modern System
class Windows10
{
    public function openFileInWindows10($program)
    {
        echo "Running '$program' on Windows 10.";
    }
}

//adapter class
class ProgramAdapter
{
    private $windows7;

    public function __construct(Windows7 $windows7)
    {
        $this->windows7 = $windows7;
    }

    public function openFileInWindows10($program)
    {
        $this->windows7->openFileInWindows7($program);
        echo ", now is adapted for Windows 10. <br>";
    }
}

$programWindows7 = new Windows7(); //the old system is created
$adapter = new ProgramAdapter($programWindows7); //the program of the old system is adapted
$adapter->openFileInWindows10("Powerpoint"); //the adapter opens the outdated program on the modern system

$programWindows10 = new Windows10(); //the new system is created
$programWindows10->openFileInWindows10("Word"); //the program is opened on windows 10
