<script type="text/javascript">
var showMore = <?php echo $moreOptions; ?>;

$(function () {
	showMore = !showMore;
	r_show_more_options($("#more_options_btn")[0]);

	//go to top window
	if (window.self != window.top) {
		if (window.parent.location.toString().match(/\?action=admin/)) {
			window.parent.location.reload();
		}
	}
});

function r_show_more_options(btn) {
	if (!showMore) {
		$("#more_options").show();
		$(btn).html("Less &raquo;");
		showMore = 1;
		$("#show_more_options").val(1);
	}
	else {
		$("#more_options").hide();	
		$(btn).html("More &raquo;");
		showMore = 0;
		$("#show_more_options").val(0);
	}
	return false;
}
</script>



<div class="container login-panel">
	
	<fieldset>
		<h1>Welcome to MongoDB Administration</h1>
	</fieldset>

	<fieldset>
		<legend>
			Log in
		</legend>
		<!-- 
		<h1>Welcome to MongoDB Administration</h1>
		<div class="dotted"></div> -->

		<?php if (isset($message)):?> 
			<div class="errorMsg">
				
				<p><?php h($message); ?> </p>
				
			</div>
		<?php endif;?>

		<form method="post" style="display: block;" class="login">
			<input type="hidden" name="more" id="show_more_options" value="<?php echo $moreOptions; ?>"/>
			
			<div class="item">
				<label for="host">Host:</label>
				<?php render_select_hosts("host", $hostIndex); ?>
			</div>

			<div class="item">

				<label for="usrename"><?php hm("username"); ?>:</label>
				<input type="text" name="username" value="<?php echo $username;?>"  size="24" class="textfield"/>
			
			</div>

			<div class="item">

				<label for="password"><?php hm("password"); ?>:</label>
				<input type="password" name="password" size="24" class="textfield"/>

			</div>

			<div class="item">
				
				<p> <strong>Non-Admin users:</strong> </p>
				
			</div>

			<div class="item">

				<label for="dbname">DB Name(s)</label>
				<input type="text" name="db" value="<?php h($db); ?>" size="24" class="textfield"/>

			</div>
			
			<div class="item">
				<a href="#" onclick="return r_show_more_options(this)" id="more_options_btn">More &raquo;</a>
			</div>
			
			<div style="display:none" id="more_options">
				
				<div class="item">
				
					<label for="language"><?php hm("language"); ?>:</label>
					<select name="lang" class="select-list">
						<?php foreach ($languages as $code => $lang):?>
						<option value="<?php h($code);?>" <?php if(x("lang") == $code || (x("lang") ==""&&__LANG__==$code)): ?>selected="selected"<?php endif;?> ><?php h($lang); ?></option>
						<?php endforeach;?>
					</select>

				</div>

				<div class="item">
				
					<label for="language"><?php hm("alive"); ?>:</label>
					<select name="expire" class="select-list">
						<?php foreach ($expires as $long => $name):?>
						<option value="<?php h($long);?>"><?php h($name);?></option>
						<?php endforeach;?>
					</select>

				</div>

			</div>
			
			<div class="item">
				<button class="login-button"><?php hm("loginandrock"); ?></button>
				<!-- <input type="submit" value="<?php hm("loginandrock"); ?>"/> -->
			</div>

		
	<fieldset>	
	
			
		</form>

			
		<?php hm("rockmongocredits") ?>

</div>