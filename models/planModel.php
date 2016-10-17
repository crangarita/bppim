<?php
/*
* -------------------------------------
* 
* Date: 17/10/2016 11:08:29 
* planModel.php
* -------------------------------------
*/
class planModel extends Model {
    public function __construct() {
        parent::__construct(); 
        $this->instance = $this->loadObjeto('Plan'); 
    }
}
?>