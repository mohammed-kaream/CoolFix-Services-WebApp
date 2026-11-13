<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // تم استدعاؤه هنا بنجاح
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory; // 💡 هذا هو السطر الناقص الذي يجب إضافته هنا لتفعيل الفاكتوري

    // الحقول المسموح بتعبئتها
    protected $fillable = [
        'name',
        'category',
        'icon',
        'starting_price',
        'duration',
        'warranty',
        'is_active',
        'description'
    ];

    // العلاقة: الخدمة تملك عدة أسعار
    public function pricings(): HasMany
    {
        return $this->hasMany(Pricing::class);
    }
}
