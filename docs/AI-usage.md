# AI Usage Documentation
## Musanze Potato Market — Group 4

This document is required to show how AI tools were used as a learning
aid, not as a replacement for understanding.

---

## What We Asked AI

1. How to structure an MVC project in PHP
2. How to create a PDO database connection in PHP
3. How to use password_hash() and password_verify() for secure login
4. How to use prepared statements to prevent SQL injection
5. How to auto-compute totals using JavaScript
6. How to make a printable receipt page using CSS print media queries
7. How to use GENERATED ALWAYS AS in MySQL for auto-computed subtotals
8. How to build a PHP autoloader using spl_autoload_register()
9. How to make a responsive layout using CSS Grid and Flexbox
10. How to use session_start() and $_SESSION for authentication

---

## What We Changed

- Renamed files to match our project naming conventions
- Adjusted database credentials to match our XAMPP setup
- Modified color scheme to use Musanze green branding
- Added delete functionality for suppliers
- Customized receipt layout to include signature areas
- Added Rwandan context (RWF currency, Musanze District, local names)
- Fixed LIMIT clause compatibility issue with our MariaDB version
- Added footer partial to all views

---

## What We Learned

- MVC separates concerns — models handle data, views handle display,
  controllers handle logic. This makes code easier to maintain.
- Prepared statements prevent SQL injection by separating SQL from data.
- password_hash() never stores plain text passwords — even if the
  database is hacked, passwords are safe.
- A single router (public/index.php) makes navigation clean and secure.
- CSS Grid and Flexbox work together for responsive layouts without
  using absolute positioning hacks.
- The autoloader removes the need to manually require every class file.

---

*All code was reviewed, understood, and modified by the group members.*
*AI was used as a learning tool and reference, not to blindly copy code.*