<?php

define("FACEBOOK_ROOT", $_SERVER['DOCUMENT_ROOT']."/facebook-php-sdk-v4-4.0-dev/src/Facebook/");

session_start();

require_once( FACEBOOK_ROOT."FacebookSession.php" );
require_once( FACEBOOK_ROOT."FacebookRedirectLoginHelper.php" );
require_once( FACEBOOK_ROOT."FacebookRequest.php" );
require_once( FACEBOOK_ROOT."FacebookResponse.php" );
require_once( FACEBOOK_ROOT."FacebookSDKException.php" );
require_once( FACEBOOK_ROOT."FacebookRequestException.php" );
require_once( FACEBOOK_ROOT."FacebookAuthorizationException.php" );
require_once( FACEBOOK_ROOT."GraphObject.php" );
require_once( FACEBOOK_ROOT."GraphUser.php" );
require_once( FACEBOOK_ROOT.'Entities/AccessToken.php');
require_once( FACEBOOK_ROOT.'HttpClients/FacebookHttpable.php');
require_once( FACEBOOK_ROOT.'HttpClients/FacebookCurl.php');
require_once( FACEBOOK_ROOT.'HttpClients/FacebookCurlHttpClient.php');

$access_token = "ACCESS_TOKEN";
$app_secret = "APP_SECRET";

$site_url = "SITE_URL";
$redirect_url = $site_url."fb_redirect.php";
