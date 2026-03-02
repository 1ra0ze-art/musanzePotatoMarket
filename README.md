# 🥔 Musanze Potato Market — Order Management System

A web-based order management system for potato farmers and aggregators
in Musanze District, Rwanda.

---

## 📋 Features

- Secure admin/aggregator login
- Register and manage farmers/suppliers
- Create orders with multiple items
- Auto-computed order totals (real-time)
- Printable receipt generation
- Dashboard with daily stats and recent orders
- Fully responsive (mobile + desktop)
- MVC architecture with clean separation of concerns

---

## 🏗️ MVC Structure
```
musanzePotatoMarket/
├── app/
│   ├── controllers/     # Business logic
│   ├── models/          # Database queries
│   └── views/           # HTML templates
├── assets/
│   ├── css/style.css    # All styles
│   └── js/main.js       # JavaScript
├── config/
│   └── database.php     # DB connection
├── database/
│   ├── schema.sql       # Table structure
│   └── seed.sql         # Default data
├── docs/
│   ├── planning.md      # Phase 1 planning
│   ├── AI-usage.md      # AI usage log
│   └── testing.md       # Test cases
├── public/
│   └── index.php        # Router (entry point)
└── README.md
```

---

## ⚙️ Setup Instructions (Localhost)

### Requirements
- XAMPP (Apache + MySQL + PHP 8.x)
- Web browser

### Steps

1. **Clone or download** the project into:
```
   C:/xampp/htdocs/musanzePotatoMarket/
```

2. **Start XAMPP** — make sure Apache and MySQL are running

3. **Set up the database:**
   - Open phpMyAdmin: `http://localhost/phpmyadmin`
   - Create a new database called `musanze_potato`
   - Click the SQL tab and run `database/schema.sql`
   - Then run `database/seed.sql` to create the admin account

4. **Open the app:**
```
   http://localhost/musanzePotatoMarket/public/index.php
```

5. **Login with:**
   - Username: `admin`
   - Password: `admin123`

---

## 🌐 Hosting

- **Hosting Provider:** InfinityFree (PHP + MySQL)
- **Hosted Link:** [http://musanzepotatomarket.infinityfreeapp.com/musanzePotatoMarket/public/index.php?page=login]

---

## 👥 Group Members

| Name | Role |
|---|---|
| [Irakoze Fredy] | Role 1 — Product Planner & Documentation |
| [Umubyeyi Ange] | Role 2 — UI/UX Designer |
| [Inezayijuru Brigite] | Role 3 — HTML Structure Engineer |
| [Basel Motasim Mohammed Abdalla] | Role 4 — CSS & Responsiveness Engineer |
| [Sangwa Rwirangira Yvan] | Role 5 — JavaScript Interaction Engineer |
| [Emad Siddig Ahmed Farah] | Role 6 — Backend PHP MVC Engineer |
| [Tuyishime Cynthia] | Role 7 — Database, Git & Deployment |

---

*Musanze District, Rwanda — 2026*