<?php
/**
 * +----------------------------------------------------------------------
 * | 缓存
 * +----------------------------------------------------------------------
 * | Copyright (c) 2016 http://www.sunnyos.com All rights reserved.
 * +----------------------------------------------------------------------
 * | Date：2019-02-28 00:14:10
 * | Author: Sunny (admin@sunnyos.com) QQ：327388905
 * +----------------------------------------------------------------------
 */

namespace Cts\Common;


use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Redis\Pool;
use Swoft\Redis\Redis;
use Swoft\Stdlib\Helper\ArrayHelper;

/**
 * Class CacheRepository
 *
 * @since 2.0
 *
 * @Bean(scope=Bean::PROTOTYPE)
 */
class CacheRepository
{
    /**
     *
     * @Inject()
     *
     * @var Pool 默认连接使用的是 redis.pool
     */
    protected $redis;

    const EXPIRE_TIME = 24 * 60 * 60 ;

    protected $cache_key="";

    public function setAttr($data){
        foreach ($data as $attr=>$val){
            if(property_exists($this,$attr)){
                $this->$attr=$val;
            }
        }
    }

    public function save($cache_id,$expirt_time=self::EXPIRE_TIME){
        $this->redis->set($this->cache_key.$cache_id,ArrayHelper::toArray($this),$expirt_time);
    }

    public function load($cache_id){
        $cacheData=$this->redis->get($this->cache_key.$cache_id);
        if($cacheData){
            $this->setAttr($cacheData);
            return true;
        }
        return false;
    }

    public function clear($cache_id){
        $this->redis->del($this->cache_key.$cache_id);
    }


    public function queryFromCache($cache_id,\Closure $callback,$expirt_time=self::EXPIRE_TIME){
        $key=$this->cache_key.$cache_id;
        $value = $this->redis->get($key);
        if (empty($value)) {
            $value = $callback();
            if (!empty($value)) {
                $this->redis->set($key, $value, $expirt_time);
            }
        }
        return $value;
    }

}
