// assets/js/main.js
// Role 5: JavaScript Interaction Engineer

// -----------------------------------------------
// AUTO-COMPUTE TOTAL
// Runs every time quantity or price changes
// -----------------------------------------------
function computeTotal() {
    let total = 0;
    document.querySelectorAll('.item-row').forEach(row => {
        const qty   = parseFloat(row.querySelector('.qty').value)   || 0;
        const price = parseFloat(row.querySelector('.price').value) || 0;
        total += qty * price;
    });
    document.getElementById('totalDisplay').textContent =
        'RWF ' + total.toLocaleString();
}

// -----------------------------------------------
// ADD ITEM ROW
// Dynamically adds a new row to the order table
// -----------------------------------------------
function addRow() {
    const tbody = document.getElementById('itemsBody');
    const tr = document.createElement('tr');
    tr.className = 'item-row';
    tr.innerHTML = `
        <td>
            <input type="text" name="description[]" value="Potato Bag">
        </td>
        <td>
            <input type="number" name="quantity[]" class="qty"
                   placeholder="0" min="1" oninput="computeTotal()" required>
        </td>
        <td>
            <input type="number" name="unit_price[]" class="price"
                   placeholder="0" min="0" step="0.01" oninput="computeTotal()" required>
        </td>
        <td style="text-align:center">
            <button type="button" class="del-btn"
                onclick="this.closest('tr').remove(); computeTotal();">✕</button>
        </td>
    `;
    tbody.appendChild(tr);
}

// -----------------------------------------------
// CLIENT-SIDE VALIDATION
// Runs before form is submitted
// -----------------------------------------------
document.addEventListener('DOMContentLoaded', function () {

    // Start with one item row on orders page
    const itemsBody = document.getElementById('itemsBody');
    if (itemsBody) { addRow(); }

    // Validate order form before submit
    const orderForm = document.getElementById('orderForm');
    if (orderForm) {
        orderForm.addEventListener('submit', function (e) {
            const rows = document.querySelectorAll('.item-row');
            let valid = true;

            rows.forEach(row => {
                const qty   = row.querySelector('.qty').value;
                const price = row.querySelector('.price').value;
                if (!qty || !price || qty <= 0 || price <= 0) {
                    valid = false;
                }
            });

            if (!valid) {
                e.preventDefault();
                alert('Please fill in valid quantity and price for all items.');
            }

            if (rows.length === 0) {
                e.preventDefault();
                alert('Please add at least one order item.');
            }
        });
    }
});