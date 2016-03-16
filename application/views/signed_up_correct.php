<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Sto Markt</title>
        
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/style_stoyan.css" media="screen" />
</head>
<body>

<div id="container">
	<h1>You´ve signed up correctly!</h1>

	<div id="body">
            <p>In few seconds you´ll be redirected to Login...</p>
            <img src="<?=site_url('/images/loading.gif')?>">
        </div>
        <p class="footer"> Stoyan Elenkov © 2016</p>
</div>

</body>
</html>
<?php header('Refresh: 3;url='.base_url());?>
