# Phase 2 — Wireframes & UI Design
## Musanze Potato Market

---

## UI Style Rules

### Colors
| Element | Color |
|---|---|
| Primary (navbar, buttons) | #011607 (Black) |
| Accent | #4caf50 (Light Green) |
| Background | #f4f6f8 (Light Grey) |
| Cards | #ffffff (White) |
| Danger (delete) | #e53935 (Red) |
| Text | #333333 (Dark Grey) |

### Typography
| Element | Size | Weight |
|---|---|---|
| Page Title (h1) | 22px | 700 |
| Section Title (h2) | 16px | 600 |
| Body Text | 15px | 400 |
| Labels | 13px | 600 |
| Small/hints | 12px | 400 |

### Spacing Scale
- Extra Small: 4px
- Small: 8px
- Medium: 16px
- Large: 24px
- Extra Large: 30px

### Button States
| State | Style |
|---|---|
| Default | Background #1e1751, white text |
| Hover | Background #145a27 (darker) |
| Danger | Background #e53935 |
| Disabled | Opacity 0.6 |
| Dashed (add item) | Dashed border #4caf50 |

### Breakpoints
| Device | Width |
|---|---|
| Mobile | max-width: 480px |
| Tablet | max-width: 768px |
| Desktop | 1100px max container |

---

## Component List

- **Navbar** — sticky top, brand + links + user info
- **Stat Card** — colored left border, label + value + subtitle
- **Section Box** — white card with shadow, used for tables and forms
- **Alert** — success (green), error (red), warning (orange)
- **Badge** — rounded pill for order status
- **Form Group** — label + input with focus border
- **Items Table** — dynamic rows with remove button
- **Total Box** — green background showing computed total
- **Receipt** — printable A4-style layout
- **Signature Area** — two signature lines at bottom of receipt

---

## Page Map / Navigation Flow
```
[Login]
   │
   ▼
[Dashboard] → [Suppliers] → [Register Supplier]
     │                    → [Delete Supplier]
     │
     └──────→ [Orders] → [Create Order] → [Receipt]
     │
     └──────→ [Logout] → [Login]
```

---

## Wireframe Descriptions

### 1. Login Page (Mobile + Desktop)
- Centered card on green gradient background
- Logo (potato emoji) at top
- Username and password fields
- Login button (full width)
- Default credentials hint at bottom

### 2. Dashboard Page
- Sticky dark blue navbar with links
- 4 stat cards in a responsive grid
- Recent orders table below
- New Order button top right of table

### 3. Suppliers Page
- Two-column layout (form left, table right)
- Registration form with 4 fields
- Suppliers table with Remove button per row

### 4. Orders Page
- Single column form
- Supplier dropdown
- Pickup location + date side by side
- Dynamic items table (add/remove rows)
- Auto-computed total box
- Save & Generate Receipt button

### 5. Receipt Page
- Printable layout centered on page
- Market header with receipt number
- Info grid (supplier details)
- Items table with subtotals
- Total row at bottom
- Signature areas
- Print button (hidden on print)

---