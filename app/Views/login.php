<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<style>
    .login-container {
        min-height: 75vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 60px 20px;
        background: #f5f7fb;
    }

    .login-box {
        width: 420px;
        background: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.10);
    }

    .login-box h1 {
        text-align: center;
        color: #2346a0;
        margin-bottom: 10px;
    }

    .login-box p {
        text-align: center;
        color: #777;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333;
    }

    .form-group input {
        width: 100%;
        padding: 13px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
    }

    .form-group input:focus {
        outline: none;
        border-color: #2346a0;
    }

    .login-btn {
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 25px;
        background: #ffad0a;
        color: white;
        font-size: 17px;
        font-weight: bold;
        cursor: pointer;
    }

    .login-btn:hover {
        background: #e99b00;
    }

    .register-text {
        text-align: center;
        margin-top: 25px;
        color: #666;
    }

    .register-text a {
        color: #2346a0;
        font-weight: bold;
        text-decoration: none;
    }

    .register-text a:hover {
        text-decoration: underline;
    }
</style>

<!-- LOGIN FORM -->
<div class="login-container">

    <div class="login-box">

        <div class="text-center mb-3">
            <i class="fas fa-bolt text-warning" style="font-size: 3rem;"></i>
        </div>

        <h1>Welcome Back!</h1>

        <p>Login to your Puihaha Electric account.</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div style="
                background: #ffe5e5;
                color: #c62828;
                padding: 12px;
                border-radius: 6px;
                margin-bottom: 20px;
                text-align: center;
            ">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/login/authenticate') ?>" method="POST">

            <?= csrf_field() ?>

            <div class="form-group">

                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    value="<?= esc(old('username')) ?>"
                    required
                    autofocus
                >

            </div>

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >

            </div>

            <button type="submit" class="login-btn">
                <i class="fas fa-sign-in-alt me-2"></i>
                Login
            </button>

        </form>

        <div class="register-text">

            Don't have an account?

            <a href="<?= base_url('/register') ?>">
                Register here
            </a>

        </div>

    </div>

</div>

<?= $this->endSection() ?>