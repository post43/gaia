<?php

/*
 * ©2013 Croce Rossa Italiana
 */

paginaAdmin();

$t = $_GET['id'];
$f = Titolo::by('id',$t);
$f->cancella();

redirect('admin.titoli&del');

?>
