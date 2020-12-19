<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Housework extends Model
{
    use HasFactory;
    protected $fillable = ['task_name','term','point'];
}
