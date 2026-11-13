<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
protected $fillable = ['name', 'phone', 'brand', 'area', 'describe', 'ai_diagnosis', 'source', 'status'];}
