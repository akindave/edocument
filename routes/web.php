<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//your api calling will be localhost:8000/api/call

$router->group(['prefix'=>'api'], function() use ($router) {
    $router->post('/login','AuthController@login');
    $router->post('/register','AuthController@register');
    $router->get('/folderlist','EntityController@sendFolderList');


    $router->group(['middleware' => 'auth'], function() use ($router){
        $router->post('/logout','AuthController@logout');

        //abput Categories
        $router->get('/get_all_categories','EntityController@getAllCategories');

        //About Designations
        $router->get('/get_all_designations','EntityController@getAllDesignations');
        $router->get('/get_designation_by_id','EntityController@getDesignationById');
        $router->get('/get_designation_by_category_id','EntityController@getDesignationByCategory');

        //about departments 
        $router->get('/get_all_departments','EntityController@getAllDepartment');

        //about creating the foldr
        $router->post('/createfolder','EntityController@createFolder');
        $router->post('/get_folder_by_parent_folder','EntityController@getFolderByParent');

        //about files
        $router->post('/uploadfile','EntityController@uploadFiles');

        //for users 
        $router->post('/get_current_user','AuthController@getAuthUser');
     
    });
    

});
