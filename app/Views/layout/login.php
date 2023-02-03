<?= $this->extend('template/page_login'); ?>

<?= $this->section('login_box'); ?>
<div class="login-logo">
    <a href="/">AdminAPP</a>
</div>
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form method="POST">
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="text-center pt-4">
                <div class="icheck-primary mb-4">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>