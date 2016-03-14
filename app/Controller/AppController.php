<?php

App::uses('Controller', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

class AppController extends Controller {
	public $components = array(
        'Session', 'RequestHandler','Cookie',
        'Auth' => array(
            'loginAction' => array('controller' => 'users', 'action' => 'login', 'admin' => true),
            'loginRedirect' => array('controller' => 'users', 'action' => 'dashboard', 'admin' => true),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login', 'admin' => true),
            'authError' => 'You are not allowed',
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email', 'password' => 'password')
                )
            )
        )
    );
    
    public function beforeFilter(){
        // set cookie options
        /*$this->Cookie->key = 'klgjs&*(#fsdfsdfsdf%(54646tqwdsuhf&*^Hjhsdgf5465464';
        $this->Cookie->httpOnly = true;*/
        
        if($this->params['admin']){
            $this->layout =  'admin';
        }
        if (!$this->Auth->loggedIn() && $this->Cookie->read('remember_me_cookie')) {
            $cookie = $this->Cookie->read('remember_me_cookie');
            //print_r($cookie); exit;
            $this->loadModel('User');
            $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.username' => $cookie['username'],
                    'User.password' => $cookie['password'],
                    //'User.role' => 'admin'
                )
            ));

            if ($user && !$this->Auth->login($user['User'])) {
                $this->redirect('/users/logout'); // destroy session & cookie
            }
        }
        $this->Auth->allow('display');
    }
}
