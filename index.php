<?php
include_once('/app/utils/class.utils.inc.php');
?>

<!DOCTYPE html>
<html class="no-js" lang="en-GB">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vue</title>

	<meta property="og:title" content="">
	<meta property="og:description" content="">
	<meta property="og:url" content="">
	<meta property="og:site_name" content="">
	<meta property="og:image" content="">

	<link rel="stylesheet" href="/app/theme/css/<?= Utils::getAssetRevision( "master.min.css", "styles" ) ?>" type="text/css" />
</head>

<body id="body">

<div id="app">
    	<my-cmp>
    		
    	</my-cmp>

    	<hr>

    	<my-cmp>

    	</my-cmp>
    </div>
<?php /*
<div id="app">
	<h1>{{ title }}</h1>
	<button @click="title = 'Changed'">Update Title</button>
	<button @click="destroy">Destroy</button>
</div>


<div id="app1">
  <h1 ref="heading">{{ title }}</h1>
  <button v-on:click="show" ref="myButton">Show Paragraph</button>
  <p v-if="showParagraph">This is not always visible</p>
</div>

<div id="app2">
  <h1 ref="heading">{{ title }}</h1>
 	<button @click="onChange">Change something</button>
</div>

<div id="app3">

</div>





*/
?>
<script src="/app/theme/js/<?= Utils::getAssetRevision( "plugins.min.js", "plugin-scripts" ) ?>"></script>
<script src="/app/theme/js/<?= Utils::getAssetRevision( "app.min.js", "scripts" ) ?>"></script>
</body>
</html>