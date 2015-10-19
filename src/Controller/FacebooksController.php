<?php

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Event\Event;
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
use Cake\Mailer\Email;


class FacebooksController extends AppController
{
    public function connect()
    {
        $user1 = $this->Auth->user('username');
        //creating facebook session with appid and secret
        FacebookSession::setDefaultApplication('495121507320772', '5dc66de4d6a39be75d0105dcdb2c6add');
        // facebook login helper with redirect_uri
       // echo  $this->Html->url(array('controller' => 'Users', 'action' => 'profile'));
        $helper = new FacebookRedirectLoginHelper( 'http://localhost:8081/testdigitalmap/users/profile' );

        try {
            $session = $helper->getSessionFromRedirect();
            } catch( FacebookRequestException $ex ) {
            // When Facebook returns an error
            } catch( Exception $ex ) {
            // When validation fails or other local issues
            }

            // see if we have a session
            if ( isset( $session ) ) {
              $this->set('facebookconnect',"connected");
              $this->set('user1', $user1);
              $this->set('loggedUserId',$this->Auth->user("id"));
            } else {
            // show login url
            $this->set('user1', $user1);
            $this->set('facebookloginurl', $helper->getLoginUrl(array( 'email', 'user_friends' )));
            $this->set('loggedUserId',$this->Auth->user("id"));
            
            }
           // $this->set('facebookconnect',"connected");
            //$this->set('user1', $user1);
           // $this->set('loggedUserId',$this->Auth->user("id"));
    }

    
    
//members
    public $paginate = [
        'limit' => 5,
        'order' => [
            'User.username' => 'asc'
        ]
    ];
    
    public $helpers = [
    'Paginator' => ['templates' => 'paginator-templates']
    ];
    
    //restrict access to normal users and redirect them to profile page.
    private function restrictAccess()
    {
        if($this->Auth->user("role") != 'admin')
        {
        $this->Flash->error(__('You are not allowed to access that page.'));
        $this->redirect(['controller' => 'Users', 'action' => 'profile']);
        }
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['logout','register','resetPassword']);
    }
    
    //not used function but defined for future use.
    public function isAuthorized($user) 
    {
       

        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') 
        {
            return true;
        }
        // All registered user can use methods view,edit,profile,user_setting
        if (in_array($this->action, array('view', 'edit','profile','user_setting'))) {
           return true;
        }
        
        

        return parent::isAuthorized($user);
        
    }
  
    //function to load pagination to used in display of user for admin.
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

       
    public function index()
    {
        $this->set('users', $this->Users->find('all'));
    }
  
    //The function shows the admin profile and also restricts access to admin data from normal users.
    public function admin_profile()
    {
         //restrict access to normal users.
         $this->restrictAccess();
         $this->set('users', $this->paginate());
         $this->set('loggedUserId',$this->Auth->user("id"));
         $this->set('user1', $this->Auth->user("username"));
    }
    
    
    //function to display profile of normal user.
    public function profile()   
    {
        
            
            
    }
    
    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }
    
    
public function verifyPassword()
{
    if ($this->request->is('post')) {
        $user = $this->Auth->identify();	
        if ($user) {
            $this->Auth->setUser($user);
               return $this->redirect( ['controller' => 'Users', 'action' => 'index']) ;
            //return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Flash->error(__('Invalid username or password, try again'));
        
    }
    $this->set('user', $user);
    $this->set('loggedUserId',$this->Auth->user("id"));
}
    public function admin_edit($id = null)
    {
        //restrict access to normal users.
        //$this->restrictAccess();
        $user=$this->Users->get($id);
        
         //var_dump($this->validationErrors);
        if ($this->request->is(['post','put'])) {
        $this->Users->patchEntity($user, $this->request->data,['validate' => 'adminUpdate']);
        if ($this->Users->save($user)) {
            $this->Flash->success(__('Saved Success Fully.'));
            return $this->redirect(['action' => 'admin_profile']);
        }
        $this->Flash->error(__('Unable to update details.'));
    }
    $this->set('user', $user);
    $this->set('loggedUserId',$this->Auth->user("id"));
     $this->set('user1', $this->Auth->user("username"));
    
    }
    
    public function edit($id = null)
    {
        $user=$this->Users->get($this->Auth->user('id'));;
        if($this->Auth->user('id')!= $id)
        {
            $this->Flash->error(__('You are not allowed to access that page.'));
            $this->redirect(['controller' => 'Users', 'action' => 'profile']);
        }
        
        //var_dump($this->validationErrors);
        if ($this->request->is(['post','put'])) {
        $this->Users->patchEntity($user, $this->request->data,['validate' => 'adminUpdate']);
        if ($this->Users->save($user)) {
            $this->Flash->success(__('Saved Success Fully.'));
            return $this->redirect(['action' => 'admin_profile']);
        }
        $this->Flash->error(__('Unable to update details.Please fill the fields correctly which are marked in red'));
    }
    $this->set('user', $user);
    $this->set('loggedUserId',$this->Auth->user("id"));
    $this->set('user1', $this->Auth->user("username"));
    }
    
    public function delete($id)
    {
        //restrict access to normal users.
        $this->restrictAccess();
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) 
        {
            $this->Flash->success(__('The User with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'admin_profile']);
        }
    }

    public function add()
    {   
        //restrict access to normal users.
        $this->restrictAccess();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
         $this->set('loggedUserId',$this->Auth->user("id"));
         $this->set('user1', $this->Auth->user("username"));
    }
	
    public function register()
    {
         $user = $this->Users->newEntity();
         if ($this->request->is('post')) {
             if($this->request->data['password'] === $this->request->data['confirm_password'] )
             {
             $this->Users->patchEntity($user,$this->request->data);
             
             if($this->Users->save($user)){
              $this->Flash->success(__('Registration Successful.Please Login to use the service.'));
              return $this->redirect(['action' => 'login']);
         
             }
             $this->Flash->error(__('Unable to register.Please see the details and try Again'));
             }
             $this->Flash->error(__('Unable to register.Please see the details and try Again'));
             }
         
         
        $this->set('user', $user);
    }
//login function to login a user based on role.
    public function login()
    {
        if ($this->request->is('post')) 
            {
                $user = $this->Auth->identify();	
                if ($user) 
                {
                    $this->Auth->setUser($user);
                    if($user['role'] == 'user')
                    {
                        return $this->redirect( ['controller' => 'Users', 'action' => 'profile']);
                    }
                    return $this->redirect( ['controller' => 'Users', 'action' => 'admin_profile']) ;
                    //return $this->redirect($this->Auth->redirectUrl());
                }
                $this->Flash->error(__('Invalid username or password, try again'));
            }
    }



//logout function to logout of system and take them to login page.
public function logout()
{
    $this->Auth->logout();
    return $this->redirect( ['controller' => 'Users', 'action' => 'login']);
}

//reset password 1st validation function which is used by not logged in user.
public function resetPassword()
{
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) 
        {
            $connection = ConnectionManager::get('default');
            $user= (string)$this->request->data['username'];
            $Question1=(string)$this->request->data('Question1');
            $Question2=(string)$this->request->data('Question2');
            $Question3=(string)$this->request->data('Question3');

            $results = $connection->execute('SELECT * FROM users WHERE username=:user ',['user' => $user])->fetchAll('assoc');
            if($results)
            {
                if($results[0]['username'] == $this->request->data['username'] && $results[0]['question_1'] == $this->request->data['Question1'] && $results[0]['question_2'] == $this->request->data['Question2'] && $results[0]['question_3'] == $this->request->data['Question3'] )
                {
                    $user = $this->Users->get($results[0]['id']);
                    $this->Auth->setUser($user);
                 
                    return $this->redirect( ['controller' => 'Users', 'action' => 'reset']);
                }
                else 
                {
                    $this->Flash->error(__('Invalid Details.Please Try Again'));
                    return $this->redirect( ['controller' => 'Users', 'action' => 'resetPassword']) ;
                }
             
            }
            else
            {
                $this->Flash->error(__('Invalid Details.Please Try Again'));
                return $this->redirect( ['controller' => 'Users', 'action' => 'resetPassword']) ;
            }
        }
        $this->set('user', $user);
}
         
          
 
        


    
    //function to rest password 2nd pass, which is used by user after validation of question to reset password.
    public function reset()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post'))
        { 
            if($this->request->data['password'] === $this->request->data['confirm_password'] )
            {
                $user1 = $this->Users->newEntity($this->request->data,['validate' => 'reset']);
                $usersTable = TableRegistry::get('Users');
                $user = $usersTable->get($this->Auth->user('id'));
                $user->password = $this->request->data['password'];
                $usersTable->save($user);
                return $this->redirect( ['controller' => 'Users', 'action' => 'login']) ;
            }
            $this->Flash->error(__('Password Donot Match'));
            return $this->redirect( ['controller' => 'Users', 'action' => 'reset']) ;
        }
     
        $this->set('user', $user);
    }
    
    
    
    public function search()
    { $user = $this->Users->newEntity();
        if ($this->request->is('post'))
        { 
            
        }
     $this->set('user', $user);
        
    }
    public function photo()
    {
        $username = $this->Auth->user('username');
        //creating facebook session with appid and secret
        FacebookSession::setDefaultApplication('495121507320772', '5dc66de4d6a39be75d0105dcdb2c6add');
        // facebook login helper with redirect_uri
       // echo  $this->Html->url(array('controller' => 'Users', 'action' => 'profile'));
        $helper = new FacebookRedirectLoginHelper( 'http://localhost:8081/testdigitalmap/users/profile' );

        try {

            $session = $helper->getSessionFromRedirect();
            } catch( FacebookRequestException $ex ) {
            // When Facebook returns an error
            } catch( Exception $ex ) {
            // When validation fails or other local issues
            }

            // see if we have a session
            if ( isset( $session ) ) {
            // graph api request for user data
            $request = new FacebookRequest( $session, 'GET',  '/me/friends' );
            $response = $request->execute();
            // get response
            $graphObject = $response->getGraphObject();

            // print data
            echo  print_r( $graphObject );
            var_dump($graphObject->getProperty('id'));
            $res = new FacebookRequest($session,'GET','/me/picture?type=large&redirect=false' );
            $res = $res->execute();
            $picture = $res->getGraphObject();
            $this->set('picture',$picture->getProperty('url'));
            var_dump($picture->getProperty('url') );
          // var_dump( $picture );
            echo print_r($session);
            } else {
            // show login url
            $user1 = $this->Auth->user('username');
            $this->set('user1', $user1);
            $this->set('facebookloginurl', $helper->getLoginUrl(array( 'email', 'user_friends' )));
            
            }

        
        
    }
}
?>