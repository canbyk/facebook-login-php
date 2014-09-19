<?php

require 'load_libs.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;

FacebookSession::setDefaultApplication($access_token, $app_secret);

if(isset($_SESSION["userId"]))
{
    echo "Welcome ".$_SESSION["userName"];
    echo "<br><br>";
    echo '<a href="logout.php">Logout</a>';
}
else
{
    $helper = new FacebookRedirectLoginHelper($redirect_url);
    echo '<a href="' . $helper->getLoginUrl() . '">Login with Facebook</a>';
}