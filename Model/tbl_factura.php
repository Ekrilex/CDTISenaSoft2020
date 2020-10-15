<?php
//Modelo

require_once '../Model/MasterModel.php';

class tbl_factura extends MasterModel{


	public $fac_id;
	public $fac_sucid;
	public $fac_clinit;
	public $fac_fecha;
	public $fac_subtot;
	public $fac_iva;
	public $fac_total;
	public $fac_fabid;
	public $fac_estado;
	public $fac_usuid;
	

}

?>