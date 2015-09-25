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

class UsersController extends AppController
{


public function beforeFilter(Event $event)
{
    parent::beforeFilter($event);
    // Allow users to register and logout.
    // You should not add the "login" action to allow list. Doing so would
    // cause problems with normal functioning of AuthComponent.
    $this->Auth->allow(['logout','register','resetPassword']);
}
    

public function index()
     {
        $this->set('users', $this->Users->find('all'));
    }
  
    
     public function admin_profile()
    {
         $this->set('users', $this->Users->find('all'));
    }
    
    
    public function profile()
            
     {
        
        
        $this->Auth->user($this->request->data);
        //creating facebook session with appid and secret
        FacebookSession::setDefaultApplication('495121507320772', '4c4c1997942b05d95b3a929058440dd0');
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
            $request = new FacebookRequest( $session, 'GET', '/me' );
            $response = $request->execute();
            // get response
            $graphObject = $response->getGraphObject();

            // print data
            echo  print_r( $graphObject, 1 );
            echo print_r($session);
            } else {
            // show login url
                $user1 = $this->Auth->user('username');
            $this->set('user1', $user1);
            $this->set('facebookloginurl', $helper->getLoginUrl());
            
            }

            
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }
    
    public function edit($id = null)
    {
        $user=$this->Users->get($id);
         var_dump($user);
         var_dump($this->validationErrors);
        if ($this->request->is(['post','put'])) {
        $this->Users->patchEntity($user, $this->request->data,['validate' => 'adminUpdate']);
        if ($this->Users->save($user)) {
            $this->Flash->success(__('Saved Success Fully.'));
            return $this->redirect(['action' => 'admin_profile']);
        }
        $this->Flash->error(__('Unable to update details.'));
    }
    $this->set('user', $user);
    }
    
    
public function delete($id)
{
    $this->request->allowMethod(['post', 'delete']);

    $user = $this->Users->get($id);
    if ($this->Users->delete($user)) {
        $this->Flash->success(__('The User with id: {0} has been deleted.', h($id)));
        return $this->redirect(['action' => 'admin_profile']);
    }
}

    public function add()
    {
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
    }
	
public function register()
    {
       
      /*
        $user = $this->Users->newEntity($this->request->data);
        if ($this->request->is('post')) {
           // $user = $this->Users->newEntity();
            //$user=$this->Users->patchEntity($this->request->data);
            $connection = ConnectionManager::get('default');
            $results = $connection->execute('SELECT * FROM users WHERE username=:user ',['user' => $this->request->data['username']])->fetchAll('assoc');
            var_dump($results);
            if($results)
             {
                 $this->Flash->error(__('Username is not available.Please try Again with different username')); 
                  $this->set('user', $user);
                 return $this->redirect( ['controller' => 'Users', 'action' => 'register']);
             }
             else{
                 $this->Users->save($user);
                $this->Flash->success(__('Registration Successful.Please Login to use the service.'));
                return $this->redirect(['action' => 'login']);
             }
             */
           /* if ($this->Users->save($user)) {
                $this->Flash->success(__('Registration Successful.Please Login to use the service.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Unable to register.Please try Again'));*/
       // }
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




public function login()
{
    if ($this->request->is('post')) {
        $user = $this->Auth->identify();	
        if ($user) {
            $this->Auth->setUser($user);
            if($user['role'] == 'user'){
                return $this->redirect( ['controller' => 'Users', 'action' => 'profile']);
            }
               return $this->redirect( ['controller' => 'Users', 'action' => 'admin_profile']) ;
            //return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Flash->error(__('Invalid username or password, try again'));
    }
}

public function user_setting()
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
}

public function logout()
{
    $this->Auth->logout();
    return $this->redirect( ['controller' => 'Users', 'action' => 'login']);
}


public function resetPassword()
    {
    
         $user = $this->Users->newEntity();
         if ($this->request->is('post')) {
             
             
             //$user1 = $this->Users->newEntity();
            //$user1->patchEntity($user1, $this->request->data);
            //var_dump($user1);
             $connection = ConnectionManager::get('default');
             $user= (string)$this->request->data['username'];
             $Question1=(string)$this->request->data('Question1');
            $Question2=(string)$this->request->data('Question2');
            $Question3=(string)$this->request->data('Question3');
      
             //$results = $connection->execute('SELECT * FROM users WHERE username = :user', ['user' => $this->request->data[username]])->fetchAll('assoc');
             /*$results = $connection->execute('SELECT * FROM users '
                     . 'WHERE username=:username '
                     . 'AND question_1=:Question1 '
                     . 'AND question_2=:Question2 '
                     . 'AND question_3=:Question3', 
                    ['username' => $username,'Question1'=>$Question1,'Question2'=>$Question2,'Question3'=>$Question3]
                     )->fetchAll('assoc');*/
         
         $results = $connection->execute('SELECT * FROM users WHERE username=:user ',['user' => $user])->fetchAll('assoc');
             if($results)
             {
                 if($results[0]['username'] == $this->request->data['username'] && $results[0]['question_1'] == $this->request->data['Question1'] && $results[0]['question_2'] == $this->request->data['Question2'] && $results[0]['question_3'] == $this->request->data['Question3'] ){
                 $user = $this->Users->get($results[0]['id']);
                 $this->Auth->setUser($user);
                 
                 return $this->redirect( ['controller' => 'Users', 'action' => 'reset']);
             }
 else {
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
         
          
 
        


    
    
    public function reset()
    {
      $user = $this->Users->newEntity();
      if ($this->request->is('post')) { 
           if($this->request->data['password'] === $this->request->data['confirm_password'] )
             {
          $user1 = $this->Users->newEntity(
   $this->request->data,
    ['validate' => 'reset']);
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
}
?>