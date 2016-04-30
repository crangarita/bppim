<?php

class proyectoController extends Controller
{   
    public function __construct() {
        parent::__construct();
        Session::acceso('admin');
        $this->_raza = $this->loadModel('proyecto');
        
        $this->_estado = $this->loadModel('estado');
        $this->_categoria = $this->loadModel('categoria');
        $this->_sector = $this->loadModel('sector');
        /*
        $this->_vacuna = $this->loadModel('vacuna');
        $this->_servicio = $this->loadModel('servicio');
        $this->_vacunacion = $this->loadModel('vacunacion');
        $this->_servicioMascota = $this->loadModel('serviciomascota');
        */
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

    public function get()
    {
        $this->_model = $this->loadModel($this->_presentRequest->getControlador());

    	header('Content-type: application/json');
        
        $arrayRta = array('error'=>false);

        if(!$_POST){
            $arrayRta['error'] = 'Error';
            echo json_encode($arrayRta);
            exit;   
        }

        if($this->getInt('id')<1){
            $arrayRta['error'] = 'Error de id';
            echo json_encode($arrayRta);
            exit;   
        }

        $obj = $this->_model->get($this->getInt('id'));
        if(!$obj){
        	$arrayRta['error'] = ' Elemento no existe';
            echo json_encode($arrayRta);
            exit; 
        }

        $datos = array();

        $datos['Codigo'] = $obj->getId();
        $datos['Nombre'] = $obj->getNombre();
        $datos['Descripcion'] = $obj->getDescripcion();
        $datos['Raza'] = $obj->getRaza()->getDescripcion();
        $datos['Cliente'] = $obj->getCliente()->getNombre();

        $arrayRta['datos'] = $datos;
        echo json_encode($arrayRta);
        exit; 
    }

    public function agregar()
    {
    	$this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Agregar';
        $this->_view->estados = $this->_estado->resultList();
        $this->_view->categorias = $this->_categoria->resultList();
        $this->_view->sectores = $this->_sector->resultList();
        //$this->_view->clientes = $this->_cliente->findBy(array('veterinario' => Session::get('usuario')));

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
        $this->_view->razas = $this->_raza->resultList();
        $this->_view->clientes = $this->_cliente->resultList();
        $this->_view->vacunas = $this->_vacuna->findBy(array('veterinario' => Session::get('usuario')));
        $this->_view->servicios = $this->_servicio->findBy(array('veterinario' => Session::get('usuario')));

        if($this->filtrarInt($id)<1){
            Session::set('error','Registro No Encontrado.');
            $this->redireccionar();
        }

        $this->_model->get($this->filtrarInt($id));

        if(!$this->_model->getInstance()){
            Session::set('error','Registro No Encontrado.');
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
        //$arrayTexto = array('nombre', 'fechaNac', 'descripcion');
        //$arrayInt = array('raza', 'cliente');
        //$rta = $this->validarArrays($arrayTexto,$arrayInt);
        /*if($rta){
            Session::set('error','Falto digitar o seleccionar <b>'.$rta.'</b>');
            $this->redireccionar($this->_presentRequest->getUrl());
            exit;  
        }*/

        $this->_model->getInstance()->setCodigoBPPIM($this->getTexto('codigo'));
        $this->_model->getInstance()->setNombre($this->getTexto('nombre'));
        $this->_model->getInstance()->setProponente($this->getTexto('proponente'));
        $this->_model->getInstance()->setEstado($this->_estado->get($this->getInt('estado')));
        $this->_model->getInstance()->setCategoria($this->_categoria->get($this->getInt('categoria')));
        $this->_model->getInstance()->setSector($this->_sector->get($this->getInt('sector')));
        $this->_model->getInstance()->setFechaCreacion(new \DateTime());
        
        if($new){
            $this->_model->save(); 
            Session::set('mensaje','Registro Creado con Exito.');
        }else{
            $this->_model->update(); 
            Session::set('mensaje','Registro Actualizado con Exito.');
        }

        $this->redireccionar($this->_presentRequest->getControlador().'/');
    }

    public function agregarVacuna(){

        $this->_vacunacion->getInstance()->setMascota($this->_mascota->get($this->getInt("mascota")));
        $this->_vacunacion->getInstance()->setVacuna($this->_vacuna->get($this->getInt("vacuna")));
        $this->_vacunacion->getInstance()->setFechaProg(new \DateTime($this->getFecha($this->getTexto('fechaProg'))));
        $this->_vacunacion->getInstance()->setObservacion($this->getTexto('observacion'));
        try {
            $this->_vacunacion->save();
            Session::set('mensaje','La <b>Vacuna</b> se Registro Correctamente.');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.');
        }
        $this->redireccionar($this->_presentRequest->getControlador().'/actualizar/'.$this->_mascota->getInstance()->getId()."/");

    }

    public function agregarServicio(){

        $this->_servicioMascota->getInstance()->setMascota($this->_mascota->get($this->getInt("mascota")));
        $this->_servicioMascota->getInstance()->setServicio($this->_servicio->get($this->getInt("servicio")));
        $this->_servicioMascota->getInstance()->setFechaProg(new \DateTime($this->getFecha($this->getTexto('fechaProg'))));
        $this->_servicioMascota->getInstance()->setObservacion($this->getTexto('observacion'));
        try {
            $this->_servicioMascota->save();
            Session::set('mensaje','El <b>Servicio</b> se Registro Correctamente.');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.');            
        }
        $this->redireccionar($this->_presentRequest->getControlador().'/actualizar/'.$this->_mascota->getInstance()->getId()."/");

    }

    public function asignarVacuna(){

        $this->_vacunacion->get($this->getInt("vacuna"));
        $this->_vacunacion->getInstance()->setFechaReal(new \DateTime($this->getFecha('fechaRealVacuna')));
        try {
            $this->_vacunacion->update();
            Session::set('mensaje','La <b>Vacuna</b> se Asigno Correctamente.');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.');          
        }
        $this->redireccionar($this->_presentRequest->getControlador().'/actualizar/'.$this->getInt("mascota")."/");

    }

    public function asignarServicio(){

        $this->_servicioMascota->get($this->getInt("servicio"));
        $this->_servicioMascota->getInstance()->setFechaReal(new \DateTime($this->getFecha('fechaRealServicio')));
        try {
            $this->_servicioMascota->update();
            Session::set('mensaje','El <b>Servicio</b> se Asigno Correctamente.');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.');   
        }
        $this->redireccionar($this->_presentRequest->getControlador().'/actualizar/'.$this->getInt("mascota")."/");

    }

    public function desactivarVacuna($mascota=0,$vacuna=0){

        $this->_vacunacion->get($vacuna);
        try {
            $this->_vacunacion->delete();
            Session::set('mensaje','La <b>Vacuna</b> se Elimino Correctamente.');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.');
        }
        $this->redireccionar($this->_presentRequest->getControlador().'/actualizar/'.$mascota."/");

    }

    public function desactivarServicio($mascota=0,$servicio=0){

        $this->_servicioMascota->get($servicio);
        try {
            $this->_servicioMascota->delete();
            Session::set('mensaje','La <b>Vacuna</b> se Elimino Correctamente.');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.');
        }
        $this->redireccionar($this->_presentRequest->getControlador().'/actualizar/'.$mascota."/");
        
    }

}

?>