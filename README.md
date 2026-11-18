# 📦 Inventory Management System (RBAC)

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)
[![Spatie Permission](https://img.shields.io/badge/Spatie-Permission-orange?style=for-the-badge&logo=laravel)](https://spatie.be/docs/laravel-permission)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)

A robust, enterprise-ready **Inventory Management System** built with **Laravel 11**, **MySQL**, and **Spatie Laravel-Permission**. Designed with strict Role-Based Access Control (RBAC) to manage products, categories, and system users across varying access tiers (*Admin, Manager, Staff*).

---

## 🌐 Live Demo
🔗 **Live Application:** [https://pdf-editor.freedev.app/](https://pdf-editor.freedev.app/)  
*(Note: Replace with your active hosting URL if different)*

---

## ✨ Key Features

- **🔐 Role-Based Access Control (RBAC):** Integrated with the industry-standard `spatie/laravel-permission` package for enterprise authorization.
- **👥 Multi-Tier User Roles:**
  - **Admin:** Full access to manage products, categories, and assign/update user roles.
  - **Manager:** Authorized to create, view, and edit products and categories.
  - **Staff:** Read-only access to view products and inventory status.
- **🏷️ Product & Category Management:** Full CRUD operations with category relationships, soft delete/restore mechanisms, and real-time inventory counts.
- **📊 Interactive Dashboard:** Clean, responsive analytics cards showing live counts of total products, categories, and active users based on user permissions.
- **👤 User Management Panel:** Dedicated administration interface to inspect registered users and update their system roles dynamically.
- **🎨 Modern & Clean UI:** Designed with a sleek palette (`#2563eb` primary blue, `#1e293b` sidebar), Inter typography, responsive tables, and intuitive action modals.

---

## 🛡️ Roles & Permissions Matrix

| Permission | Admin | Manager | Staff |
|---|:---:|:---:|:---:|
| `view products` | ✅ | ✅ | ✅ |
| `create products` | ✅ | ✅ | ❌ |
| `edit products` | ✅ | ✅ | ❌ |
| `delete products` | ✅ | ❌ | ❌ |
| `view categories` | ✅ | ✅ | ❌ |
| `create categories` | ✅ | ✅ | ❌ |
| `edit categories` | ✅ | ✅ | ❌ |
| `delete categories` | ✅ | ❌ | ❌ |
| `manage users & roles` | ✅ | ❌ | ❌ |

---

## 🛠️ Tech Stack & Architecture

- **Backend:** Laravel 11.x, Eloquent ORM, Route Middleware (`role`, `permission`)
- **Package:** `spatie/laravel-permission`
- **Database:** MySQL (Relational schema with foreign keys and permission mapping tables)
- **Frontend:** Blade Templates, Bootstrap 5.3, Bootstrap Icons, Google Font Inter
- **Authentication:** Custom session-based authentication with Bcrypt password hashing

---

## 🚀 Getting Started Locally

### Prerequisites
- PHP >= 8.2
- Composer
- MySQL (XAMPP / Laragon / Native)

### Installation Steps

1. **Clone the repository:**
   ```bash
   git clone https://github.com/abdullahkhanathitms/inventory-management-system.git
   cd inventory-management-system
   ```

2. **Install Composer dependencies:**
   ```bash
   composer install
   ```

3. **Configure Environment:**
   ```bash
   cp .env.example .env
   ```
   Configure your MySQL database settings in `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=project_2nd
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations & Seeders:**
   *(Sets up tables, default roles, permissions, and initial test user)*
   ```bash
   php artisan migrate --seed
   ```

6. **Start Development Server:**
   ```bash
   php artisan serve
   ```
   Visit: `http://127.0.0.1:8000`

---

## 📁 Project Structure

```plaintext
app/
 ├── Http/Controllers/
 │    ├── Admin/UserController.php # User management & role assignment
 │    ├── AuthController.php       # Authentication logic (Login, Register, Logout)
 │    ├── CategoryController.php   # Category CRUD operations
 │    ├── DashboardController.php  # Metrics & role-specific stats
 │    └── ProductController.php    # Product CRUD operations
 └── Models/
      ├── Category.php             # Category Eloquent model
      ├── Product.php              # Product model with category relation
      └── User.php                 # User model with HasRoles trait
database/
 ├── migrations/                   # Schema tables (users, products, categories, permissions)
 └── seeders/
      └── RolePermissionSeeder.php # Seeds default roles & permissions
resources/
 └── views/
      ├── admin/users/             # User management views
      ├── auth/                    # Clean Login & Register views
      ├── categories/              # Category listing, create, edit
      ├── products/                # Product listing, create, edit
      ├── dashboard.blade.php      # Main dashboard with metric cards
      └── layouts/app.blade.php    # Unified sidebar layout
```

---

## 👨‍💻 Author

**Abdullah Khan**  
- **GitHub:** [@abdullahkhanathitms](https://github.com/abdullahkhanathitms)  
- **Project Repository:** [inventory-management-system](https://github.com/abdullahkhanathitms/inventory-management-system)

---

## 📄 License

This project is open-sourced software licensed under the [MIT License](LICENSE).
