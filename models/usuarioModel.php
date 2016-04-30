<?php
/*
* -------------------------------------
* 
* Date: 24/04/2016 22:45:47 
* usuarioModel.php
* -------------------------------------
*/
class usuarioModel extends Model {
    public function __construct() {
        parent::__construct(); 
        $this->instance = $this->loadObjeto('Usuario'); 
    }
}
?>