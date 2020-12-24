<?php declare(strict_types=1);


namespace Cts\Common\Helper;



use Swoft\Stdlib\Helper\ArrayHelper;

/**
 * Class I18n
 */
class I18n
{
    public static function translate($key){
        return \Swoft::t($key,[],self::getLanguage());
    }

    public static function getLanguage(){
        $user=context()->get("user");
        return ArrayHelper::get($user,"language",context()->get("default_language","kr"));
    }
}
