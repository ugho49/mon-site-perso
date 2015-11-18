<?php
echo '<p>'.shell_exec('cd /var/www/public_prod/').'</p>';
echo '<br>';
echo '<p>'.shell_exec('git reset --hard origin/master 2>&1').'</p>';
echo '<br>';
$output = shell_exec('git pull 2>&1');
if($output == "Already up-to-date.") {
    echo '<p style="color: green;">'.$output.'</p>';
} else {
    echo '<p>'.$output.'</p>';
}
