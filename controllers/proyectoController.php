<?php

class proyectoController extends Controller
{   
    public function __construct() {
        parent::__construct();
        Session::acceso('admin');
        $this->_estado = $this->loadModel('estado');
        $this->_categoria = $this->loadModel('categoria');
        $this->_entidad = $this->loadModel('entidad');
        $this->_vigencia = $this->loadModel('vigencia');
        $this->_sector = $this->loadModel('sector');
        $this->_asignacion = $this->loadModel('asignacion');
        $this->_vigencia = $this->loadModel('vigencia');

        $this->_requerimiento = $this->loadModel('requerimiento');
        $this->_proyectoReq = $this->loadModel('proyectoReq');

        $this->_proyecto = $this->loadModel('proyecto');
        
    }
    
    public function index()
    {
        $this->_model = $this->loadModel($this->_presentRequest->getControlador());

    	$this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Listado';

    	$this->_view->datos = $this->_model->resultList();

        $this->_view->entidades = $this->_entidad->resultList();
        $this->_view->estados = $this->_estado->resultList();

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

        $datos['Cod Bppim'] = $obj->getCodigoBppim();
        $datos['Nombre'] = $obj->getNombre();
        $datos['Proponente'] = $obj->getProponente();
        $datos['Categoria'] = $obj->getCategoria()->getDescripcion();
        $datos['Sector'] = $obj->getSector()->getDescripcion();
        $datos['Estado'] = $obj->getEstado()->getDescripcion();

        $arrayRta['datos'] = $datos;
        echo json_encode($arrayRta);
        exit; 
    }

    public function agregar()
    {
    	$this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Agregar';
        $this->_view->categorias = $this->_categoria->resultList();
        $this->_view->sectores = $this->_sector->resultList();
        $this->_view->metodo = "guardarProyecto";

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
        $this->_view->estados = $this->_estado->resultList();
        $this->_view->categorias = $this->_categoria->resultList();
        $this->_view->sectores = $this->_sector->resultList();
        $this->_view->vigencias = $this->_vigencia->resultList();
        $this->_view->metodo = "actualizarProyecto";

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
        $arrayTexto = array('nombre', 'fechaRadicacion', 'proponente','numRadicado');
        $rta = $this->validarArrays($arrayTexto);
        if($rta){
            Session::set('error','Falto digitar o seleccionar <b>'.$rta.'</b>');
            $this->redireccionar($this->_presentRequest->getUrl());
            exit;  
        }
        
        if($new){

            $this->_model->getInstance()->setNumRadicado($this->getTexto('numRadicado'));
            $this->_model->getInstance()->setFechaRadicacion(new \DateTime($this->getFecha($this->getTexto('fechaRadicacion'))));
            $this->_model->getInstance()->setNombre($this->getTexto('nombre'));
            $this->_model->getInstance()->setProponente($this->getTexto('proponente'));
            $this->_model->getInstance()->setEstado($this->_estado->get(1));
            $this->_model->getInstance()->setCategoria($this->_categoria->get($this->getInt('categoria')));
            $this->_model->getInstance()->setSector($this->_sector->get($this->getInt('sector')));
            $this->_model->getInstance()->setFechaCreacion(new \DateTime());
            $this->_model->getInstance()->setObservacion($this->getTexto('observacion'));
        
            $this->_model->save(); 
            Session::set('mensaje','Registro Creado con Exito.');

        }else{

            $this->_model->getInstance()->setNumRadicado($this->getTexto('numRadicado'));
            $this->_model->getInstance()->setFechaRadicacion(new \DateTime($this->getFecha($this->getTexto('fechaRadicacion'))));
            $this->_model->getInstance()->setCodigobppim($this->getTexto('codigoBPPIM'));
            $this->_model->getInstance()->setNombre($this->getTexto('nombre'));
            $this->_model->getInstance()->setProponente($this->getTexto('proponente'));
            $this->_model->getInstance()->setValor($this->getTexto('valor'));
            $this->_model->getInstance()->setNumBeneficiario($this->getInt('numBeneficiario'));
            $this->_model->getInstance()->setJustificacion($this->getTexto('justificacion'));
            $this->_model->getInstance()->setDimension($this->getTexto('dimension'));
            $this->_model->getInstance()->setMeses($this->getInt('meses'));
            $this->_model->getInstance()->setVigencia($this->_vigencia->get($this->getInt('vigencia')));
            $this->_model->getInstance()->setEstado($this->_estado->get($this->getInt('estado')));
            $this->_model->getInstance()->setCategoria($this->_categoria->get($this->getInt('categoria')));
            $this->_model->getInstance()->setSector($this->_sector->get($this->getInt('sector')));
            $this->_model->getInstance()->setObservacion($this->getTexto('observacion'));

            $this->_model->update(); 
            Session::set('mensaje','Registro Actualizado con Exito.');

        }

        $this->redireccionar($this->_presentRequest->getControlador().'/');
    }

    public function asignarProyecto(){

        $this->_asignacion->getInstance()->setProyecto($this->_proyecto->get($this->getInt("proyecto")));
        $this->_asignacion->getInstance()->setEntidad($this->_entidad->get($this->getInt("entidad")));
        $this->_asignacion->getInstance()->setFechaAsig(new \DateTime($this->getFecha($this->getTexto('fechaAsignacion'))));
        $this->_asignacion->getInstance()->setFechaLimite(new \DateTime($this->getFecha($this->getTexto('fechaLimite'))));
        $this->_asignacion->getInstance()->setObservacion($this->getTexto("observacion"));

        $this->_proyecto->findByObject(array('id' => $this->getInt("proyecto")));
        $this->_proyecto->getInstance()->setEstado($this->_estado->get(6));

        try {
            $this->_asignacion->save();
            $this->_proyecto->update();
            Session::set('mensaje','<b>Asignaci&oacute;n</b> del proyecto realizada con &Eacute;xito.');
        } catch (Exception $e) {
            Session::set('error','Error en el proceso de asignaci&oacute;n.'.$e);   
        }

        $this->redireccionar($this->_presentRequest->getControlador().'/');

    }

    public function concluirProyecto(){

        $this->_asignacion->findByObject(array('proyecto' => $this->getInt("proyecto")));
        $this->_proyecto->findByObject(array('id' => $this->getInt("proyecto")));

        $this->_asignacion->getInstance()->setFechaEntrega(new \DateTime($this->getFecha($this->getTexto('fechaConcluir'))));
        $this->_asignacion->getInstance()->setObservacionSect($this->getTexto("observacion"));

        $this->_proyecto->getInstance()->setEstado($this->_estado->get($this->getInt("estado")));

        try {
            $this->_asignacion->update();
            $this->_proyecto->update();
            Session::set('mensaje','Se ha definido el estado de viabilizaci&oacute;n del proyecto.');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.'.$e);   
        }

        $this->redireccionar($this->_presentRequest->getControlador().'/');

    }

    public function generarCodigo(){
        $this->_asignacion->findByObject(array('proyecto' => $this->getInt("proyecto")));

        //$this->_proyecto->findByObject(array('id' => $this->getInt("proyecto")));
        $this->_proyecto->findByObject(array('id' => 1));
        $this->_vigencia->findByObject(array('id' => $this->_proyecto->getInstance()->getVigencia()));

        $sql = "select max(codigobppim) as MAXCOD from proyecto 
        where vigencia = ".$this->_proyecto->getInstance()->getVigencia()."";

        $rta = $this->_proyecto->nativeQuery($sql);
        echo($sql);
        if (count($rta)){
            $rta = $rta[0];
            $maximo = $rta['MAXCOD'];
            $texto = explode("-",$maximo);
            $valor = ((int)$texto[2])+1;
            $codigo = $texto[0]."-".$texto[1]."-".str_pad($valor, 4, '0', STR_PAD_LEFT);

        }

        echo($codigo);

        exit;

    }

    public function requerimientos($proyecto = 0){

        $temp = $this->_proyectoReq->findBy(array('proyecto' => $proyecto));

        if(!$temp){

            $requerimientos = $this->_requerimiento->findBy(array('estado' => 1));
            foreach ($requerimientos as $key => $value) {
                $this->_proyectoReq = $this->loadModel("proyectoReq");
                $this->_proyectoReq->getInstance()->setProyecto($this->_proyecto->get($proyecto));
                $this->_proyectoReq->getInstance()->setRequerimiento($this->_requerimiento->get($value->getId()));
                $this->_proyectoReq->save();
            }

        }

        /*if($this->getInt('guardar') == 1){
            
            $requerimientos = $this->_requerimiento->findBy(array('estado' => 1));
            foreach ($requerimientos as $key => $value) {

               $this->_proyectoReq = $this->loadModel("proyectoReq");
               $this->_proyectoReq->findByObject(array('proyecto' => $proyecto, 'requerimiento' => $this->getInt("r".$value->getId())));
               $this->_proyectoReq->getInstance()->setEstado($this->getInt("op".$value->getId()));
               $this->_proyectoReq->update();

            }

        }*/

        $this->_view->datos = $this->_proyectoReq->findBy(array('proyecto' => $proyecto));

        $this->_view->renderizar('requerimiento', ucwords(strtolower($this->_presentRequest->getControlador())));      

    }



    public function cartasignacion($proyecto=1,$entidad=1){
        
        $this->getLibrary('phpjasperxml/jasperpdf');
        
        $pdf = new Jasperpdf();
        
        $pdf->generarCartasignacion($proyecto,$entidad);
    }

}

?>