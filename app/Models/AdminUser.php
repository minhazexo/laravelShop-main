<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    // Use the admin_panel database connection
    protected $connection = 'admin_panel';

    // The table name in admin_panel DB
    protected $table = 'users';

    // Primary key
    protected $primaryKey = 'id';

    // Fillable fields
    protected $fillable = [
        'name',
        'email',
        'password_hash', // PHP admin panel stores password here
        'role',
        'status',
        'photo',
    ];

    // Tell Laravel which column to use for password authentication
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    // Optional: hide sensitive data when returned as array/json
    protected $hidden = [
        'password_hash',
    ];
}
