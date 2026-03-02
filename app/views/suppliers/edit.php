<?php $pageTitle = "Edit Supplier — Musanze Potato Market"; ?>
<?php require APP . 'views/partials/header.php'; ?>
<?php require APP . 'views/partials/navbar.php'; ?>

<div class="container">
    <h1>✏️ Edit Supplier</h1>
    <div class="section" style="max-width: 500px;">

        <?php if (!empty($error)): ?>
            <div class="alert alert-error">⚠️ <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="?page=suppliers-edit&id=<?= $supplier['id'] ?>">
            <div class="form-group">
                <label>Full Name *</label>
                <input type="text" name="full_name"
                       value="<?= htmlspecialchars($supplier['full_name']) ?>" required>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone"
                       value="<?= htmlspecialchars($supplier['phone'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location"
                       value="<?= htmlspecialchars($supplier['location'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>National ID</label>
                <input type="text" name="national_id"
                       value="<?= htmlspecialchars($supplier['national_id'] ?? '') ?>">
            </div>
            <div style="display:flex; gap:12px;">
                <button type="submit" class="btn btn-full">💾 Save Changes</button>
                <a href="?page=suppliers" class="btn btn-full" 
                   style="background:#888; text-align:center;">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php require APP . 'views/partials/footer.php'; ?>