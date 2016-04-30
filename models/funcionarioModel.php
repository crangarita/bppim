<?php
/*
* -------------------------------------
* 
* Date: 24/04/2016 22:45:47 
* funcionarioModel.php
* -------------------------------------
*/
class funcionarioModel extends Model {
    public function __construct() {
        parent::__construct(); 
        $this->instance = $this->loadObjeto('Funcionario'); 
    }
}
?>