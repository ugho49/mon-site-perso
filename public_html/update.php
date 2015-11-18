<?php
$output = shell_exec('cd /var/www/public_prod/ && git reset --hard origin/master 2>&1 && git pull 2>&1');
var_dump($output);
