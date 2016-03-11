<script>
$(document).ready(function(e) {
	$('#bgoverlay').hide();
	$('#modal_login').hide();
    $('#login').click(function(e){
		$('#bgoverlay').fadeIn(400);
		$('#modal_login').fadeIn(400);
        $('#fokus').focus();
	});
	$('#bgoverlay').click(function(e){
		$('#bgoverlay').fadeOut(400);
		$('#modal_login').fadeOut(400);
	});
	$('#modal_close').click(function(e){
		$('#bgoverlay').fadeOut(400);
		$('#modal_login').fadeOut(400);
	});
});
</script>
<div id="bgoverlay">
</div>
<div id="modal_login">
	<div id="modal_title">
    	<h2>Login</h2>
    </div>
	<div id="modal_close">
    	<a href="#"><i class="fa fa-times fa-2x"></i></a>
    </div>
    <div id="modal_form">
    	<form action="code_login.php" method="post">
        	<label>
            	<span><i class="fa fa-user fa-lg"></i></span>
                <input id="fokus" type="text" name="brugernavn" />
            </label>
            <label>
            	<span><i class="fa fa-key fa-lg"></i></span>
                <input type="password" name="kodeord" />
            </label>
            <label>
            	<span></span>
                <input type="submit" value="Login"/>
            </label>
            <label>
                <span></span>
                <a href="opret_bruger.php">Opret Bruger</a>
                <a href="glemt_kodeord.php">Glemt Kodeord</a>
            </label>
        </form>
    </div>
</div>