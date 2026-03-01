<?php $pageTitle = "Login — Musanze Potato Market"; ?>
<?php require APP . 'views/partials/header.php'; ?>

<div class="auth-wrapper">
    <div class="login-box">
        <div class="logo">
            <div class="icon">🥔</div>
            <h2>Musanze Potato Market</h2>
            <p>Order Management System</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="alert alert-error">⚠️ <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="?page=login">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username"
                       placeholder="Enter your username" required
                       value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"
                       placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-full"> Login</button>
        </form>
        
    </div>
</div>

<?php require APP . 'views/partials/footer.php'; ?>