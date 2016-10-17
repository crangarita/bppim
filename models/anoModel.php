<?php
/*
* -------------------------------------
* 
* Date: 17/10/2016 11:49:32 
* anoModel.php
* -------------------------------------
*/
class anoModel extends Model {
    public function __construct() {
        parent::__construct(); 
        $this->instance = $this->loadObjeto('Ano'); 
    }
}
?>