<?php
include_once('OAuth.php');

$token = $params = NULL;
$consumer_key = '';
$consumer_secret = '';
$signature_method = new OAuthSignatureMethod_HMAC_SHA1();
$iframelink = 'https://demo.pesapal.com/api/PostPesapalDirectOrderV4';

$amount = 1;
$amount = number_format($amount, 2);//format amount to 2 decimal places
$desc = 'test payment 2020';
$type = 'MERCHANT';
$reference = "vic2020";//unique order id of the transaction, generated by merchant
$first_name = 'first_name'; //[optional]
$last_name = 'last_name'; //[optional]
$email = "ngangavictor10@gmail.com";
$phonenumber = ''; //ONE of email or phonenumber is required

$callback_url = ''; //redirect url, the page that will handle the response from pesapal.
$post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchemainstance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" Amount=\"".$amount."\" Description=\"".$desc."\" Type=\"".$type."\" Reference=\"".$reference."\" FirstName=\"".$first_name."\" LastName=\"".$last_name."\" Email=\"".$email."\" PhoneNumber=\"".$phonenumber."\" xmlns=\"http://www.pesapal.com\" />";
$post_xml = htmlentities($post_xml);

$consumer = new OAuthConsumer($consumer_key, $consumer_secret);
//post transaction to pesapal
$iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET",
    $iframelink, $params);
$iframe_src->set_parameter("oauth_callback", $callback_url);
$iframe_src->set_parameter("pesapal_request_data", $post_xml);
$iframe_src->sign_request($signature_method, $consumer, $token);
?>

<iframe src="<?php echo $iframe_src;?>" width="100%" height="720px" scrolling="auto" frameBorder="0"> <p>Unable to load the payment page</p> </iframe>
