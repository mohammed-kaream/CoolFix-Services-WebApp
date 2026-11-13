<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTeam extends Model
{
    use HasFactory;

    // الخانات المسموح بحفظها بأمان لكروت الفريق الثلاثة
    protected $fillable = [
        'name',
        'role',
        'image',
        'phone',
        'whatsapp',
        'experience',
        'repairs_count',
        'is_active'
    ];
}
