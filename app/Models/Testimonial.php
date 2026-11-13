<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 1. تأكد من استدعاء هذا السطر في الأعلى
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory; // 2. تأكد من تفعيل السطر السحري هذا داخل الكلاس هنا بالظبط 🎯

    // الحقول المسموح بتعبئتها بأمان
    protected $fillable = [
        'name',
        'location',
        'avatar',
        'feedback',
        'stars',
        'is_active'
    ];
}
