<?php echo doctype('html5') ?>
<head>
	<title><?= $meta['title'] ?></title>
	<?=  meta(
			array(
				array('name'=>'Content-type','content'=>'text/html; charset=utf-8','type'=>'equiv'),
				array('name'=>'X-UA-Compatible','content'=>'IE=edge,chrome=1','type'=>'equiv'),
				array('name'=>'viewport','content'=>'width=device-width'),
				array('name'=>'description','content'=>$meta['description']),
				array('name'=>'copyright','content'=>$copyright)
			)
		) ?>
	<?= css($css) ?>
</head>
<body>
	<?php echo $yield_topbar ?>
	<?php echo $yield_notifications ?>
	<?php echo $yield ?>
	<?php echo js($js) ?>
	<?php if($ga_code!==false): ?>
	<script>
		var _gaq=[['_setAccount','<?php echo $ga_code ?>'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src='//www.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
	<?php endif; ?>
</body>
</html>