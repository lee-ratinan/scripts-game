<?php

namespace Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'email_address', 'user_password', 'user_name', 'created_at', 'updated_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}