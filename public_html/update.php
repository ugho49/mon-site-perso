<?php
shell_exec('cd /var/www/public_prod/');
echo '<p>'.shell_exec('git reset --hard origin/master 2>&1').'</p>';
echo '<br>';
$output = shell_exec('git pull 2>&1');
if(ereg("Already up-to-date.", $output)) {
    echo '<p style="color: green;">'.$output.'</p>';
} else {
    echo '<p>'.$output.'</p>';
}
