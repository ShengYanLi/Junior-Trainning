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

    function show($s)
    {
        echo "==============================================<br>";
        echo "<table><tr><td>Name:</td><td>" . $this->name . "</td></tr>";
        echo "<tr><td>Time:</td><td>" . $this->time . "</td></tr>";
        echo "<tr><td>Content:</td><td>" . $this->content . "</td></tr></table>";
        echo "<form action='' method='POST' >";
        echo "<textarea name='content' rows='2' cols='20' style='margin-left:10ex'></textarea>";
        echo "<input type='text' name='parent' value='".$s."' style='display:none'>";
        echo "<input type='submit' value='回覆'></form>";
    }

    function showReply()
    {
        echo "<div style='margin-left:10ex'>---------------------------------------------------------<br>";
        echo "<table><tr><td>Name:</td><td>" . $this->name . "</td></tr>";
        echo "<tr><td>Time:</td><td>" . $this->time . "</td></tr>";
        echo "<tr><td>Content:</td><td>" . $this->content . "</td></tr></table>";
        echo "</div>";
    }

}
