# TAAN CODEBASE INDEX

## 📋 Table of Contents
1. [Project Overview](#project-overview)
2. [Controller Index](#controller-index)
3. [Model Index](#model-index)
4. [Route Index](#route-index)
5. [View Index](#view-index)
6. [Feature Index](#feature-index)

---

## 🎯 Project Overview

**TAAN (Trekking Agencies Association of Nepal)**
- **Purpose**: Member management system for trekking agencies
- **Framework**: Laravel
- **Features**: Member registration, subcategory management, file uploads, BS date conversion

---

## 🎮 Controller Index

### 1. UserController (`app/Http/Controllers/UserController.php`)

#### **Purpose**: Handle user registration and member management

#### **Structure**:
```
1. CLASS PROPERTIES
   1.1 Model Dependencies
   1.2 File Upload Prefix Paths (URL paths)
   1.3 File Upload Folder Paths (Server paths)

2. CONSTRUCTOR
   2.1 Set model dependencies
   2.2 Initialize file upload folder paths

3. PUBLIC METHODS
   3.1 showRegistrationForm() - Display registration form
   3.2 registerUser() - Process member registration
```

#### **Key Methods**:
- **`showRegistrationForm()`**: GET /register - Show member registration form
- **`registerUser()`**: POST /register - Process registration with file uploads

#### **Features**:
- ✅ Dynamic validation based on member type
- ✅ Subcategory support (conditional validation)
- ✅ Multiple file upload handling
- ✅ Database transactions for data integrity
- ✅ User account creation with encrypted passwords

---

### 2. SiteController (`app/Http/Controllers/Site/SiteController.php`)

#### **Purpose**: Handle all frontend/public website functionality

#### **Key Methods**:
- **`index()`**: Homepage display
- **`memberSubcategory($id)`**: Display members by subcategory
- **`memberByType($id)`**: Display members by type
- **`singleMember($id)`**: Individual member profile
- **`contact()`**: Contact page
- **`gallery()`**: Photo gallery

#### **Member-Related Methods**:
```
4.2 memberSubcategory($id)
    4.2.1 Get navigation menu
    4.2.2 Get subcategory with member type relationship
    4.2.3 Get all members in this subcategory
    4.2.4 Pass subcategory data to view
    4.2.5 Return member subcategory view
```

---

## 🗃️ Model Index

### 1. Member (`app/Models/Member.php`)
- **Purpose**: Member data and relationships
- **Key Fields**: organization_name, member_type_id, member_subcategory_id, member_id
- **Relationships**: belongsTo(User), belongsTo(MemberType), belongsTo(MemberSubcategory)

### 2. MemberType (`app/Models/MemberType.php`)
- **Purpose**: Member categories (e.g., Provincial Members)
- **Key Fields**: title, has_subcategory, status
- **Relationships**: hasMany(Member), hasMany(MemberSubcategory)

### 3. MemberSubcategory (`app/Models/MemberSubcategory.php`)
- **Purpose**: Member subcategories (e.g., Taan Gandaki)
- **Key Fields**: name, member_type_id, status
- **Relationships**: belongsTo(MemberType), hasMany(Member)

### 4. User (`app/Models/User.php`)
- **Purpose**: User authentication and basic info
- **Key Fields**: name, email, mobile, password, role
- **Relationships**: hasOne(Member)

---

## 🛣️ Route Index

### Public Routes (`routes/web.php`)
```php
// Member Routes
Route::get('/member-subcategory/{id}', [SiteController::class, 'memberSubcategory'])->name('member.subcategory');
Route::get('/branch/{id}', [SiteController::class, 'memberByType'])->name('memberByType');
Route::get('members/{member_id}', [SiteController::class, 'singleMember'])->name('single.member');

// Registration Routes
Route::get('register/', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('register/', [UserController::class, 'registerUser'])->name('signup-process');

// Ajax Routes
Route::get('/get-subcategories', [DropdownController::class, 'getSubcategories'])->name('get-subcategories');
```

---

## 👁️ View Index

### 1. Registration Views
- **`front_end/auth/register.blade.php`**: Member registration form
- **Features**: Dynamic subcategory dropdown, file upload fields, validation

### 2. Member Display Views
- **`front_end/member-subcategory.blade.php`**: Subcategory member listing
- **`front_end/single-member.blade.php`**: Individual member profile
- **`front_end/member.blade.php`**: General member listing

### 3. Navigation
- **`front_end/includes/navbar.blade.php`**: Main navigation with 3-level menu
- **Features**: Dropdown menus, subcategory support, responsive design

---

## ⚡ Feature Index

### 1. Member Registration System
- **Location**: `UserController@registerUser`
- **Features**:
  - ✅ Dynamic validation based on member type
  - ✅ Subcategory support (Taan Gandaki, etc.)
  - ✅ Multiple file uploads (PAN, certificates, etc.)
  - ✅ Automatic member ID generation
  - ✅ Database transactions

### 2. Member Subcategory Display
- **Location**: `SiteController@memberSubcategory`
- **Route**: `/member-subcategory/{id}`
- **Features**:
  - ✅ Subcategory information display
  - ✅ Member listing with organization details
  - ✅ Responsive card layout
  - ✅ Empty state handling

### 3. Navigation Menu System
- **Location**: `front_end/includes/navbar.blade.php`
- **Features**:
  - ✅ 3-level hierarchical menu
  - ✅ Non-clickable parent items with children
  - ✅ Dropdown functionality
  - ✅ Mobile responsive

### 4. File Upload System
- **Location**: `UserController` (multiple methods)
- **Supported Files**:
  - Company PAN certificate
  - Company registration
  - Tax clearance certificate
  - Tourism certificate
  - NRB certificate
  - Cottage industry certificate
  - Renewal certificate

---

## 🔧 Development Guidelines

### Code Organization
1. **Controllers**: Properly indexed with section comments
2. **Methods**: Numbered subsections for clarity
3. **Comments**: Descriptive purpose and feature documentation
4. **Validation**: Dynamic rules based on business logic

### File Structure
```
app/Http/Controllers/
├── UserController.php (Registration & Member Management)
├── Site/SiteController.php (Frontend Display)
└── Admin/ (Admin Panel Controllers)

resources/views/front_end/
├── auth/register.blade.php (Registration Form)
├── member-subcategory.blade.php (Subcategory Display)
├── includes/navbar.blade.php (Navigation)
└── layouts/ (Layout Templates)
```

---

**Last Updated**: 2025-07-03
**Version**: 1.0
**Maintainer**: Development Team
