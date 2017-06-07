<?php 
if (isset($_POST['submit'])) {
    $secret = '6LdaLSQUAAAAAGh3m1SX_okY-uBT_vetN4qQshNH';
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
	$url = "https://www.google.com/recaptcha/api/siteverify";
       // Curl Request
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array(
            'secret' => $secret,
            'response' => $response,
            ));
        $curlData = curl_exec($curl);
        curl_close($curl);
 
        // Parse data
        $recaptcha = json_decode($curlData, true);
        if ($recaptcha["success"])
            echo "Success!";
        else
            echo "Failure!";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Google reCAPTCHA</title>
</head>

<body>
    <br><br>
    <form action="" method="post">
        <input type="text" name="myreq"><br>
        <div class="g-recaptcha" data-sitekey="6LdaLSQUAAAAAMa70ISBGq78YICdg42J2JMLXsne" data-size="invisible"></div>
        <input type="submit" name="submit" value="Send Request!">
    </form>
</body>
<script src='https://www.google.com/recaptcha/api.js'></script>
</html>