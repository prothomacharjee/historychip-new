<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerType extends Model
{
    protected $guarded = [];

    public function partner()
    {
        return $this->hasMany(Partner::class, 'partner_type_id');
    }
}
