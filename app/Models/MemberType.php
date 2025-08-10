<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'slug',
        'has_subcategory'
    ];

    protected $casts = [
        'status' => 'boolean',
        'has_subcategory' => 'boolean'
    ];

    /**
     * Get the subcategories for this member type
     */
    public function subcategories()
    {
        return $this->hasMany(MemberSubcategory::class);
    }

    /**
     * Get the active subcategories for this member type
     */
    public function activeSubcategories()
    {
        return $this->hasMany(MemberSubcategory::class)->where('status', true);
    }

    /**
     * Get the members of this type
     */
    public function members()
    {
        return $this->hasMany(Member::class);
    }

    /**
     * Scope to get only active member types
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Check if this member type has subcategories
     */
    public function hasSubcategories()
    {
        return $this->has_subcategory;
    }

    /**
     * Get member types with their subcategories
     */
    public static function withSubcategories()
    {
        return self::with('activeSubcategories')->where('status', true)->get();
    }
}
