<?php

/*
 * ©2013 Croce Rossa Italiana
 */

class Delegato extends Entita {
    
    protected static
        $_t  = 'delegati',
        $_dt = null;
    
    public function volontario() {
        return new Volontario($this->volontario);
    }

    public function comitato() {
        return new Comitato($this->comitato);
    }

    public function attuale() {
        if ( !$this->fine || $this->fine > time() ) {
            return true;
        } else {
            return false;
        }
    }
}