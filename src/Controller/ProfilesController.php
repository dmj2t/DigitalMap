<?php
namespace App\Controller;
use Facebook\FacebookSession; 
//use Facebook\FacebookSession123; 
use Facebook\FacebookRedirectLoginHelper;
use App\Controller\AppController;

class ProfilesController extends AppController
{
	//FacebookSession->setDefaultApplication("823531574391190", "c83f652eb093f3768f09ca5ebbdd7f03");
    //$facebookRedirect = Router::url('/controllers/action', true);
    //$helper = new FacebookRedirectLoginHelper($facebookRedirect);
	
public function index()
     {
        $this->set('users', $this->Users->find('all'));
    }

}