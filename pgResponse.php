<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");


require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; 

$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); 

if ($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
	

		include "connection.php";

		$t1 = $_POST['ORDERID'];
		$t2 = $_POST['TXNAMOUNT'];

		$qry = "UPDATE bookingtable SET amount='$t2' where ORDERID='$t1'";
		mysqli_query($con, $qry);

		header('Location: reciept.php?id=' . $_POST['ORDERID']);
	} else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
		header('Location: fail.html');
	}

	if (isset($_POST) && count($_POST) > 0) {
		foreach ($_POST as $paramName => $paramValue) {
			echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
} else {
	echo "<b>Checksum mismatched.</b>";

}
