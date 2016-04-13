<?php

/**
 * Description of Message
 *
 * @author jason_lee
 */
class Message
{
    public $name = null;
    public $time = null;
    public $content = null;

    function __construct($n, $t, $c)
    {
        $this->name = $n;
        $this->time = $t;
        $this->content = $c;
    }

    function show()
    {
        echo "<table><tr><td>Name:</td><td>" . $this->name . "</td></tr>";
        echo "<tr><td>Time:</td><td>" . $this->time . "</td></tr>";
        echo "<tr><td>Content:</td><td>" . $this->content . "</td></tr></table>";
        echo "==============================================<br>";
    }

}
