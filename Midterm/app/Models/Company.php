<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    // mass assignment setting
    // Company::create(['name'=>'회사이름'])
    protected $fillable = ['name'];
}
