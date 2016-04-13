<!DOCTYPE html>
<!--
Jason Lee
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>MessageBoard</title>
    </head>
    <body>
        <form action='' method='POST' >
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type='text' name='userName' </td>
                </tr>
                <tr>
                    <td>Content:</td>
                    <td><textarea name='content' rows='6' cols='30'></textarea></td>
                </tr>
            </table>
            <input type='submit' >
        </form>
        <?php
        include_once('Message.php');
        include_once('Database.php');

        class MsgBoard extends Database {

            var $messages = array();

            function __construct() {
//                $this->showForm();
                parent::__construct();
                $this->receiveMsg();
                $this->loadData();
                $this->showAllMsg();
            }

            function receiveMsg() {
                if (count($_POST) != 0) {
                    $this->saveData($_POST['userName'], date('Y-m-d h:i:s', time()), $_POST['content']);
                }
            }

            function saveData($n, $t, $c) {
                $query = "INSERT INTO all_messages (name, time, content) VALUES ('" . $n . "', '" . $t . "', '" . $c . "');";
                mysql_query($query);
            }

            function loadData() {
                $query = "SELECT * FROM all_messages ORDER BY id DESC;";
                $result = mysql_query($query);
                while ($row = mysql_fetch_array($result)) {
                    $temp = new Message($row['name'], $row['time'], $row['content']);
                    array_push($this->messages, $temp);
                }
            }

            function showForm() {
                echo "<form action='' method='POST' ><table>";
                echo "<tr><td>Name:</td>" . "<td><input type='text' name='userName' ></td></tr>";
                echo "<tr><td>Content:</td>" . "<td><textarea name='content' rows='6' cols='30'></textarea></td></tr>";
                echo "</table><input type='submit' >";
                echo "</form>";
            }

            function showAllMsg() {
                foreach ($this->messages as $m) {
                    $m->show();
                }
            }

        }

        $mb = new MsgBoard();
        ?>
    </body>
</html>
