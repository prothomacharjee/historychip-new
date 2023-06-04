<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{

    protected $guard = 'admin';
    protected $fillable = [
        'name', 'email', 'password','token_2fa','token_2fa_expiry','phone_number','admin_group_id'
    ];
    protected $hidden = [
         'remember_token',
    ];

    public function getAuthIdentifierName()
    {
        return 'id'; // Replace with the actual identifier column name
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->password; // Replace with the actual password column name
    }

    public function getRememberToken()
    {
        return $this->remember_token; // Replace with the actual remember token column name
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; // Replace with the actual remember token column name
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Replace with the actual remember token column name
    }

    // ... Implement any other required methods
}
