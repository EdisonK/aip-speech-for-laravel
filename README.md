
# 安装
composer require "edisonk/aip-speech-for-laravel:dev-master" -vvv

# 配置

1，在 config/app.php 注册 ServiceProvider 和 Facade 

'providers' => [

    // ...
     Edisonk\AipSpeech\AipSpeechServiceProvider::class
     
],

'aliases' => [

    // ...
     'AipSpeech' => Edisonk\AipSpeech\Facades\AipSpeech::class
     
],

2，创建配置文件：

php artisan vendor:publish --provider="Edisonk\AipSpeech\AipSpeechServiceProvider"

3，修改应用根目录下的 config/aipspeech.php 中对应的参数即可。

# 使用

AipSpeech::transferTextToSpeech($text, $para = [], $name);

