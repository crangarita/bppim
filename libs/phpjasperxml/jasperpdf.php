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
		
		$xml =  simplexml_load_file("reportes/cartaasignacionnew.jrxml");

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		$PHPJasperXML->arrayParameter=array("proyecto"=>$proyecto,"entidad"=>$entidad);
		$PHPJasperXML->xml_dismantle($xml);

		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		$PHPJasperXML->outpage("D");    //page output method I:standard output  D:Download file

	}

	function generarConceptosectorial($proyecto=1){
		
		include_once('class/tcpdf/tcpdf.php');
		include_once('class/PHPJasperXML.inc.php');
		include_once('setting.php');
		
		$xml =  simplexml_load_file("reportes/conceptosectorialnew.jrxml");

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		$PHPJasperXML->arrayParameter=array("proyecto"=>$proyecto);
		$PHPJasperXML->xml_dismantle($xml);

		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		$PHPJasperXML->outpage("D");    //page output method I:standard output  D:Download file

	}

	function generarConceptosectorialvacio($proyecto=1){
		
		include_once('class/tcpdf/tcpdf.php');
		include_once('class/PHPJasperXML.inc.php');
		include_once('setting.php');
		
		$xml =  simplexml_load_file("reportes/conceptosectorialvacio.jrxml");

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		$PHPJasperXML->arrayParameter=array("proyecto"=>$proyecto);
		$PHPJasperXML->xml_dismantle($xml);

		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		$PHPJasperXML->outpage("D");    //page output method I:standard output  D:Download file

	}

	function generarCertificado($proyecto=1){
		
		include_once('class/tcpdf/tcpdf.php');
		include_once('class/PHPJasperXML.inc.php');
		include_once('setting.php');
		
		$xml =  simplexml_load_file("reportes/cartacertificacion.jrxml");

		$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->debugsql=true;
		$PHPJasperXML->arrayParameter=array("proyecto"=>$proyecto);
		$PHPJasperXML->xml_dismantle($xml);

		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		$PHPJasperXML->outpage("D");    //page output method I:standard output  D:Download file

	}
	
}

?>
