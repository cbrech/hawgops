<?php
	require("../../req/all/codes.php");
	require("../../req/all/api-v1.php");
	
	logDoMsg("Logging in [TESTING ONLY]");
	
	$logPrefix = "[DO | login-do] ";
	
	if(!isset($_POST["email"]) || $_POST["email"] == "") {
		logErrorMsg($logPrefix."Email address was not received. ($DO_LOGIN_EMAIL_NOT_RECEIVED)");
		return $DO_LOGIN_EMAIL_NOT_RECEIVED;
	}
	
	if(!isset($_POST["password"]) || $_POST["password"] == "") {
		logErrorMsg($logPrefix."Password was not received. ($DO_LOGIN_PASSWORD_NOT_RECEIVED)");
		return $DO_LOGIN_PASSWORD_NOT_RECEIVED;
	}
	
	if(isset($_GET["scenario"]) && $_GET["scenario"] != "" && isset($_GET["share"]) && $_GET["share"] == "1") {
		logInfoMsg($logPrefix."User logging in to view a shared scenario.");
		$referText = "?scenario=".$_GET["scenario"];
	} else {
		$referText = "";
	}
	
	$api_response = login($_POST["email"], $_POST["password"]);
	if($api_response == $API_LOGIN_USER_AUTHENTICATED) {
		if($referText == "") {
			header("Location: /my-scenarios");
		} else {
			header("Location: /cas".$referText);
		}
	} else {
		header("Location: /login?s=$api_response");
	}
	closeLogs();
?>