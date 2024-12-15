<?php
class Windows7
{
    public function openFileInWindows7($program)
    {
        echo "Running '$program' on Windows 7";
    }
}

class Windows10
{
    public function openFileInWindows10($program)
    {
        echo "Running '$program' on Windows 10.";
    }
}

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

$programWindows7 = new Windows7();
$adapter = new ProgramAdapter($programWindows7);
$adapter->openFileInWindows10("Powerpoint");

$programWindows10 = new Windows10();
$programWindows10->openFileInWindows10("Word");
