<?php
session_start();
session_unset();
//setcookie("autor", 'idrntif', time()-3600);
header("Location: ../views/autorization.php");