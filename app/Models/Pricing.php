<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'billing_period', 'button_text', 'is_active'];

    // علاقة الربط: الباقة الواحدة تمتلك ميزات متعددة في جدول الميزات 🎯
    public function features()
    {
        return $this->hasMany(PricingFeature::class);
    }
}
