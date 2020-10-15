<?php
//Modelo

require_once '../Model/MasterModel.php';

class tbl_borrador_factura extends MasterModel{

	public $fab_id;
	public $fab_sucid;
	public $fab_clinit;
	public $fab_fecha;
	public $fab_subtot;
	public $fab_iva;
	public $fab_total;

	

}

?>