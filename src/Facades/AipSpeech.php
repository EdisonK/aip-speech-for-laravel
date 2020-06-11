<?php
/**
 * Created by PhpStorm.
 * User: zhd
 * Date: 6/11/20
 * Time: 13:43
 */

namespace Edisonk\AipSpeech\Facades;

use Illuminate\Support\Facades\Facade;

class AipSpeech extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'aipspeech';
    }

}