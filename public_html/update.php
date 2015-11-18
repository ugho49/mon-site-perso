<?php
$sh = shell_exec('cd /var/www/public_prod/ && git reset --hard origin/master 2>&1');
$output = explode("\n", $sh); 
foreach($output as $line) 
{ 
    $line = rtrim($line); 
    echo $line; 
}  
