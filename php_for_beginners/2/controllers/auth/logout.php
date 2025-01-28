<?php

use Core\Session;

Session::destroy();
header("Location: /");
exit();
?> 