<?php

    require_once( 'src/Facebook/FacebookSession.php');
    require_once( 'src/Facebook/FacebookRequest.php' );
    require_once( 'src/Facebook/FacebookResponse.php' );
    require_once( 'src/Facebook/FacebookSDKException.php' );
    require_once( 'src/Facebook/FacebookRequestException.php' );
    require_once( 'src/Facebook/FacebookRedirectLoginHelper.php');
    require_once( 'src/Facebook/FacebookAuthorizationException.php' );
    require_once( 'src/Facebook/GraphObject.php' );
    require_once( 'src/Facebook/GraphUser.php' );
    require_once( 'src/Facebook/GraphSessionInfo.php' );
    require_once( 'src/Facebook/Entities/AccessToken.php');
    require_once( 'src/Facebook/HttpClients/FacebookCurl.php' );
    require_once( 'src/Facebook/HttpClients/FacebookHttpable.php');
    require_once( 'src/Facebook/HttpClients/FacebookCurlHttpClient.php');

/* USE NAMESPACES */
    
    use Facebook\FacebookSession;
    use Facebook\FacebookRedirectLoginHelper;
    use Facebook\FacebookRequest;
    use Facebook\FacebookResponse;
    use Facebook\FacebookSDKException;
    use Facebook\FacebookRequestException;
    use Facebook\FacebookAuthorizationException;
    use Facebook\GraphObject;
    use Facebook\GraphUser;
    use Facebook\GraphSessionInfo;
    use Facebook\FacebookHttpable;
    use Facebook\FacebookCurlHttpClient;
    use Facebook\FacebookCurl;

 if(!session_id())
  {
    session_start();
 }

  //check if users wants to logout
   if(isset($_REQUEST['logout'])){
    unset($_SESSION['token']);
   }
  
  //2.Use app id,secret and redirect url 
  $app_id = '1073596266109014';
  $app_secret = 'f456fa84494f6957ac199cdc5724019c';
  $redirect_url='http://localhost/hospital';

  //3.Initialize application, create helper object and get fb sess
   FacebookSession::setDefaultApplication($app_id,$app_secret);
   $helper = new FacebookRedirectLoginHelper($redirect_url);
   $sess = $helper->getSessionFromRedirect();

   //check if facebook session exists
  if(isset($_SESSION['token'])){
    $sess = new FacebookSession($_SESSION['token']);
    try{
      $sess->Validate($app_id, $app_secret);
    }catch(FacebookAuthorizationException $e){
      print_r($e);
    }
  }

  $loggedin = false;
  //get email as well with user permission
  $login_url = $helper->getLoginUrl(array('email'));
  //logout
  $logout = 'http://localhost/hospital/?logout=true';

  //4. if fb sess exists echo name 
    if(isset($sess)){
      //store the token in the php session
      $_SESSION['token']=$sess->getToken();
      //create request object,execute and capture response
      $request = new FacebookRequest($sess,'GET','/me?fields=id,name,email');
      // from response get graph object
      $response = $request->execute();
      $graph = $response->getGraphObject(GraphUser::classname());
      // use graph object methods to get user details
      $id = $graph->getId();
      $name= $graph->getName();
      $email = $graph->getProperty('email');
      $image = 'https://graph.facebook.com/'.$id.'/picture?width=300';
      $loggedin  = true;
  }

?>