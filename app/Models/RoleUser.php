<?php namespace App;

use Zizaco\Entrust\EntrustRole;

class RoleUser extends EntrustRole
{
  protected $table = 'role_users';
  protected $fillable =
    [
      'user_id',
      'role_id'
    ];
}
