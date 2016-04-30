<?php
/*
* -------------------------------------
* 
* Date: 24/04/2016 22:45:47 
* categoriaModel.php
* -------------------------------------
*/
class categoriaModel extends Model {
    public function __construct() {
        parent::__construct(); 
        $this->instance = $this->loadObjeto('Categoria'); 
    }
}
?>