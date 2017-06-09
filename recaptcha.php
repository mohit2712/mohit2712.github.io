<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
	function captchaSubmit(data) {
		document.getElementById("contact").submit();
	}
</script>

<form id="contact" action="submitform.php" method="post">
	<label>Name : <input type="text" name="field"></label>
	<input type="submit" class="g-recaptcha" data-sitekey="6LdaLSQUAAAAAMa70ISBGq78YICdg42J2JMLXsne" data-callback="captchaSubmit" name="Submit" />
</form>