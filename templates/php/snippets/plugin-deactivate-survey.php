<div id="icwpWpsfSurvey" class="hidden icwp-wpsf-dialog">
	<p>Deactivating Shield makes us sad, but you can help us improve by letting us know why.</p>
	<p>This is optional - will you take a second to tell us why you're deactivating Shield?</p>
	<form id="icwpWpsfSurveyForm">
		<ul>
			<?php foreach ( $inputs[ 'checkboxes' ] as $sKey => $sOpt ) : ?>
				<li><label><input name="<?php echo $sKey; ?>" type="checkbox" value="Y">
						<?php echo $sOpt; ?></label></li>
			<?php endforeach; ?>
		</ul>
		<textarea style="width: 360px;" rows="3" placeholder="Any other comments?"></textarea>
	</form>
</div>
