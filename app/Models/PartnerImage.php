<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerImage extends Model
{
    protected $guarded = [];

    public function partner_image()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }
}
