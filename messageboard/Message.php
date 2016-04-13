<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message
 *
 * @author jason_lee
 */
class Message {

    var $name;
    var $time;
    var $content;

    function __construct($n, $t, $c) {
        $this->name = $n;
        $this->time = $t;
        $this->content = $c;
    }

    function show() {
        echo "<table><tr><td>Name:</td><td>" . $this->name . "</td></tr>";
        echo "<tr><td>Time:</td><td>" . $this->time . "</td></tr>";
        echo "<tr><td>Content:</td><td>" . $this->content . "</td></tr></table>";
        echo "==============================================<br>";
    }

}
