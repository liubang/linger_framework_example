<?php

namespace model;

class UserModel extends AbstractModel
{

    protected $table = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    public function addUser($userInfo)
    {
        return $this::insertGetId($userInfo);
    }

    public function getUserInfo()
    {
        $result = $this::newQuery()->where([['id', '>', '1']])->get()->toArray();
        return $result;
    }
}