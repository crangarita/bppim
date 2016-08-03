<?php
/*
* -------------------------------------
* 
* Date: 02/08/2016 19:03:56 
* vigenciaModel.php
* -------------------------------------
*/
class vigenciaModel extends Model {
    public function __construct() {
        parent::__construct(); 
        $this->instance = $this->loadObjeto('Vigencia'); 
    }
}
?>