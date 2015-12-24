<?php
shell_exec('cd /var/www/dev/');
shell_exec('git reset --hard origin/master 2>&1');

$output = shell_exec('git pull 2>&1');
if(ereg("Already up-to-date.", $output)) {
    echo '<p style="color: green;">'.$output.'</p>';
} else {
    echo '<p>'.$output.'</p>';
    echo '<br>';
    echo '<p>'.shell_exec('git reset --hard origin/master 2>&1').'</p>';
}

echo '<p>Mise à jour des vendor</p>';
echo '<p>'.shell_exec('php composer.phar update').'</p>';
