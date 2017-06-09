<?php
    function post_captcha($user_response) {
		
		$secret = "6LdaLSQUAAAAAGh3m1SX_okY-uBT_vetN4qQshNH";
		//$remoteip = $_SERVER["REMOTE_ADDR"];
		$url = "https://www.google.com/recaptcha/api/siteverify";
		print_r($_POST["g-recaptcha-response"]);
		$response = $_POST["g-recaptcha-response"];
		// Curl Request
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, array(
			'secret' => $secret,
			'response' => $response,
			//'remoteip' => $remoteip
			));
		$curlData = curl_exec($curl);
		curl_close($curl);
        return json_decode($curlData, true);
		
		
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);
print_r($res);
echo '<br/>';
    if (!$res['success']) {
        // What happens when the reCAPTCHA is not properly set up
        echo 'reCAPTCHA error: Check to make sure your keys match the registered domain and are in the correct locations. You may also want to doublecheck your code for typos or syntax errors.';
    } else {
        // If CAPTCHA is successful...

        // Paste mail function or whatever else you want to happen here!
        echo '<br><p>CAPTCHA was completed successfully!</p><br>';
    }
?>

