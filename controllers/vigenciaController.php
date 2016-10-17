<?php

class vigenciaController extends Controller
{   
    public function __construct() {
        parent::__construct();
        Session::acceso('admin');

    }
    
    public function index()
    {
        $this->_model = $this->loadModel($this->_presentRequest->getControlador());

    	$this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Listado';

    	$this->_view->datos = $this->_model->resultList();

    	$this->_view->setJsP(array('dataTables/jquery.dataTables','dataTables/dataTables.bootstrap'));
        $this->_view->setCssP(array('dataTables.bootstrap'));

        $this->_view->renderizar('index', ucwords(strtolower($this->_presentRequest->getControlador())));
    }

    public function agregar()
    {
    	$this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Agregar';

    	if($_POST){
        	$this->_model = $this->loadModel($this->_presentRequest->getControlador());
            $this->obj();
        }
    	
        $this->_view->renderizar('obj', ucwords(strtolower($this->_presentRequest->getControlador())));

    }

    public function actualizar($id=0)
    {
        $this->_model = $this->loadModel($this->_presentRequest->getControlador());

        $this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Actualizar'; 

        if($this->filtrarInt($id)<1){
            Session::set('error','Registro no encontrado.');
            $this->redireccionar();
        }

        $this->_model->get($this->filtrarInt($id));

        if(!$this->_model->getInstance()){
            Session::set('error','Registro no encontrado.');
            $this->redireccionar();
        }

        $this->_view->dato = $this->_model->getInstance();

        if($_POST){
            $this->obj(false);
        }

        $this->_view->renderizar('obj', ucwords(strtolower($this->_presentRequest->getControlador())));
    }

    private function obj($new = true)
    {
        $arrayTexto = array('ano', 'descripcion');
        $rta = $this->validarArrays($arrayTexto);
        if($rta){
            Session::set('error','Falto digitar o seleccionar <b>'.$rta.'</b>');
            $this->redireccionar($this->_presentRequest->getUrl());
            exit;  
        }

        $this->_model->getInstance()->setAno($this->getTexto('ano'));
        $this->_model->getInstance()->setDescripcion($this->getTexto('descripcion'));
        $this->_model->getInstance()->setActual($this->getInt('estado'));

        if($new){
            $this->_model->save(); 
            Session::set('mensaje','Registro creado con exito.');
        }else{
            $this->_model->update(); 
            Session::set('mensaje','Registro actualizado con exito.');
        }

        $this->redireccionar($this->_presentRequest->getControlador().'/');
    }

}

?>