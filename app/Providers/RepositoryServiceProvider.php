<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\MenuRepository;
use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\ActionRepository;
use App\Repositories\TagRepository;
use App\Repositories\CommentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 合并自定义配置文件
//        $configuration = realpath(__DIR__ . '/../../config/repository.php');
//        $this->mergeConfigFrom($configuration, 'repository');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMenuRepository();
        $this->registerUserRepository();
        $this->registerRoleRepository();
        $this->registerActionRepository();
        $this->registerPermissionRepository();
        $this->registerArticleRepository();
        $this->registerTagRepository();
        $this->registerCommentRepository();
    }

    /**
     * Register the Menu Repository
     *
     * @return mixed
     */
    public function registerMenuRepository()
    {
        $this->app->singleton('MenuRepository', function ($app) {
            $model = config('repository.models.menu');
            $menu = new $model();
            $validator = $app['validator'];

            return new MenuRepository($menu, $validator);
        });

        $this->app->alias('MenuRepository', MenuRepository::class);
    }

    public function registerUserRepository()
    {
        $this->app->singleton('UserRepository', function ($app) {
            $model = config('repository.models.user');
            $user = new $model();
            $validator = $app['validator'];

            return new UserRepository($user, $validator);
        });

        $this->app->alias('UserRepository', UserRepository::class);
    }

    public function registerRoleRepository()
    {
        $this->app->singleton('RoleRepository', function ($app) {
            $model = config('repository.models.role');
            $role = new $model();
            $validator = $app['validator'];

            return new RoleRepository($role, $validator);
        });

        $this->app->alias('RoleRepository', RoleRepository::class);
    }

    public function registerActionRepository()
    {
        $this->app->singleton('ActionRepository', function ($app) {
            $model = config('repository.models.action');
            $action = new $model();
            $validator = $app['validator'];

            return new ActionRepository($action, $validator);
        });

        $this->app->alias('ActionRepository', ActionRepository::class);
    }

    public function registerPermissionRepository()
    {
        $this->app->singleton('PermissionRepository', function ($app) {
            $model = config('repository.models.permission');
            $permission = new $model();
            $validator = $app['validator'];

            return new PermissionRepository($permission, $validator);
        });

        $this->app->alias('PermissionRepository', PermissionRepository::class);
    }

    public function registerArticleRepository()
    {
        $this->app->singleton('ArticleRepository', function ($app) {
            $model = config('repository.models.article');
            $article = new $model();
            $validator = $app['validator'];

            return new ArticleRepository($article, $validator);
        });

        $this->app->alias('ArticleRepository', ArticleRepository::class);
    }

    public function registerTagRepository()
    {
        $this->app->singleton('TagRepository', function ($app) {
            $model = config('repository.models.tag');
            $tag = new $model();
            $validator = $app['validator'];

            return new TagRepository($tag, $validator);
        });

        $this->app->alias('TagRepository', TagRepository::class);
    }

    public function registerCommentRepository()
    {
        $this->app->singleton('CommentRepository', function ($app) {
            $model = config('repository.models.comment');
            $tag = new $model();
            $validator = $app['validator'];

            return new CommentRepository($tag, $validator);
        });

        $this->app->alias('CommentRepository', CommentRepository::class);
    }
}
