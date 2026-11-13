<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * الفحص المبدئي الصارم للصلاحيات
     */
    public function before(?User $user, string $ability): ?bool
    {
        // 1. إذا لم يكن هناك مستخدم مسجل إطلاقاً، نرفض العمليات الإدارية فوراً
        if (!$user) {
            return false;
        }

        // 2. إذا كان الحساب عبارة عن ضيف زائر أو أي رتبة غير الأدمن، يتم حظره فوراً من لوحة التحكم
        if ($user->type === 'guest' || $user->type !== 'admin') {
            return false;
        }

        return null; // الأدمن الحقيقي يكمل للقواعد بالأسفل للتأكد أنه لا يحظر أو يعدل على نفسه
    }

    /**
     * من يقدر يشوف قائمة المستخدمين (لوحة التحكم والمعلومات)؟
     */
    public function viewAny(?User $user): bool
    {
        // الأدمن فقط يرى (تمت الموافقة عليه وتمريره عبر دالة before الفوقية)
        return $user?->type === 'admin';
    }

    /**
     * صلاحية حذف الحساب
     */
    public function delete(?User $user, User $target): bool
    {
        // الأدمن يحذف أي مستخدم إلا نفسه
        return $user && $user->type === 'admin' && $user->id !== $target->id;
    }

    /**
     * صلاحية تغيير الرتبة (admin/user)
     */
    public function toggleRole(?User $user, User $target): bool
    {
        // الأدمن يغير رتبة أي أحد إلا نفسه
        return $user && $user->type === 'admin' && $user->id !== $target->id;
    }

    /**
     * صلاحية الترقية لـ فني مميز (Top)
     */
    public function toggleTop(?User $user, User $target): bool
    {
        // الأدمن يغير خاصية التوب لأي مستخدم
        return $user && $user->type === 'admin';
    }

    /**
     * صلاحية حظر المستخدم
     */
    public function toggleBlock(?User $user, User $target): bool
    {
        // الأدمن يحظر أي أحد إلا نفسه
        return $user && $user->type === 'admin' && $user->id !== $target->id;
    }

    /**
     * صلاحية التفتيش السري (Impersonate)
     */
    public function impersonate(?User $user, User $target): bool
    {
        // الأدمن يتجسس على أي حساب إلا نفسه
        return $user && $user->type === 'admin' && $user->id !== $target->id;
    }
}
