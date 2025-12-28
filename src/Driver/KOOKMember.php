<?php

namespace asuwee\Seat\Connector\Drivers\KOOK\Driver;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Arr;
use Seat\Services\Exceptions\SettingException;
use Warlof\Seat\Connector\Drivers\IClient;
use Warlof\Seat\Connector\Drivers\ISet;
use Warlof\Seat\Connector\Drivers\IUser;
use Warlof\Seat\Connector\Exceptions\DriverException;
use Warlof\Seat\Connector\Exceptions\DriverSettingsException;
use Warlof\Seat\Connector\Exceptions\InvalidDriverIdentityException;
use Warlof\Seat\Connector\Models\User;
/* KOOK没有提供除了获取用户信息以外的OAuth API，ISet 全部默认不处理 */



class KOOKMember implements IUser {
    public $user_id;

    public $connector_id;

    public $unique_id;

    public $connector_name;

    public $user_model;

    public function __construct(User $user_model)
    {
        $this->user_id = $user_model->id;
        $this->connector_id = $user_model->connector_id;
        $this->unique_id = $user_model->unique_id;
        $this->connector_name = $user_model->connector_name;
        $this->user_model = $user_model;
    }
    public function getClientId() :string{
        return $this-> connector_id;
    }
    public function getUniqueId() :string{
        return $this->unique_id;
    }
    public function getName() :string{
        return $this->connector_name;
    }
    public function setName(string $name) :bool{
        $this->user_model->update([
            'connector_name' => $name
        ]);

        $this->connector_name = $this->user_model->connector_name;

        return True;
    }
    public function getSets(): array {
        return [];
    }
    public function addSet(ISet $set) {
        return True;
    }
    public function removeSet(ISet $set){
        return True;
    }
}