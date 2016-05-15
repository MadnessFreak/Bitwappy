<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Bitwappy</title>
	
	<meta name="description" content="Easy and secure file uploading and sharing.">
	<meta name="keywords" content="bitwappy, bit, file, image, video, upload, uploading, share, sharing">

	<link href="css/bootstrap.min.css" rel="stylesheet">

	<link rel="icon" href="favicon.png" type="image/x-icon"/>
	<link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div>
		<label for="private_key">Private Key</label><br/>
		<textarea id="private_key" rows="15" cols="65">-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQDlOJu6TyygqxfWT7eLtGDwajtNFOb9I5XRb6khyfD1Yt3YiCgQ
WMNW649887VGJiGr/L5i2osbl8C9+WJTeucF+S76xFxdU6jE0NQ+Z+zEdhUTooNR
aY5nZiu5PgDB0ED/ZKBUSLKL7eibMxZtMlUDHjm4gwQco1KRMDSmXSMkDwIDAQAB
AoGAfY9LpnuWK5Bs50UVep5c93SJdUi82u7yMx4iHFMc/Z2hfenfYEzu+57fI4fv
xTQ//5DbzRR/XKb8ulNv6+CHyPF31xk7YOBfkGI8qjLoq06V+FyBfDSwL8KbLyeH
m7KUZnLNQbk8yGLzB3iYKkRHlmUanQGaNMIJziWOkN+N9dECQQD0ONYRNZeuM8zd
8XJTSdcIX4a3gy3GGCJxOzv16XHxD03GW6UNLmfPwenKu+cdrQeaqEixrCejXdAF
z/7+BSMpAkEA8EaSOeP5Xr3ZrbiKzi6TGMwHMvC7HdJxaBJbVRfApFrE0/mPwmP5
rN7QwjrMY+0+AbXcm8mRQyQ1+IGEembsdwJBAN6az8Rv7QnD/YBvi52POIlRSSIM
V7SwWvSK4WSMnGb1ZBbhgdg57DXaspcwHsFV7hByQ5BvMtIduHcT14ECfcECQATe
aTgjFnqE/lQ22Rk0eGaYO80cc643BXVGafNfd9fcvwBMnk0iGX0XRsOozVt5Azil
psLBYuApa66NcVHJpCECQQDTjI2AQhFc1yRnCU/YgDnSpJVm1nASoRUnU8Jfm3Oz
uku7JUXcVpt08DFSceCEX9unCuMcT72rAQlLpdZir876
-----END RSA PRIVATE KEY-----</textarea>
		<hr>
		<label for="public_key">Public Key</label><br/>
		<textarea id="public_key" rows="15" cols="65">-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDlOJu6TyygqxfWT7eLtGDwajtN
FOb9I5XRb6khyfD1Yt3YiCgQWMNW649887VGJiGr/L5i2osbl8C9+WJTeucF+S76
xFxdU6jE0NQ+Z+zEdhUTooNRaY5nZiu5PgDB0ED/ZKBUSLKL7eibMxZtMlUDHjm4
gwQco1KRMDSmXSMkDwIDAQAB
-----END PUBLIC KEY-----</textarea><br>
		<label for="input">Text to encrypt:</label><br/>
		<textarea id="input" name="input" type="text" rows="4" cols="70">This is a test!</textarea><br/>
		<input id="encode" type="button" value="Encode" /><br>
		<input id="decode" type="button" value="Decode" />
	</div>
	<script src="//code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jsencrypt.min.js"></script>
	<script type="text/javascript">
		$(function()
		{
			$('#encode').click(function()
			{
				// Encrypt with the public key...
				var encrypt = new JSEncrypt();
				encrypt.setPublicKey($('#public_key').val());

				var encrypted = encrypt.encrypt($('#input').val());
				$('#input').val(encrypted);
			});

			$('#decode').click(function()
			{
				var encrypted = $('#input').val();

				// Decrypt with the private key...
				var decrypt = new JSEncrypt();
				decrypt.setPrivateKey($('#private_key').val());

				var uncrypted = decrypt.decrypt(encrypted);
				$('#input').val(uncrypted);
			});
		});
	</script>
</body>
</html>