# Member Subcategory System Documentation

## Overview

This system allows member types to have optional subcategories. Currently, member types `a`, `b`, and `c` do not have subcategories, while member type `d` has subcategories `1`, `2`, and `3`.

## Database Structure

### Tables Created/Modified

1. **member_types** table - Added `has_subcategory` column

    - `has_subcategory` (boolean): Indicates if this member type has subcategories

2. **member_subcategories** table - New table

    - `id` (primary key)
    - `member_type_id` (foreign key to member_types)
    - `name` (subcategory name like '1', '2', '3')
    - `status` (boolean, default true)
    - `timestamps`

3. **members** table - Added `member_subcategory_id` column
    - `member_subcategory_id` (nullable foreign key to member_subcategories)

## Models

### MemberType Model

-   Added `has_subcategory` to fillable array
-   Added `subcategories()` relationship
-   Added `activeSubcategories()` relationship
-   Added `hasSubcategories()` helper method

### MemberSubcategory Model (New)

-   Fillable: `member_type_id`, `name`, `status`
-   Relationships: `memberType()`, `members()`
-   Scopes: `active()`
-   Helper: `getByMemberType($memberTypeId)`

### Member Model

-   Added `member_subcategory_id` to fillable array
-   Added `memberSubcategory()` relationship

## Frontend Implementation

### Registration Form

-   Member type dropdown now includes `data-has-subcategory` attribute
-   Dynamic subcategory dropdown that shows/hides based on member type selection
-   AJAX loading of subcategories when member type `d` is selected

### JavaScript Features

-   Automatic show/hide of subcategory section
-   AJAX loading of subcategories via `/get-subcategories` endpoint
-   Form validation for required subcategory when applicable
-   Preserves old values on form validation errors

## Backend Implementation

### Routes

-   `GET /get-subcategories` - AJAX endpoint for loading subcategories

### Controllers

#### UserController (Frontend Registration)

-   Updated `showRegistrationForm()` to include `has_subcategory` field
-   Updated `registerUser()` with conditional validation for subcategories
-   Added `member_subcategory_id` to member creation

#### Admin/MemberController (Admin CRUD)

-   Updated `create()` to include `has_subcategory` field in member types
-   Updated `store()` with conditional validation for subcategories
-   Updated `edit()` to include `has_subcategory` field in member types
-   Updated `update()` with conditional validation for subcategories
-   Updated `show()` to include `has_subcategory` field in member types
-   Added `member_subcategory_id` parameter to `storeData()` and `updateData()` calls

#### DropdownController

-   Added `getSubcategories()` method for AJAX requests

## Validation Rules

-   `member_type_id` is required and must exist in member_types table
-   `member_subcategory_id` is required only if the selected member type has subcategories
-   Subcategory must exist in member_subcategories table and belong to the selected member type

## Data Seeding

-   Created `MemberTypeSubcategorySeeder`
-   Seeds member types: `a`, `b`, `c` (no subcategories), `d` (with subcategories)
-   Seeds subcategories `1`, `2`, `3` for member type `d`

## Usage Examples

### Getting Member Types with Subcategories

```php
$memberTypes = MemberType::withSubcategories();
```

### Getting Subcategories for a Specific Member Type

```php
$subcategories = MemberSubcategory::getByMemberType($memberTypeId);
```

### Checking if Member Type has Subcategories

```php
$memberType = MemberType::find($id);
if ($memberType->hasSubcategories()) {
    // Show subcategory selection
}
```

## Testing

-   All models load without errors
-   Database relationships work correctly
-   AJAX endpoint returns proper JSON response
-   Form validation works for both scenarios (with/without subcategories)

## Files Modified/Created

### Migrations

-   `2025_06_26_160847_add_has_subcategory_to_member_types_table.php`
-   `2025_06_26_161242_create_member_subcategories_table.php`
-   `2025_06_26_161558_add_member_subcategory_id_to_members_table.php`

### Models

-   `app/Models/MemberType.php` (updated)
-   `app/Models/MemberSubcategory.php` (new)
-   `app/Models/Member.php` (updated)

### Controllers

-   `app/Http/Controllers/UserController.php` (updated - frontend registration)
-   `app/Http/Controllers/Admin/MemberController.php` (updated - admin CRUD)
-   `app/Http/Controllers/DropdownController.php` (updated)

### Views

-   `resources/views/front_end/auth/register.blade.php` (updated - frontend registration)
-   `resources/views/admin/member/create.blade.php` (updated - admin create)
-   `resources/views/admin/member/edit.blade.php` (updated - admin edit)

### Seeders

-   `database/seeders/MemberTypeSubcategorySeeder.php` (new)

### Routes

-   `routes/web.php` (updated)

## Future Enhancements

-   Admin interface for managing member types and subcategories
-   Bulk import/export of member data with subcategories
-   Reporting by member type and subcategory
-   Member type migration tools for existing data
