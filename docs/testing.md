# Testing Documentation
## Musanze Potato Market — Phase 4

---

## Test Checklist (10 Test Cases)

| # | Test Case | Steps | Expected Result | Status |
|---|---|---|---|---|
| 1 | Valid Login | Enter admin/admin123, click Login | Redirected to dashboard | ✅ Pass |
| 2 | Invalid Login | Enter wrong password, click Login | Error message shown | ✅ Pass |
| 3 | Register Supplier | Fill form with name/phone/location, submit | Supplier appears in table | ✅ Pass |
| 4 | Register Supplier (no name) | Submit form with empty name | Error: Full name required | ✅ Pass |
| 5 | Delete Supplier | Click Remove, confirm dialog | Supplier removed from table | ✅ Pass |
| 6 | Auto-compute Total | Enter quantity=100, price=500 | Total shows RWF 50,000 | ✅ Pass |
| 7 | Create Order | Fill all fields, submit | Redirected to receipt page | ✅ Pass |
| 8 | Create Order (empty fields) | Submit without supplier | Error message shown | ✅ Pass |
| 9 | Print Receipt | Click Print Receipt button | Browser print dialog opens | ✅ Pass |
| 10 | Logout | Click Logout | Redirected to login page | ✅ Pass |

---

## Evidence

All test cases were performed manually on localhost (XAMPP).
Screenshots were taken for each test case during development.

---

## Known Limitations

- No email notifications
- No order editing after creation
- No pagination on large order lists

---

*Testing performed by: Group [Your Group Number]*  
*Date: March 2026*