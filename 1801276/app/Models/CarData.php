<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarData extends Model
{
    use HasFactory;

    protected $fillable = [
                'user_id',
                'name',
                'company',
                'year',
                'money',
                'kind',
                'image',
                'Appearance'
    ];

    public function carName() {

        $this->belongsTo(User::class, 'user_id');
    }
}
