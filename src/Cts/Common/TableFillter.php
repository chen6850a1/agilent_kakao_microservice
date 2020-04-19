<?php
/**
 * Created by PhpStorm.
 * User: hongch02
 * Date: 2020/4/19
 * Time: 9:31
 */

namespace Cts\Common;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Db\DB;
use Swoft\Db\Eloquent\Model;
use Swoft\Db\Query\Builder;

/**
 * Class Extender
 *
 * @since 2.0
 *
 * @Bean("TableFillter")
 */
class TableFillter
{

    private $default_config=[
        "page"=>1,
        "pageSize"=>10,
        "orderBy"=>"",
        "direction"=>"desc"
    ];

    /**
     * @param Builder $model
     * @param array $config
     * @return Builder
     */
    public function fillter(Builder $model,array $config){
        $config=array_merge($this->default_config,$config);

        //分页
        if(!empty($config["page"])){
            $model->forPage($config["page"],$config["pageSize"]);
        }

        if(!empty($config["orderBy"])){
            $model->orderBy($config["orderBy"],$config["direction"]);
        }

        return $model;
    }
}