<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutFaq extends Model
{
    use HasFactory;

    // الحقول المسموح بتعبئتها وجلبها بأمان من قاعدة البيانات لكروت الأسئلة 👇🎯
    protected $fillable = [
        'question',
        'answer',
        'is_active'
    ];
}
