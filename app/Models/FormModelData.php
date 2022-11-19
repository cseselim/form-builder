<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormModelData extends Model
{
    use HasFactory;
    protected $table = 'form-data';
    protected $fillable=['form_id','data'];
}
