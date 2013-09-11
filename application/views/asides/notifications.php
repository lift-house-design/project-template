<? if(!empty($notifications)){ ?>
	<div class="notifications">
		<ul>
			<li><?= implode('</li><li>',$notifications) ?></li>
		</ul>
	</div>
<? } ?>
<? if(!empty($errors)){ ?>
	<div class="errors">
		<?/* $errors are already <li> separated */?>
		<ul><?= $errors ?></ul> 
	</div>
<? } ?>