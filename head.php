<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if (isset($_POST["send"])) {
    $from = htmlspecialchars($_POST["from"]);
    $to = htmlspecialchars($_POST["to"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);
    $_SESSION["from"] = $from;
    $_SESSION["to"] = $to;
    $_SESSION["subject"] = $subject;
    $_SESSION["message"] = $message;
    $error_from = "";
    $error_to = "";
    $error_subject = "";
    $error_message = "";
    $error = false;
    if ($from == "" || !preg_match("/@/", $from)) {
        $error_from = "Введите корректный email";
        $error = true;
    }
    if ($to == "" || !preg_match("/@/", $to)) {
        $error_to = "Введите корректный email";
        $error = true;
    }
    if (strlen($subject) == 0) {
        $error_subject = "Введите корректную тему";
        $error = true;
    }
    if (strlen($message) == 0) {
        $error_message = "Введите корректное сообщение";
        $error = true;
    }
    if (!$error) {
        $subject = "=?utf-8?B?" . base64_encode($subject) . "?=";
        $headers = "From : $from\r\nReply-to: $from\r\nContent-type: text/pain; charset = utf-8\r\n";
        mail($to, $subject, $message, $headers);
        /*header("Location : success.php");
        exit();*/
    }
}
?>


<!DOCTUPE html>
<html>
    <head>
        <title>Обратная связь </title>
    </head>
    <body>
        <h2>Форма обратной связи нах</h2>
        <form name="feedback" action="" method="post">

            <label>От кого:</label>
            <br/>
            <input type="text" name="from" value="<?= $_SESSION["from"] ?>" />
            <span style="color:red"><?= $error_from ?></span><br/>
            <label>Кому:</label>
            <br/>
            <input type="text" name="to" value="<?= $_SESSION["to"] ?>" />
            <span style="color:red"><?= $error_to ?></span>
            <br/>
            <label>Тема:</label>
            <br/>
            <input type="text" name="subject" value="<?= $_SESSION["subject"] ?>"/>
            <span style="color:red"><?= $error_subject ?></span><br/>
            <label>Сообщение:</label>
            <br/>
            <textarea name="message"  cols="40" rows="15"  ><?= $_SESSION["message"] ?></textarea>
            <span style="color:red"><?= $error_message ?></span><br/>
            <input type="submit" name="send" value="Отправить" />

        </form>
    </body>


</html>

