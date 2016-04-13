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
        include_once('MsgBoard.php');
        $mb = new MsgBoard();
        ?>
    </body>
</html>
