<?php
/*
* -------------------------------------
* 
* Date: 02/08/2016 19:03:56 
* programaModel.php
* -------------------------------------
*/
class programaModel extends Model {
    public function __construct() {
        parent::__construct(); 
        $this->instance = $this->loadObjeto('Programa'); 
    }
}
?>