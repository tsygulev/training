<?php

 header("Content-Type: text/html; charset=utf-8");
 session_start();
 echo "Вы успешно отправили сообщение на email:".$_SESSION["to"];
?>
