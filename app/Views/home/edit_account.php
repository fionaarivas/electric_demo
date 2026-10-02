<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Customer Account - Puihaha Electric</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
        }

        .main-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            padding: 30px;
            margin: 20px auto;
            max-width: 900px;
        }

        .header-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .header-section h1 {
            color: #667eea;
            font-weight: bold;
        }

        .form-section {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="main-container">

        <!-- Header -->
        <div class="header-section">

            <h1>
                <i class="bi bi-lightning-charge-fill text-warning"></i>
                Puihaha Electric Company
            </h1>

            <p class="text-muted">
                Edit Customer Account
            </p>

            <?php if (!empty($username)): ?>
                <p class="text-muted">
                    Logged in as
                    <strong><?= esc($username) ?></strong>
                </p>
            <?php endif; ?>

        </div>

        <!-- Edit Form -->
        <div class="form-section">

            <form
                action="<?= base_url('account/update/' . $account['id']) ?>"
                method="POST"
            >

                <?= csrf_field() ?>

                <div class="row g-3">

                    <!-- Account Number -->
                    <div class="col-md-6">

                        <label
                            for="account_number"
                            class="form-label"
                        >
                            Account Number
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="account_number"
                            name="account_number"
                            value="<?= esc($account['account_number']) ?>"
                            required
                        >

                    </div>

                    <!-- Customer Name -->
                    <div class="col-md-6">

                        <label
                            for="customer_name"
                            class="form-label"
                        >
                            Customer Name
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="customer_name"
                            name="customer_name"
                            value="<?= esc($account['customer_name']) ?>"
                            required
                        >

                    </div>

                    <!-- Address -->
                    <div class="col-12">

                        <label
                            for="address"
                            class="form-label"
                        >
                            Address
                        </label>

                        <textarea
                            class="form-control"
                            id="address"
                            name="address"
                            rows="3"
                            required
                        ><?= esc($account['address']) ?></textarea>

                    </div>

                    <!-- Phone -->
                    <div class="col-md-6">

                        <label
                            for="phone"
                            class="form-label"
                        >
                            Phone
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="phone"
                            name="phone"
                            value="<?= esc($account['phone']) ?>"
                            required
                        >

                    </div>

                    <!-- Email -->
                    <div class="col-md-6">

                        <label
                            for="email"
                            class="form-label"
                        >
                            Email
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            value="<?= esc($account['email']) ?>"
                            required
                        >

                    </div>

                    <!-- Meter Number -->
                    <div class="col-md-6">

                        <label
                            for="meter_number"
                            class="form-label"
                        >
                            Meter Number
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="meter_number"
                            name="meter_number"
                            value="<?= esc($account['meter_number']) ?>"
                            required
                        >

                    </div>

                    <!-- Connection Type -->
                    <div class="col-md-6">

                        <label
                            for="connection_type"
                            class="form-label"
                        >
                            Connection Type
                        </label>

                        <select
                            class="form-select"
                            id="connection_type"
                            name="connection_type"
                            required
                        >

                            <option value="">
                                Select Type
                            </option>

                            <option
                                value="residential"
                                <?= $account['connection_type'] == 'residential' ? 'selected' : '' ?>
                            >
                                Residential
                            </option>

                            <option
                                value="commercial"
                                <?= $account['connection_type'] == 'commercial' ? 'selected' : '' ?>
                            >
                                Commercial
                            </option>

                            <option
                                value="industrial"
                                <?= $account['connection_type'] == 'industrial' ? 'selected' : '' ?>
                            >
                                Industrial
                            </option>

                        </select>

                    </div>

                    <!-- Status -->
                    <div class="col-md-6">

                        <label
                            for="status"
                            class="form-label"
                        >
                            Status
                        </label>

                        <select
                            class="form-select"
                            id="status"
                            name="status"
                            required
                        >

                            <option value="">
                                Select Status
                            </option>

                            <option
                                value="active"
                                <?= $account['status'] == 'active' ? 'selected' : '' ?>
                            >
                                Active
                            </option>

                            <option
                                value="inactive"
                                <?= $account['status'] == 'inactive' ? 'selected' : '' ?>
                            >
                                Inactive
                            </option>

                            <option
                                value="suspended"
                                <?= $account['status'] == 'suspended' ? 'selected' : '' ?>
                            >
                                Suspended
                            </option>

                        </select>

                    </div>

                </div>

                <!-- Buttons -->
                <div class="mt-4 d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-save"></i>
                        Update Account
                    </button>

                    <a
                        href="<?= base_url('customer-accounts') ?>"
                        class="btn btn-secondary"
                    >
                        <i class="bi bi-arrow-left"></i>
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>