<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Jasperpdf
{
	

	function __construct()
	{
		//$this->instancia = Db2::getInstance('WSIAACA');
	}
	
	function generarCartasignacion($proyecto=1,$entidad=1){
		
		include_once('class/tcpdf/tcpdf.php');
		include_once('class/PHPJasperXML.inc.php');
		include_once('setting.php');
		
		$xml =  simplexml_load_file("reportes/cartasignacion.jrxml");

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		$PHPJasperXML->arrayParameter=array("proyecto"=>$proyecto,"entidad"=>$entidad);
		$PHPJasperXML->xml_dismantle($xml);

		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		$PHPJasperXML->outpage("D");    //page output method I:standard output  D:Download file

	}


	function generarMantenimiento($id=""){
		
		include_once('class/tcpdf/tcpdf.php');
		include_once('class/PHPJasperXML.inc.php');
		include_once('setting.php');
		
		$xml =  simplexml_load_file("reportes/fichamantenimiento.jrxml");
		//$xml =  simplexml_load_file("reportes/fichamantenimiento.jrxml");

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		
		

		$PHPJasperXML->arrayParameter=array("idmantenimiento"=>$id);
		$PHPJasperXML->xml_dismantle($xml);
		
		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		
		$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

	}

	function generarCorrectivo($id=""){
		
		include_once('class/tcpdf/tcpdf.php');
		include_once('class/PHPJasperXML.inc.php');
		include_once('setting.php');
		
		$xml =  simplexml_load_file("reportes/fichacorrectivo.jrxml");
		//$xml =  simplexml_load_file("reportes/fichamantenimiento.jrxml");

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		
		

		$PHPJasperXML->arrayParameter=array("idmantenimiento"=>$id);
		$PHPJasperXML->xml_dismantle($xml);
		
		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		
		$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

	}

	function generarPreventivo($id=""){
		
		include_once('class/tcpdf/tcpdf.php');
		include_once('class/PHPJasperXML.inc.php');
		include_once('setting.php');
		
		$xml =  simplexml_load_file("reportes/fichapreventivo.jrxml");
		//$xml =  simplexml_load_file("reportes/fichamantenimiento.jrxml");

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		
		

		$PHPJasperXML->arrayParameter=array("idmantenimiento"=>$id);
		$PHPJasperXML->xml_dismantle($xml);
		
		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		
		$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

	}
}

?>
