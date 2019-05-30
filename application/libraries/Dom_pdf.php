<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


require_once APPPATH.'third_party/dompdf/autoload.inc.php';
		
use Dompdf\Dompdf;

class Dom_pdf {
		
	public function __construct() {

		$pdf = new Dompdf();
		
		$CI =& get_instance();
		$CI->dompdf = $pdf;
		
	}
	
}