<?php
/**
 * @author peter.nguyen
 * @email peter.it85@gmail.com
 * @todo
 * @created 10/13/17 11:08 AM
 */

namespace App;

use Zizaco\Entrust\EntrustPermission;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class Permission extends EntrustPermission
{
    protected $table = 'permissions';
    protected $fillable = ['name', 'display_name', 'description'];

    public function users()
    {
        return $this->belongsToMany(
            config('auth.model') ?: config('auth.providers.users.model'),
            config('laravel-permission.table_names.user_has_permissions')
        );
    }

    /**
     * Find a permission by its name.
     *
     * @param string $name
     *
     * @throws PermissionDoesNotExist
     *
     * @return Permission
     */
    protected static function getPermissions()
    {
        return app(PermissionRegistrar::class)->getPermissions();
    }

    public static function findByName($name)
    {
        $permission = static::getPermissions()->where('name', $name)->first();
        if (! $permission) {
            return null;
            throw new PermissionDoesNotExist();
        }

        return $permission;
    }

}