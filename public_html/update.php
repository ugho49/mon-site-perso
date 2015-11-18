<?php
exec('cd /var/www/public_prod/ && git reset --hard origin/master 2>&1 && git pull 2>&1', $output);
$scanme = implode("\n",$output);
foreach($scanme as $line) 
{ 
    echo $line; 
}  
