<?php

$router->add('/account/login', 'src\app\controllers\Common@login', 0);
$router->add('/account/auth', 'src\app\controllers\Common@auth', 0);
$router->add('/account/logout', 'src\app\controllers\Common@logout', 0);

$router->add('/', 'src\app\controllers\Common@dashboard');

//all - (.*)
//alpa - (\w+)
//num - ([0-9]+)
//alpa and dash - ([a-z\-]+)
//alpa - ([a-zA-Z]+)
