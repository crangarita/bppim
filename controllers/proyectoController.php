<?php

class proyectoController extends Controller
{   
    public function __construct() {
        parent::__construct();
        Session::acceso('admin');
        $this->_estado = $this->loadModel('estado');
        $this->_categoria = $this->loadModel('categoria');
        $this->_entidad = $this->loadModel('entidad');
        $this->_funcionario = $this->loadModel('funcionario');
        $this->_vigencia = $this->loadModel('vigencia');
        $this->_sector = $this->loadModel('sector');
        $this->_asignacion = $this->loadModel('asignacion');
        $this->_vigencia = $this->loadModel('vigencia');
        $this->_configuracion = $this->loadModel('configuracion');

        $this->_requerimiento = $this->loadModel('requerimiento');
        $this->_tipoRequerimiento = $this->loadModel('tipoRequerimiento');
        $this->_proyectoReq = $this->loadModel('proyectoReq');

        $this->_ano = $this->loadModel('ano');        
        $this->_programa = $this->loadModel('programa');

        $this->_proyecto = $this->loadModel('proyecto');
        
    }
    
    public function index()
    {
        $this->_model = $this->loadModel($this->_presentRequest->getControlador());

    	$this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Listado';

    	//$this->_view->datos = $this->_model->dql("SELECT p FROM Entities\Proyecto p INNER JOIN Entities\Asignacion a WITH p.id = a.proyecto WHERE a.estado =:estado ORDER BY a.estado ASC", array('estado' => 1));
        $this->_view->datos = $this->_model->resultList();

        $this->_view->entidades = $this->_entidad->resultList();
        $this->_view->funcionarios = $this->_funcionario->resultList();
        $this->_view->estados = $this->_estado->resultList();
        $this->_view->estadosConcluir = $this->_estado->dql("SELECT e FROM Entities\Estado e WHERE e.id=:est1 OR e.id=:est2",array('est1' => 2, 'est2' => 5));

    	$this->_view->setJsP(array('dataTables/jquery.dataTables','dataTables/dataTables.bootstrap'));
        $this->_view->setCssP(array('dataTables.bootstrap'));

        $this->_view->renderizar('index', ucwords(strtolower($this->_presentRequest->getControlador())));
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
        $this->_view->anos = $this->_ano->resultList();
        $this->_view->vigencias = $this->_vigencia->resultList();

        $this->_view->programas = $this->_programa->resultList();

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

    public function eliminar($id=0)
    {
        $this->_model = $this->loadModel($this->_presentRequest->getControlador());

        if($this->filtrarInt($id)<1){
            Session::set('error','Registro No Encontrado.');
            $this->redireccionar("proyecto");
        }

        $this->_model->get($this->filtrarInt($id));

        if(!$this->_model->getInstance()){
            Session::set('error','Registro No Encontrado.');
            $this->redireccionar("proyecto");
        }
        $asignacion = $this->_asignacion->findBy(array('proyecto' => $id));
        if(count($asignacion)){
            $sql = "DELETE FROM asignacion WHERE proyecto = ".$id." ";
            $this->_proyectoReq->exec($sql);
        }
        $requerimientos = $this->_proyectoReq->findBy(array('proyecto' => $id));
        if(count($requerimientos)){
            $sql = "DELETE FROM proyectoreq WHERE proyecto = ".$id." ";
            $this->_proyectoReq->exec($sql);
        }
        $this->_model->delete();
        Session::set('mensaje','El Proyecto se Elimin&oacute; Correctamente.');
        $this->redireccionar("proyecto");
    }


    private function obj($new = true)
    {
        $arrayTexto = array('nombre', 'fechaRadicacion', 'proponente');
        $rta = $this->validarArrays($arrayTexto);
        if($rta){
            Session::set('error','Falto digitar o seleccionar <b>'.$rta.'</b>');
            $this->redireccionar($this->_presentRequest->getUrl());
            exit;  
        }
        
        if($new){

            $sql = "SELECT MAX(NUMRADICADO) AS RADICADO FROM proyecto";
            $temp = $this->_estado->nativeQuery($sql);
            $radicado = $temp[0]['RADICADO'];
            $radicadoInt = intval($radicado);
            $radicadoFinal = "0000".($radicadoInt+1);

            $vigencia = $this->_vigencia->findByObject(array('actual' => 1));
            if($vigencia == null){
                Session::set('error','No Hay Vigencia Activa.');
                $this->redireccionar($this->_presentRequest->getControlador().'/');
            }

            $this->_model->getInstance()->setNumRadicado($radicadoFinal);
            $this->_model->getInstance()->setFechaRadicacion(new \DateTime($this->getFecha('fechaRadicacion')));
            $this->_model->getInstance()->setNombre($this->getTexto('nombre'));
            $this->_model->getInstance()->setProponente($this->getTexto('proponente'));
            $this->_model->getInstance()->setValor($this->getTexto('valor'));
            $this->_model->getInstance()->setEstado($this->_estado->get(1));
            $this->_model->getInstance()->setCategoria($this->_categoria->get($this->getInt('categoria')));
            $this->_model->getInstance()->setSector($this->_sector->get($this->getInt('sector')));
            $this->_model->getInstance()->setFechaCreacion(new \DateTime());
            $this->_model->getInstance()->setObservacion($this->getTexto('observacion'));

            $this->_model->getInstance()->setVigencia($vigencia);
        
            $this->_model->save();

            $requerimientos = $this->_requerimiento->findBy(array('estado' => 1));
            foreach ($requerimientos as $key => $value) {
                $this->_proyectoReq = $this->loadModel("proyectoReq");
                $this->_proyectoReq->getInstance()->setProyecto($this->_model->getInstance());
                $this->_proyectoReq->getInstance()->setRequerimiento($this->_requerimiento->get($value->getId()));
                $this->_proyectoReq->getInstance()->setFecha(new \DateTime());
                $this->_proyectoReq->getInstance()->setEstado(0);
                $this->_proyectoReq->save();
            }

            Session::set('mensaje','Registro Creado con Exito.');

        }else{

            $this->_model->getInstance()->setFechaRadicacion(new \DateTime($this->getFecha('fechaRadicacion')));
            //$this->_model->getInstance()->setCodigobppim($this->getTexto('codigoBPPIM'));
            $this->_model->getInstance()->setNombre($this->getTexto('nombre'));
            $this->_model->getInstance()->setProponente($this->getTexto('proponente'));
            $this->_model->getInstance()->setValor($this->getTexto('valor'));
            $this->_model->getInstance()->setNumBeneficiario($this->getInt('numBeneficiario'));
            $this->_model->getInstance()->setJustificacion($this->getTexto('justificacion'));
            $this->_model->getInstance()->setDimension($this->getTexto('dimension'));
            $this->_model->getInstance()->setMeses($this->getInt('meses'));
            $this->_model->getInstance()->setVigencia($this->_vigencia->get($this->getInt('vigencia')));
            $this->_model->getInstance()->setAnoInicio($this->getInt('anoInicio'));
            $this->_model->getInstance()->setAnoFin($this->getInt('anoFin'));
            $this->_model->getInstance()->setCategoria($this->_categoria->get($this->getInt('categoria')));
            $this->_model->getInstance()->setSector($this->_sector->get($this->getInt('sector')));
            $this->_model->getInstance()->setObservacion($this->getTexto('observacion'));


            $this->_model->getInstance()->setPrograma($this->_programa->get($this->getInt('programa')));

            $this->_model->update(); 
            Session::set('mensaje','Registro Actualizado con Exito.');

        }

        $this->redireccionar($this->_presentRequest->getControlador().'/');
    }

    public function asignarProyecto(){

        $proyecto = $this->_proyecto->get($this->getInt("proyecto"));
        $asignaciones = $this->_asignacion->findBy(array('proyecto' => $proyecto));
        if(count($asignaciones)){
            foreach ($asignaciones as $key => $value) {
                $this->_asignacion = $this->loadModel('asignacion');
                $this->_asignacion->get($value->getId());
                $this->_asignacion->getInstance()->setEstado(0);
                $this->_asignacion->update();
            }
        }

        $this->_asignacion = $this->loadModel('asignacion');
        $this->_asignacion->getInstance()->setProyecto($this->_proyecto->get($proyecto));
        $this->_asignacion->getInstance()->setEntidad($this->_entidad->get($this->getInt("entidad")));
        $this->_asignacion->getInstance()->setFuncionario($this->_funcionario->get($this->getInt("funcionario")));
        $this->_asignacion->getInstance()->setFechaAsig(new \DateTime($this->getFecha($this->getTexto('fechaAsignacion'))));
        $this->_asignacion->getInstance()->setFechaLimite(new \DateTime($this->getFecha($this->getTexto('fechaLimite'))));
        $this->_asignacion->getInstance()->setObservacion($this->getTexto("observacion"));
        $this->_asignacion->getInstance()->setEstado(1);

        $this->_proyecto->findByObject(array('id' => $proyecto));
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

        $this->_asignacion->findByObject(array('proyecto' => $this->getInt("proyecto"), 'estado' => 1));
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

    public function generarCodigo($codigo){

        $this->_proyecto->findByObject(array('id' => $codigo));

        $sql = "SELECT MAX(CODIGOBPPIM) AS MAXCOD FROM proyecto WHERE VIGENCIA = ".$this->_proyecto->getInstance()->getVigencia()->getId()."";

        $rta = $this->_proyecto->nativeQuery($sql);

        if ($rta[0]['MAXCOD'] != null){
            $rta = $rta[0];
            $maximo = $rta['MAXCOD'];
            $texto = explode("-",$maximo);
        }else{
            $this->_vigencia->findByObject(array('actual' => 1));
            $this->_configuracion->findByObject(array());
            $texto = array();
            $texto[0] = $this->_vigencia->getInstance()->getAno();
            $texto[1] = $this->_configuracion->getInstance()->getMunicipio();
            $texto[2] = 0;
        }
        
        $valor = ((int)$texto[2])+1;
        $codigo = $texto[0]."-".$texto[1]."-".str_pad($valor, 4, '0', STR_PAD_LEFT);

        $this->_proyecto->getInstance()->setCodigoBppim($codigo);

        try {
            $this->_proyecto->update();
            Session::set('mensaje','Se Gener&oacute; el C&oacute;digo Correctamente');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.');   
        }

        $this->redireccionar($this->_presentRequest->getControlador().'/');

    }

    public function requerimientos($proyecto = 0){

        $temp = $this->_proyectoReq->findBy(array('proyecto' => $proyecto));

        if(!$temp){

            $requerimientos = $this->_requerimiento->findBy(array('estado' => 1));
            foreach ($requerimientos as $key => $value) {
                $this->_proyectoReq = $this->loadModel("proyectoReq");
                $this->_proyectoReq->getInstance()->setProyecto($this->_proyecto->get($proyecto));
                $this->_proyectoReq->getInstance()->setRequerimiento($this->_requerimiento->get($value->getId()));
                $this->_proyectoReq->getInstance()->setFecha(new \DateTime());
                $this->_proyectoReq->getInstance()->setEstado(0);
                $this->_proyectoReq->save();
            }

        }

        if($this->getInt('guardar') == 1){

            $requerimientos = $this->_requerimiento->findBy(array('estado' => 1));
            foreach ($requerimientos as $key => $value) {

               $this->_proyectoReq = $this->loadModel("proyectoReq");
               $this->_proyectoReq->findByObject(array('proyecto' => $proyecto, 'requerimiento' => $this->getInt("r".$value->getId())));
               $this->_proyectoReq->getInstance()->setEstado($this->getInt("op".$value->getId()));
               $this->_proyectoReq->update();

            }

            Session::set('mensaje','Los Requerimientos se Guardaron con Exito.');
            $this->redireccionar($this->_presentRequest->getControlador().'/');

        }

        $this->_view->datos1 = $this->_proyectoReq->dql("SELECT pr FROM Entities\ProyectoReq pr JOIN pr.proyecto p JOIN pr.requerimiento r JOIN r.tipo t WHERE t.id =:tipo AND p.id=:idproy",array('tipo' => 1, 'idproy' => $proyecto ));
        $this->_view->datos2 = $this->_proyectoReq->dql("SELECT pr FROM Entities\ProyectoReq pr JOIN pr.proyecto p JOIN pr.requerimiento r JOIN r.tipo t WHERE t.id =:tipo AND p.id=:idproy",array('tipo' => 2, 'idproy' => $proyecto ));
        $this->_view->datos3 = $this->_proyectoReq->dql("SELECT pr FROM Entities\ProyectoReq pr JOIN pr.proyecto p JOIN pr.requerimiento r JOIN r.tipo t WHERE t.id =:tipo AND p.id=:idproy",array('tipo' => 3, 'idproy' => $proyecto ));
        $this->_view->titulo = "Requerimientos";
        $this->_view->renderizar('requerimiento', ucwords(strtolower($this->_presentRequest->getControlador())));      

    }

    public function cargarFuncionario(){

        $entidad = $this->getInt("entidad");

        $funcionarios = $this->_funcionario->findBy(array('entidad' => $entidad));

        $arrayExt['datos'] = array();

        foreach ($funcionarios as $key => $value) {
            $arrayInt = array();
            $arrayInt['id'] = $value->getId();
            $arrayInt['nombre'] = $value->getNombre();
            $arrayExt['datos'][] = $arrayInt;            
        }

        echo (json_encode($arrayExt));

    }

    public function cartasignacion($proyecto=1,$entidad=1){
        
        $this->getLibrary('phpjasperxml/jasperpdf');
        
        $pdf = new Jasperpdf();
        
        $pdf->generarCartasignacion($proyecto,$entidad);
    }

    public function conceptosectorial($proyecto=1){
        
        $this->getLibrary('phpjasperxml/jasperpdf');
        
        $pdf = new Jasperpdf();
        
        $pdf->generarConceptosectorial($proyecto);
    }

    public function conceptosectorialblanco($proyecto=1){
        
        $this->getLibrary('phpjasperxml/jasperpdf');
        
        $pdf = new Jasperpdf();
        
        $pdf->generarConceptosectorialvacio($proyecto);
    }

    public function certificadobppim($proyecto=1){
        
        $this->getLibrary('phpjasperxml/jasperpdf');
        
        $pdf = new Jasperpdf();
        
        $pdf->generarCertificado($proyecto);
    }

}

?>