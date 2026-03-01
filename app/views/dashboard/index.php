<?php $pageTitle = "Dashboard — Musanze Potato Market"; ?>
<?php require APP . 'views/partials/header.php'; ?>
<?php require APP . 'views/partials/navbar.php'; ?>

<div class="container">
    <h1>📊 Dashboard</h1>

    <div class="stats">
        <div class="card card-green">
            <div class="label">Orders Today</div>
            <div class="value"><?= $ordersToday ?></div>
            <div class="sub">New orders placed today</div>
        </div>
        <div class="card card-orange">
            <div class="label">Revenue Today (RWF)</div>
            <div class="value"><?= number_format($valueToday) ?></div>
            <div class="sub">Total value of today's orders</div>
        </div>
        <div class="card card-blue">
            <div class="label">Total Orders</div>
            <div class="value"><?= $totalOrders ?></div>
            <div class="sub">All-time orders</div>
        </div>
        <div class="card card-purple">
            <div class="label">Registered Suppliers</div>
            <div class="value"><?= $totalSuppliers ?></div>
            <div class="sub">Farmers & suppliers</div>
        </div>
    </div>

    <div class="section">
        <div class="section-header">
            <h2>📋 Recent Orders</h2>
            <a href="?page=orders" class="btn">+ New Order</a>
        </div>

        <?php if (empty($recentOrders)): ?>
            <div class="no-data">No orders yet. <a href="?page=orders">Create the first one →</a></div>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Supplier</th>
                    <th>Pickup Location</th>
                    <th>Date</th>
                    <th>Total (RWF)</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recentOrders as $order): ?>
                <tr>
                    <td>#<?= $order['id'] ?></td>
                    <td><?= htmlspecialchars($order['supplier_name']) ?></td>
                    <td><?= htmlspecialchars($order['pickup_location']) ?></td>
                    <td><?= $order['order_date'] ?></td>
                    <td><?= number_format($order['total_amount']) ?></td>
                    <td><span class="badge <?= $order['status'] ?>"><?= ucfirst($order['status']) ?></span></td>
                    <td><a href="?page=receipt&id=<?= $order['id'] ?>" class="btn btn-sm">Receipt</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php require APP . 'views/partials/footer.php'; ?>