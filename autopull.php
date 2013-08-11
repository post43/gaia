<?php

/*
 * (c)2013 Croce Rossa Italiana
 */

require 'core.inc.php';

/* Controlla che l'autopull sia attivo */
if (!$conf['autopull']['abilitato']) {
    die('Autopull disabilitato da configurazione.');
}

$GIT_BIN = $conf['autopull']['bin'];
$REMOTE  = $conf['autopull']['origin'];
$BRANCH  = $conf['autopull']['ramo'];

header('Content-Type: text/plain');

$output = '';
exec("$GIT_BIN fetch $REMOTE 2>&1; $GIT_BIN checkout -q $REMOTE/$BRANCH 2>&1; $GIT_BIN log -1 2>&1;", $output);
$output = date('d-m-Y H:i:s') . "\n\n" . $output;

/* Salva nel file di log */
file_put_contents('upload/log/autopull.txt', print_r($output, true));
