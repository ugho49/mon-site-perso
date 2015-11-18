<?php
echo shell_exec('cd /var/www/public_prod/');
echo '<br>';
echo shell_exec('git reset --hard origin/master 2>&1');
echo '<br>';
echo shell_exec('git pull 2>&1');
