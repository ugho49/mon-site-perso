<?php
$output shell_exec('cd /var/www/public_prod/ && git reset --hard origin/master 2>&1');
$output = explode("\n", $output); 
foreach($output as $line) 
{ 
    $line = rtrim($line); 
    echo $line; 
}  
