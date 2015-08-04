<?

	#-------------------------------------------------------------------------------------------------------*/
	define('PATH','../../');
	define('PATH_BASE','../../');
	define('MODULE_NAME','PUERTOS');
	
	require_once(PATH."libs/adodb/adodb-exceptions.inc.php");
    require_once(PATH."libs/adodb/adodb.inc.php");
    require_once(PATH."includes/config.php");
    require_once(PATH."includes/conexion.php");
	require_once(PATH."includes/utf8.php");
	#-------------------------------------------------------------------------------------------------------*/	
	
	$db = Conectar();
	$doAction = $_GET['doAction'];
	sleep(10);
	if($doAction=='PUERTOS.getList'){
		
		$sql = "SELECT PUER_PUERTO, `PUER_NAME`, `PUER_RECINTO` , PUER_CONCECIONADO FROM datawarehouse.puertos WHERE  `PUER_ISAPI` = 'S' ORDER BY `PUER_NAME`";
		$rs  = $db->Execute($sql);
		$rows = array();
		
		while ($row = $rs->FetchRow() ){
			$rows[] = array("id"=>$row['PUER_PUERTO'], "name"=>$row['PUER_NAME']);	
		}
		header('Content-Type: application/json');
		echo json_encode(utf8_encode_array($rows));
		
	}
	
	
	
	$db->Close();

?>