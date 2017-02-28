<?php

Route::get('/', 'PostController@index');
Route::post('upload/uploadImg', 'UploadController@upload');

//前台
Route::get('test', 'PostController@test');
Route::get('by-tag/{tag}', ['as' => 'article-by-tag', 'uses' => 'PostController@getByTag']);
Route::get('list/{type}', ['as' => 'article.list', 'uses' => 'PostController@getByType']);
Route::resource("post", 'PostController');
Route::post("post_comment/create", ['as' => 'post_comment.store','uses' => 'PostController@postComment']);

//后台
/**
 * auth路由组
 */
Route::group(['prefix' => 'auth'], function()
{
    Route::get('login', ['as' => 'login','uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'login.post','uses' => 'AuthController@postLogin']);
    Route::get('loginOut', ['as' => 'login.out','uses' => 'AuthController@getLoginOut']);
});

//系统管理
Route::group(['namespace' => 'Admin','middleware' => ['auth', 'authorize']], function()
{
    //后台首页
    Route::resource('admin', 'AdminController');
    //账户
    Route::get('user/personal', ['as' => 'user.personal', 'uses' => 'UserController@getPersonal']);
    Route::post('user/personal', ['as' => 'user.personal.post', 'uses' => 'UserController@postPersonal']);
    Route::resource("user", 'UserController');
    //角色
    Route::get('role/permission/{id}', ['as' => 'role.edit.permission', 'uses' => 'RoleController@editPermission']);
    Route::put('role/permission/{id}', ['as' => 'role.update.permission', 'uses' => 'RoleController@updatePermission']);
    //权限关联
    Route::get('permission/related/{id}', ['as' => 'permission.related', 'uses' => 'PermissionController@related']);
    Route::post('permission/relatedMenu', ['as' => 'permission.related.menu', 'uses' => 'PermissionController@relatedMenu']);
    Route::post('permission/relatedAction', ['as' => 'permission.related.action', 'uses' => 'PermissionController@relatedAction']);
    Route::resource("role", 'RoleController');
    Route::resource("permission", 'PermissionController');
    Route::resource("menu", 'MenuController');
    Route::resource("action", 'ActionController');
    //文章管理
    Route::get('article/markdown', ['as' => 'article.create.markdown', 'uses' => 'ArticleController@getMarkdown']);
    Route::post('article/markdown', ['as' => 'article.store.markdown', 'uses' => 'ArticleController@postMarkdown']);
    Route::put('article/markdown', ['as' => 'article.update.markdown', 'uses' => 'ArticleController@updateMarkdown']);
    Route::get('article/check/{id}/{status}', ['as' => 'article.check', 'uses' => 'ArticleController@check']);
    Route::resource("article", 'ArticleController');
    Route::resource("tag", 'TagController');
    Route::resource("comment", 'CommentController');
    Route::get('comment/check/{id}/{status}', ['as' => 'comment.check', 'uses' => 'CommentController@check']);

});

