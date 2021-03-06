<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        
         $validator
            ->requirePresence('username')
            ->notEmpty('username', 'A username is required')
            ->add('username', [
            'length' => [
            'rule' => ['minLength', 5],
            'message' => 'Username Should be at least 5 characters long',
        ]
    ])
           ->add('username',['unique' => 
            [
            'rule'    => ['validateUnique'],
            'provider' => 'table',
            'message' => 'This username has already been taken.',
            ]
    ])
    
            ->notEmpty('password', 'A password is required')
                 ->add('password', [
                'length' => [
                'rule' => ['minLength', 8],
                'message' => 'Password Should be at least 8 characters long ',
        ]
    ])
            ->notEmpty('confirm_password', 'To confirm your password, you need to retype the new password')
                 ->add('confirm_password', [
                'length' => [
                'rule' => ['minLength', 8],
                'message' => 'Password Should be at least 8 characters long ',
        ]
    ])
	->notEmpty('email', 'An email is required')
                 ->add('email',['unique' => 
            [
            'rule'    => ['validateUnique'],
            'provider' => 'table',
            'message' => 'You have already registerd this email for the service.',
            ]
    ])
	->notEmpty('address', 'An address is required')
                 ->add('address', [
                'length' => [
                'rule' => ['minLength', 3],
                'message' => 'Address Should be at least 3 characters long ',
        ]
    ])
	->notEmpty('birth_dt', 'Date of birth is required')
                 
	->notEmpty('question_1', 'Answer to question 1  is required')
                 ->add('question_1', [
                'length' => [
                'rule' => ['minLength', 3],
                'message' => ' Answer Should be at least 8 characters long ',
        ]
    ])
	->notEmpty('question_2', 'Answer to question 2  is required')
	->notEmpty('question_3', 'Answer to question 3  is required')
        ->notEmpty('role', 'A role is required');
        /* ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'user']],
                'message' => 'Please enter a valid role'
            ]);*/
         

         
       
         return $validator;
       
 
			
    }
    
    
    public function validationAdminUpdate(Validator $validator)
    {
         $validator
            ->requirePresence('username')
            ->notEmpty('username', 'A username is required')
            ->add('username', [
        'length' => [
            'rule' => ['minLength', 5],
            'message' => 'Username Should be at least 5 characters long',
        ]
    ])
            ->notEmpty('password', 'A password is required')
                 ->add('password', [
                'length' => [
                'rule' => ['minLength', 8],
                'message' => 'Password Should be at least 8 characters long ',
        ]
    ])
                 
	->notEmpty('email', 'An email is required')
	->notEmpty('address', 'An address is required')
	->notEmpty('birth_dt', 'Date of birth is required')
	->allowEmpty('question_1', 'Answer to question 1  is required')
	->allowEmpty('question_2', 'Answer to question 2  is required')
	->allowEmpty('question_3', 'Answer to question 3  is required');
         return $validator;
       
 
			
    }
    
    public function validationVerify(Validator $validator)
    {
        $validator
                ->add('username', ['length' => 
    ['rule' => ['minLength', 5],
            'message' => 'Username Should be at least 5 characters long',
        ]
    ])
            ->notEmpty('username', 'A username is required')
            
           ->notEmpty('Question1', 'Answer to question 1  is required')
	->notEmpty('Question2', 'Answer to question 2  is required')
	->notEmpty('Question3', 'Answer to question 3  is required');
       
      return $validator;
    }
    
    
    public function validationReset(Validator $validator)
    {
        $validator
            ->notEmpty('password', 'New Password Is Required')
            ->add('password', [
                'length' => [
                'rule' => ['minLength', 8],
                'message' => 'Password Should be at least 8 characters long ',
        ]
    ])
           ->notEmpty('confirm_password', 'Confirmation of New Password Is Required')
                  ->add('confirm_password', [
                'length' => [
                'rule' => ['minLength', 8],
                'message' => 'Password Should be at least 8 characters long ',
        ]
    ]) ;
         
      
       
         return $validator;
        
			
    }
    
    public function validationUserUpdate(Validator $validator)
    {
         $validator
            ->requirePresence('username')
            ->notEmpty('username', 'A username is required')
            ->add('username', [
        'length' => [
            'rule' => ['minLength', 5],
            'message' => 'Username Should be at least 5 characters long',
        ]
    ])
            ->notEmpty('password', 'A password is required')
                 ->add('password', [
                'length' => [
                'rule' => ['minLength', 8],
                'message' => 'Password Should be at least 8 characters long ',
        ]
    ])
                 
	->notEmpty('email', 'An email is required')
	->notEmpty('address', 'An address is required')
	->notEmpty('birth_dt', 'Date of birth is required')
	->notEmpty('question_1', 'Answer to question 1  is required')
	->notEmpty('question_2', 'Answer to question 2  is required')
	->notEmpty('question_3', 'Answer to question 3  is required');
         
         return $validator;
       
 
			
    }

}

?>