<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded = [];

    public function partner_type()
    {
        return $this->belongsTo(PartnerType::class, 'partner_type_id');
    }

    public function partner_image()
    {
        return $this->hasMany(PartnerImage::class, 'partner_id');
    }
}
