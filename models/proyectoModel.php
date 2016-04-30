<?php
/*
* -------------------------------------
* 
* Date: 24/04/2016 22:45:47 
* proyectoModel.php
* -------------------------------------
*/
class proyectoModel extends Model {
    public function __construct() {
        parent::__construct(); 
        $this->instance = $this->loadObjeto('Proyecto'); 
    }
}
?>