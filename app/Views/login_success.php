<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Login Successful - Puihaha Electric Company</title>

<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet">

<link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css"
    rel="stylesheet">

<style>
    body {
        background: #171522;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Arial, sans-serif;
        overflow: hidden;
    }

    /* Soft pink glow in the background */
    body::before {
        content: "";
        position: fixed;
        width: 350px;
        height: 350px;
        background: #e88bb5;
        border-radius: 50%;
        filter: blur(120px);
        opacity: 0.25;
        top: -100px;
        left: -100px;
    }

    body::after {
        content: "";
        position: fixed;
        width: 300px;
        height: 300px;
        background: #f3a6c8;
        border-radius: 50%;
        filter: blur(120px);
        opacity: 0.18;
        bottom: -100px;
        right: -80px;
    }

    .success-card {
        position: relative;
        z-index: 1;
        background: #211e2d;
        width: 100%;
        max-width: 500px;
        padding: 45px;
        border-radius: 20px;
        border: 1px solid rgba(242, 166, 201, 0.35);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.45);
        text-align: center;
    }

    .success-icon {
        width: 85px;
        height: 85px;
        margin: 0 auto 25px;
        border-radius: 50%;
        background: rgba(232, 139, 181, 0.12);
        border: 2px solid #e88bb5;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #f3a6c8;
        font-size: 42px;
        box-shadow: 0 0 25px rgba(232, 139, 181, 0.2);
    }

    .success-card h1 {
        color: #f3a6c8;
        font-weight: 700;
        margin-bottom: 15px;
        letter-spacing: 0.5px;
    }

    .success-message {
        color: #c8c3d1;
        margin-bottom: 8px;
    }

    .username {
        color: #ffffff;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .welcome-message {
        color: #918c9c;
        font-size: 14px;
    }

    .continue-btn {
        margin-top: 25px;
        padding: 11px 28px;
        border: none;
        border-radius: 10px;
        background: #e88bb5;
        color: #211e2d;
        font-weight: 700;
        transition: 0.2s ease;
    }

    .continue-btn:hover {
        background: #f3a6c8;
        color: #211e2d;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(232, 139, 181, 0.25);
    }

    .brand {
        color: #918c9c;
        font-size: 12px;
        margin-top: 25px;
        letter-spacing: 1px;
    }
</style>
```

</head>

<body>

<div class="success-card">

```
<div class="success-icon">
    <i class="bi bi-check-lg"></i>
</div>

<h1>Login Successful!</h1>

<p class="success-message">
    You have successfully logged in as
</p>

<div class="username">
    <?= esc($username) ?>
</div>

<p class="welcome-message">
    Welcome back to Puihaha Electric Company.
</p>

<a
    href="<?= base_url('customer-accounts') ?>"
    class="btn continue-btn">
    <i class="bi bi-arrow-right-circle"></i>
    Continue to Dashboard
</a>

<div class="brand">
    PUIHAHA ELECTRIC COMPANY
</div>
```

</div>

</body>
</html>
