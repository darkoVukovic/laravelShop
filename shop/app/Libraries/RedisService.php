<?php namespace App\Libraries;

use stdClass;
use Predis\Client;
use Illuminate\Support\Facades\Redis;

class RedisService {
    
    public $redisClient;
    public $instance = null;

    public function instance() {
        if(is_null($this->instance)) {
            $this->instance = new RedisService();
        }
        return $this->instance;
    }



    public function getDecodedHash ($name) {
        $items =  Redis::hgetall($name);
        $newItems = [];
        foreach($items as $item) {
            $newItems[] = JSON_decode($item);
        }
        return $newItems;
    } 

    
}