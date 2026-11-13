<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 1. تأكد من استدعاء الخاصية فوق
use Illuminate\Database\Eloquent\Model;

class HomeFeature extends Model
{
    use HasFactory; // 2. تأكد من تفعيل السطر السحري هذا داخل الكلاس هنا بالظبط 🎯

    // الحقول المسموح بتعبئتها وجلبها بأمان من قاعدة البيانات
    protected $fillable = [
        'title',
        'description',
        'icon',
        'is_active'
    ];
}
