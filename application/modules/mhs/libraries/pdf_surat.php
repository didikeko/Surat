<?php 
defined('BASEPATH') OR exit('No direct script acces allowed');

/**
* 
*/
require_once dirname(__file__).'/tcpdf/tcpdf.php';
class pdf_surat extends TCPDF
{	
	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}
}