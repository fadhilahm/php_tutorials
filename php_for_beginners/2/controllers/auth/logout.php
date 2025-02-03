<?php

use Core\Authenticator;

$auth = new Authenticator($db);
$auth->logout();

header("Location: /");
exit();
?> 