<?php

namespace Edisonk\AipSpeech;

use Illuminate\Support\ServiceProvider;

class AipSpeechServiceProvider extends ServiceProvider
{
    protected $defer = true; // 延迟加载服务
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('aipspeech', function ($app) {
            return new AipSpeech($app['config']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/aipspeech.php' => config_path('aipspeech.php'), // 发布配置文件到 laravel 的config 下
        ]);
    }

    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['aipspeech'];
    }
}
