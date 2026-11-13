<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// تأكد أن الحروف الكبيرة H و C بالظبط هكذا 👇
class HomeCounter extends Model
{
    use HasFactory;

    protected $fillable = ['count_value', 'title', 'icon', 'bg_color', 'is_active'];
}
