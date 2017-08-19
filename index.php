<?php
	include_once('/app/utils/class.utils.inc.php');
?>

<!DOCTYPE html>
<html class="no-js" lang="en-GB">
	<head>
		<meta charset="utf-8">
	        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Website</title>

		<meta property="og:title" content="">
	    <meta property="og:description" content="">
	    <meta property="og:url" content="">
	    <meta property="og:site_name" content="">
	    <meta property="og:image" content="">

		<link rel="stylesheet" href="/app/theme/css/<?= Utils::getAssetRevision( "master.min.css", "styles" ) ?>" type="text/css" />
	</head>
	<body id="body">
		

		<script src="/app/theme/js/<?= Utils::getAssetRevision( "plugins.min.js", "plugin-scripts" ) ?>"></script>
		<script src="/app/theme/js/<?= Utils::getAssetRevision( "app.min.js", "scripts" ) ?>"></script>
	</body>
</html>