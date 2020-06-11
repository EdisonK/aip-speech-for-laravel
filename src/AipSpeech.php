<?php
/**
 * Created by PhpStorm.
 * User: zhd
 * Date: 6/11/20
 * Time: 13:37
 */

namespace Edisonk\AipSpeech;

use Illuminate\Config\Repository;

class AipSpeech
{

    /**
     * @var Repository
     */
    protected $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }
    /**
     * @param string $msg
     * @return string
     */
    public function test_rtn($msg = ''){
        $config_arr = $this->config->get('aipspeech.options');

        $client = new \Edisonk\AipSpeech\ai\AipSpeech($config_arr['app_id'], $config_arr['api_key'], $config_arr['secret_key']);
        $result = $client->synthesis('当前长度为3000毫米，请测量下一条', 'zh', 1, array(
            'vol' => 5,
        ));

        if(!is_array($result)){
            file_put_contents('audio1.mp3', $result);
        }

        return   $tmppath = public_path('audio1.mp3');

//        return $msg.' <strong>from your custom develop package!</strong>>';
    }

    public function transferTextToSpeech($text, $para = [], $name){
        $config_arr = $this->config->get('aipspeech.options');

        $arr = array_merge(['vol' => 5], $para);

        $client = new \Edisonk\AipSpeech\ai\AipSpeech($config_arr['app_id'], $config_arr['api_key'], $config_arr['secret_key']);
        $result = $client->synthesis($text, 'zh', 1, $arr);

        if(!is_array($result)){
            file_put_contents($name, $result);
        }

        return   $tmppath = public_path($name);

//        return $msg.' <strong>from your custom develop package!</strong>>';
    }




}