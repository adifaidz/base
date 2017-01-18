<?php

$this->router->post('logout', [
  'as' => 'client.logout',
  'uses'=> 'Client\Auth\LoginController@logout',
]);

$this->router->get('dashboard', [
  'as' => 'client.home',
  'uses' => 'Client\HomeController@index',
]);

//Routes for AdiFaidz\Base\UserProfile

$this->router->bind('userprofile', function ($value){
  try {
    return \AdiFaidz\Base\UserProfile::findOrFail($value);
  } catch (Exception $e) {
    return App::abort('404');
  }
}) ;

$this->router->group(['prefix' => 'userprofile'], function () {

  $this->router->get('/edit/{userprofile}', [
    'as' => 'client.userprofile.edit',
    'uses' => 'Client\UserProfileController@edit',
  ]);

  $this->router->put('{userprofile}', [
    'as' => 'client.userprofile.update',
    'uses' => 'Client\UserProfileController@update',
  ]);

  $this->router->get('/show/{userprofile}', [
    'as' => 'client.userprofile.show',
    'uses' => 'Client\UserProfileController@show',
  ]);
});