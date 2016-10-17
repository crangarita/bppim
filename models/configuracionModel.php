<?php
/*
* -------------------------------------
* 
* Date: 17/10/2016 11:08:29 
* configuracionModel.php
* -------------------------------------
*/
class configuracionModel extends Model {
    public function __construct() {
        parent::__construct(); 
        $this->instance = $this->loadObjeto('Configuracion'); 
    }
}
?>