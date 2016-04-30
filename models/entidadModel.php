<?php
/*
* -------------------------------------
* 
* Date: 24/04/2016 22:45:47 
* entidadModel.php
* -------------------------------------
*/
class entidadModel extends Model {
    public function __construct() {
        parent::__construct(); 
        $this->instance = $this->loadObjeto('Entidad'); 
    }
}
?>