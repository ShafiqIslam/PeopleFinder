<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/home', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/search', array('controller' => 'pages', 'action' => 'display', 'search'));
	Router::connect('/report_missing', array('controller' => 'profiles', 'action' => 'report_missing'));
	Router::connect('/report_found', array('controller' => 'profiles', 'action' => 'report_found'));
	Router::connect('/myaccount', array('controller' => 'reporters', 'action' => 'myaccount'));
	Router::connect('/change_pass', array('controller' => 'reporters', 'action' => 'change_pass'));
	Router::connect('/change_account', array('controller' => 'reporters', 'action' => 'change_account'));
	Router::connect('/my_reports', array('controller' => 'reporters', 'action' => 'my_reports'));
	Router::connect('/signup', array('controller' => 'pages', 'action' => 'display', 'signup'));
	Router::connect('/login', array('controller' => 'reporters', 'action' => 'login'));
	Router::connect('/search_result', array('controller' => 'pages', 'action' => 'display', 'search_result'));
	Router::connect('/search_result_details', array('controller' => 'pages', 'action' => 'display', 'search_result_details'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	Router::connect('/admin', array('controller' => 'users', 'action' => 'login' ,'admin'=>true));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
