<?php
/**
 * Created by PhpStorm.
 * User: hongch02
 * Date: 2020/2/19
 * Time: 9:01
 */

namespace Cts\Common\Data;

/**
 * Class BaseData
 */
class BaseData
{
    public function setAttrs($attrs){
        foreach ($attrs as $attr=>$val){
            if(property_exists($this,$attr)){
                $this->$attr=$val;
            }
        }
    }
}