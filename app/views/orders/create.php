<?php $pageTitle = "Create Order — Musanze Potato Market"; ?>
<?php require APP . 'views/partials/header.php'; ?>
<?php require APP . 'views/partials/navbar.php'; ?>

<div class="container">
    <h1>📦 Create New Order</h1>
    <div class="section">

        <?php if (!empty($error)): ?>
            <div class="alert alert-error">⚠️ <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (empty($suppliers)): ?>
            <div class="alert alert-warning">
                ⚠️ No suppliers yet. <a href="?page=suppliers">Register one first →</a>
            </div>
        <?php endif; ?>

        <form method="POST" action="?page=orders" id="orderForm">
            <div class="form-group">
                <label>Supplier / Farmer *</label>
                <select name="supplier_id" required>
                    <option value="">-- Select Supplier --</option>
                    <?php foreach ($suppliers as $s): ?>
                    <option value="<?= $s['id'] ?>">
                        <?= htmlspecialchars($s['full_name']) ?>
                        <?= $s['location'] ? '(' . htmlspecialchars($s['location']) . ')' : '' ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Pickup Location *</label>
                    <input type="text" name="pickup_location"
                           placeholder="e.g. Muhoza Market" required>
                </div>
                <div class="form-group">
                    <label>Order Date *</label>
                    <input type="date" name="order_date"
                           value="<?= date('Y-m-d') ?>" required>
                </div>
            </div>

            <h3 class="section-title">🛒 Order Items</h3>
            <table class="items-table" id="itemsTable">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Quantity (kg)</th>
                        <th>Unit Price (RWF)</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody id="itemsBody"></tbody>
            </table>
            <button type="button" class="btn-dashed" onclick="addRow()">➕ Add Item</button>

            <div class="total-box">
                <span class="total-label">Total Amount</span>
                <span class="total-amount" id="totalDisplay">RWF 0</span>
            </div>

            <button type="submit" class="btn btn-full">✅ Save Order & Generate Receipt</button>
        </form>
    </div>
</div>

<?php require APP . 'views/partials/footer.php'; ?>
<script src="../assets/js/main.js"></script>