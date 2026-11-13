<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class HomeService extends Model
{
    use HasFactory;

    // الخانات المسموح بحفظها لكروت الهوم
    protected $fillable = ['title', 'sub_text', 'icon', 'bg_color', 'is_active'];


}

