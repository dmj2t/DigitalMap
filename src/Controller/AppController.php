<?php
namespace App\Controller;
//define('FACEBOOK_SDK_V4_SRC_DIR', '\\..\\..\\Vendor\\FACEBOOK_SDK_V4_SRC_DIR\\src\\Facebook\\');
//require_once("autoload.php");
//if (!isset($_SESSION)) session_start();


require_once( 'Facebook/FacebookSession.php' );
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php' );
require_once( 'Facebook/FacebookRequestException.php' );
require_once( 'Facebook/FacebookAuthorizationException.php' );
require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/Entities/AccessToken.php' );
require_once( 'Facebook/HttpClients/FacebookHttpable.php' );
require_once( 'Facebook/HttpClients/FacebookCurlHttpClient.php' );
require_once( 'Facebook/HttpClients/FacebookCurl.php' ); 
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookCurl; 
use Facebook\FacebookSession;

//use Facebook\FacebookSession;
//use Facebook\FacebookRequest;
//use Facebook\GraphUser;
//use Facebook\FacebookRequestException;
//use Facebook\FacebookRedirectLoginHelper;
use Cake\Controller\Controller;
use Cake\Event\Event;
 
class AppController extends Controller
{
    //...
   
    public function initialize()
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'profile'
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]
        ]);
        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
        ]);
    }

    
     public function isAuthorized($user = null)
    {
        // Any registered user can access public functions
        if (empty($this->request->params['prefix'])) {
            return true;
        }

        // Only admins can access admin functions
        if ($this->request->params['prefix'] === 'admin') {
            return (bool)($user['role'] === 'admin');
        }

        // Default deny
        return false;
    }
    public function beforeFilter(Event $event)
    {
        
        $this->Auth->allow(['index', 'view', 'display']);
        $user = $this->Auth->user();
        $this->set(compact('user'));
        
    }

}
?>