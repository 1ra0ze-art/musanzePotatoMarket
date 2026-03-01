<?php $pageTitle = "Receipt #" . $order_id . " — Musanze Potato Market"; ?>
<?php require APP . 'views/partials/header.php'; ?>

<div class="screen-bar">
    <div>
        <a href="?page=dashboard" class="btn-outline">← Dashboard</a>
        <a href="?page=orders" class="btn-outline">+ New Order</a>
    </div>
    <button class="btn-print" onclick="window.print()">🖨️ Print Receipt</button>
</div>

<div class="receipt-wrapper">
    <div class="receipt">

        <?php if ($isNew): ?>
        <div class="alert alert-success">✅ Order saved successfully! Here is your receipt.</div>
        <?php endif; ?>

        <div class="receipt-header">
            <div class="receipt-icon">🥔</div>
            <h1>MUSANZE POTATO MARKET</h1>
            <p>Order Management System — Musanze District, Rwanda</p>
            <span class="receipt-num">Receipt #<?= str_pad($order_id, 5, '0', STR_PAD_LEFT) ?></span>
        </div>

        <div class="info-grid">
            <div class="info-item">
                <div class="label">Supplier / Farmer</div>
                <div class="value"><?= htmlspecialchars($order['full_name']) ?></div>
            </div>
            <div class="info-item">
                <div class="label">Order Date</div>
                <div class="value"><?= date('d F Y', strtotime($order['order_date'])) ?></div>
            </div>
            <div class="info-item">
                <div class="label">Phone</div>
                <div class="value"><?= htmlspecialchars($order['phone'] ?: 'N/A') ?></div>
            </div>
            <div class="info-item">
                <div class="label">Location</div>
                <div class="value"><?= htmlspecialchars($order['supplier_location'] ?: 'N/A') ?></div>
            </div>
            <div class="info-item">
                <div class="label">Pickup Location</div>
                <div class="value"><?= htmlspecialchars($order['pickup_location']) ?></div>
            </div>
            <div class="info-item">
                <div class="label">Created By</div>
                <div class="value"><?= htmlspecialchars($order['created_by_name'] ?? 'N/A') ?></div>
            </div>
            <div class="info-item">
                <div class="label">National ID</div>
                <div class="value"><?= htmlspecialchars($order['national_id'] ?: 'N/A') ?></div>
            </div>
            <div class="info-item">
                <div class="label">Status</div>
                <div class="value status"><?= strtoupper($order['status']) ?></div>
            </div>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Quantity (kg)</th>
                    <th>Unit Price (RWF)</th>
                    <th>Subtotal (RWF)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $i => $item): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($item['description']) ?></td>
                    <td><?= number_format($item['quantity']) ?></td>
                    <td><?= number_format($item['unit_price'], 2) ?></td>
                    <td><?= number_format($item['subtotal'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="total-label">TOTAL AMOUNT</td>
                    <td class="total-amount">RWF <?= number_format($order['total_amount'], 2) ?></td>
                </tr>
            </tfoot>
        </table>

        <div class="signature-area">
            <div class="signature-box">
                <div class="sig-line">Supplier / Farmer Signature</div>
            </div>
            <div class="signature-box">
                <div class="sig-line">Aggregator / Agent Signature</div>
            </div>
        </div>

        <div class="receipt-footer">
            <span>Musanze Potato Market © <?= date('Y') ?></span>
            <span>Printed: <?= date('d/m/Y H:i') ?></span>
        </div>

    </div>
</div>

<?php require APP . 'views/partials/footer.php'; ?>