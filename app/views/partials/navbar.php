<?php $page = $_GET['page'] ?? ''; ?>
<nav>
    <div class="brand">🥔 Musanze Potato Market</div>
    <div class="nav-links">
        <a href="?page=dashboard" <?= ($page === 'dashboard') ? 'class="active"' : '' ?>>Dashboard</a>
        <a href="?page=suppliers" <?= ($page === 'suppliers') ? 'class="active"' : '' ?>>Suppliers</a>
        <a href="?page=orders"    <?= ($page === 'orders')    ? 'class="active"' : '' ?>>Orders</a>
        <a href="?page=logout">Logout</a>
    </div>
    <div class="user">👤 <?= htmlspecialchars($_SESSION['username']) ?></div>
</nav>