# 🏷️ Online Auction System

<p align="center">
  <img src="assets/images/logo.png" alt="Online Auction System" width="300">
</p>

<p align="center">
  <strong>A modern PHP-based online auction platform for buying and selling products</strong>
</p>

<p align="center">
  <a href="#features">Features</a> •
  <a href="#installation">Installation</a> •
  <a href="#usage">Usage</a> •
  <a href="#tech-stack">Tech Stack</a> •
  <a href="#contributing">Contributing</a> •
  <a href="#license">License</a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-7.4+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-5.7+-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-4.x-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
  <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" alt="License">
</p>

---

## ✨ Features

### 👤 For Buyers
| Feature | Description |
|---------|-------------|
| 🛍️ Browse Products | View all available auction items |
| 🔍 Product Details | See images, description, and bid info |
| 💰 Place Bids | Bid on products with incremental amounts |
| 📊 Bid History | Track all your bidding activity |
| ⚙️ Profile Management | Update personal information |

### 🏪 For Sellers
| Feature | Description |
|---------|-------------|
| ➕ Add Products | List items with 3 images |
| ⏰ Set Bid Timing | Configure start and end time |
| 📦 Manage Products | View and delete listings |
| ✅ Handle Requests | Accept or reject bids |
| ⚙️ Profile Management | Update seller information |

### 👨‍💼 For Admin
| Feature | Description |
|---------|-------------|
| 📈 Dashboard | Overview of system statistics |
| 👥 User Management | Manage buyers and sellers |
| 📋 Product Control | Oversee all listings |
| 💬 Contact Messages | View user inquiries |

---

## 📁 Project Structure

```
project_adi/
│
├── 📄 index.php                 # Home page
├── 📄 .htaccess                 # Apache config
├── 📄 README.md                 # Documentation
├── 📄 LICENSE                   # MIT License
│
├── 📁 config/                   # ⚙️ Configuration
│   ├── config.php              # Settings & helpers
│   └── database.php            # DB connection
│
├── 📁 includes/                 # 🧩 Shared Components
│   ├── head.php                # HTML head
│   ├── header.php              # Navigation
│   └── footer.php              # Footer
│
├── 📁 controllers/              # 🎮 Business Logic
│   ├── auth-controller.php     # Authentication
│   ├── product-controller.php  # Products & bidding
│   └── user-controller.php     # Profiles & contact
│
├── 📁 auth/                     # 🔐 Authentication
│   ├── login-buyer.php
│   ├── login-seller.php
│   ├── signup-buyer.php
│   ├── signup-seller.php
│   └── logout.php
│
├── 📁 buyer/                    # 🛒 Buyer Pages
│   ├── products.php
│   ├── view-product.php
│   ├── my-bids.php
│   └── profile.php
│
├── 📁 seller/                   # 🏪 Seller Pages
│   ├── add-product.php
│   ├── products.php
│   ├── bid-requests.php
│   └── profile.php
│
├── 📁 admin/                    # 👨‍💼 Admin Panel
│   ├── dashboard.php
│   ├── manage_buyers.php
│   ├── manage_sellers.php
│   ├── manage_products.php
│   └── assets/
│
├── 📁 assets/                   # 🎨 Frontend Assets
│   ├── css/
│   ├── js/
│   ├── images/
│   └── fonts/
│
└── 📁 login_signup/             # 🔑 Auth Assets
    ├── css/
    ├── js/
    └── vendor/
```

---

## 🚀 Installation

### Prerequisites

- ✅ PHP 7.4 or higher
- ✅ MySQL 5.7 or higher
- ✅ Apache web server
- ✅ XAMPP/WAMP (recommended)

### Quick Start

```bash
# 1. Clone the repository
git clone https://github.com/yourusername/online-auction-system.git

# 2. Move to htdocs (XAMPP)
mv online-auction-system /xampp/htdocs/project_adi

# 3. Start Apache & MySQL in XAMPP

# 4. Create database 'main' in phpMyAdmin

# 5. Import assets/main.sql

# 6. Visit http://localhost/project_adi/
```

### Database Configuration

Edit `config/database.php` if needed:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'main');
```

---

## 📖 Usage

### Buyer Workflow
```
Register → Login → Browse Products → View Details → Place Bid → Wait for Acceptance
```

### Seller Workflow
```
Register → Login → Add Product → Set Bid Time → Wait for Bids → Accept/Reject
```

### Admin Access
| Field | Value |
|-------|-------|
| URL | `/admin/login.php` |
| Username | `admin` |
| Password | `admin` |

---

## 🗄️ Database Schema

| Table | Description |
|-------|-------------|
| `admin` | Admin accounts |
| `buyer` | Buyer accounts |
| `seller` | Seller accounts |
| `product` | Auction products |
| `auction` | Bid records |
| `contact` | Contact messages |

---

## 🛠️ Tech Stack

<table>
  <tr>
    <td align="center" width="96">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-plain.svg" width="48" height="48" alt="PHP" />
      <br>PHP
    </td>
    <td align="center" width="96">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" width="48" height="48" alt="MySQL" />
      <br>MySQL
    </td>
    <td align="center" width="96">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" width="48" height="48" alt="Bootstrap" />
      <br>Bootstrap
    </td>
    <td align="center" width="96">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jquery/jquery-original.svg" width="48" height="48" alt="jQuery" />
      <br>jQuery
    </td>
    <td align="center" width="96">
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" width="48" height="48" alt="JavaScript" />
      <br>JavaScript
    </td>
  </tr>
</table>

---

## 🤝 Contributing

Contributions are welcome! Here's how you can help:

1. 🍴 **Fork** the repository
2. 🌿 **Create** a feature branch (`git checkout -b feature/AmazingFeature`)
3. 💾 **Commit** your changes (`git commit -m 'Add AmazingFeature'`)
4. 📤 **Push** to the branch (`git push origin feature/AmazingFeature`)
5. 🔃 **Open** a Pull Request

---



## 📄 License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

```
MIT License

Copyright (c) 2026 Aditya Patel, Narsi Joshi

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files...
```

---

## ⭐ Support

If you found this project helpful, please consider giving it a ⭐!

---

<p align="center">
  Made with ❤️ by Aditya Patel & Narsi Joshi
</p>

<p align="center">
  <a href="#-online-auction-system">⬆️ Back to Top</a>
</p>
