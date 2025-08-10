<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberSubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_type_id',
        'name',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    /**
     * Get the member type that owns the subcategory
     */
    public function memberType()
    {
        return $this->belongsTo(MemberType::class);
    }

    /**
     * Get the members that belong to this subcategory
     */
    public function members()
    {
        return $this->hasMany(Member::class);
    }

    /**
     * Scope to get only active subcategories
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Get subcategories for a specific member type
     */
    public static function getByMemberType($memberTypeId)
    {
        return self::where('member_type_id', $memberTypeId)
            ->where('status', true)
            ->orderBy('name')
            ->get();
    }
}
