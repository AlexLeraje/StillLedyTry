<?php

namespace Database;

use Human;
use Result;
use Database\HumanItem;

class HumansStore {
    public array $store = [];

    public function __construct(public String $storeName) {
        if(file_exists('Store/' . $this->storeName . '.json')) {
            $this->store = json_decode(file_get_contents('Store/' . $this->store . '.json'));
        }
    }

    public function addUser(String $name, String $surname, int $birthday, int $sex, String $city) :int {
        $nexId = $this->getNextId();
        $this->store[$nexId] = new HumanItem($nexId, $name, $surname, $birthday, $sex, $city);
        file_put_contents('Store/' . $this->storeName . '.json', json_encode($this->store));
        return $nexId;
    }

    public function Search() :Result {

        return new Result;
    }

    private function getNextId() :int {
        if(!empty($this->store))
            $maxKey = max(array_keys($this->store));
        else
            $maxKey = 0;

        return ++$maxKey;
    }
}