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
use Facebook\GraphUser;

FacebookSession::setDefaultApplication($access_token, $app_secret);

/*
 * First initialization of facebook session with url redirection.
 * If we already established a session skip thip part and use access_token. 
 */
if (!isset($_SESSION["access_token"])) {
    $helper = new FacebookRedirectLoginHelper($redirect_url);
    try {
        $session = $helper->getSessionFromRedirect();
    } catch(FacebookRequestException $ex) {
        // When Facebook returns an error
        echo('Facebook request exception caught :'.var_dump($ex));
    } catch(\Exception $ex) {
        // When validation fails or other local issues
        echo('Exception caught :'.var_dump($ex));
    }
}


if (isset($_SESSION["access_token"]) || isset($session)) {
    try {
        /*
         * Store access_token from first session
         */
        if(!isset($_SESSION["access_token"]) && isset($session))
        {
            $_SESSION["access_token"] = $session->getToken();
        }
        
        /*
         * Use access_token to re-establish facebook session.
         */
        if(!isset($session))
        {
            $session = new FacebookSession($_SESSION["access_token"]);
        }
        
        $user_profile = (new FacebookRequest(
            $session, 'GET', '/me?fields=id,name'
        ))->execute()->getGraphObject(GraphUser::className());
        
        $_SESSION["userId"] = $user_profile->getId();
        $_SESSION["userName"] = $user_profile->getName();
        header( 'Location: index.php' );

    } catch(FacebookRequestException $e) {
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
    }   
}
else
{
    echo "Error :(";
}


 