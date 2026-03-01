<?php $pageTitle = "Suppliers — Musanze Potato Market"; ?>
<?php require APP . 'views/partials/header.php'; ?>
<?php require APP . 'views/partials/navbar.php'; ?>

<div class="container">
    <h1>👨‍🌾 Suppliers / Farmers</h1>
    <div class="grid-2">

        <div class="section">
            <h2>Register New Supplier</h2>

            <?php if (!empty($success)): ?>
                <div class="alert alert-success">✅ <?= htmlspecialchars($success) ?></div>
            <?php endif; ?>
            <?php if (!empty($error)): ?>
                <div class="alert alert-error">⚠️ <?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" action="?page=suppliers">
                <div class="form-group">
                    <label>Full Name *</label>
                    <input type="text" name="full_name"
                           placeholder="e.g. Jean de Dieu Hakizimana" required>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" placeholder="e.g. 0788123456">
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" placeholder="e.g. Muhoza, Musanze">
                </div>
                <div class="form-group">
                    <label>National ID</label>
                    <input type="text" name="national_id" placeholder="e.g. 1198012345678901">
                </div>
                <button type="submit" class="btn btn-full">➕ Register Supplier</button>
            </form>
        </div>

        <div class="section">
            <h2>All Suppliers (<?= count($suppliers) ?>)</h2>
            <?php if (empty($suppliers)): ?>
                <div class="no-data">No suppliers registered yet.</div>
            <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Registered</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suppliers as $s): ?>
                    <tr>
                        <td><?= $s['id'] ?></td>
                        <td><?= htmlspecialchars($s['full_name']) ?></td>
                        <td><?= htmlspecialchars($s['phone'] ?: '—') ?></td>
                        <td><?= htmlspecialchars($s['location'] ?: '—') ?></td>
                        <td><?= date('d/m/Y', strtotime($s['registered_at'])) ?></td>
                        <td>
                            <a href="?page=suppliers&delete=<?= $s['id'] ?>"
                               onclick="return confirm('Remove <?= htmlspecialchars($s['full_name']) ?>?')"
                               class="btn btn-danger btn-sm">🗑️ Remove</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php require APP . 'views/partials/footer.php'; ?>