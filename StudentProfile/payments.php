<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Portal - English Institute</title>
    <?php include('../utilities/db.php'); ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 100%);
            min-height: 100vh;
            padding: 20px;
        }

        button.menu-btn {
            position: fixed;
            top: 30px;
            left: 30px;
            width: 50px;
            height: 50px;
            background: white;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 5px;
            transition: all 0.3s;
            z-index: 1001;
        }

        button.menu-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }

        button.menu-btn span {
            width: 25px;
            height: 3px;
            background: #302b63;
            border-radius: 2px;
            transition: all 0.3s;
            display: block;
        }

        button.menu-btn.active span:nth-child(1) {
            transform: rotate(45deg) translate(7px, 7px);
        }

        button.menu-btn.active span:nth-child(2) {
            opacity: 0;
        }

        button.menu-btn.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }


        div.sidebar-menu {
            position: fixed;
            top: 0;
            left: -300px;
            width: 300px;
            height: 100vh;
            background: white;
            box-shadow: 5px 0 20px rgba(0, 0, 0, 0.3);
            transition: left 0.3s ease;
            z-index: 1000;
            padding: 80px 0 20px 0;
        }

        div.sidebar-menu.active {
            left: 0;
        }

        div.menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
            z-index: 999;
        }

        div.menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .sidebar-menu .menu-header {
            padding: 0 25px 20px;
            border-bottom: 2px solid #f0f0f0;
        }

        .sidebar-menu .menu-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .sidebar-menu .menu-subtitle {
            font-size: 13px;
            color: #666;
        }

        .sidebar-menu .menu-items {
            padding: 10px 0;
        }

        .sidebar-menu a.menu-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 25px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s;
            font-size: 15px;
            font-weight: 500;
        }

        .sidebar-menu a.menu-item:hover {
            background: #f8f9ff;
            color: #302b63;
        }

        .sidebar-menu a.menu-item.active {
            background: #302b63;
            color: white;
            border-left: 4px solid #0f0c29;
        }

        .sidebar-menu .menu-item-icon {
            font-size: 20px;
            width: 25px;
            text-align: center;
        }

        .sidebar-menu .menu-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 20px 25px;
            border-top: 2px solid #f0f0f0;
        }


        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .summary-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }

        .summary-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            border-left: 4px solid;
        }

        .summary-card.total {
            border-color: #3498db;
        }

        .summary-card.paid {
            border-color: #27ae60;
        }

        .summary-card.remaining {
            border-color: #e74c3c;
        }

        .card-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .card-amount {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .payment-section,
        .history-section {
            background: white;
            padding: 25px;
            margin: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #555;
            margin-bottom: 6px;
            display: block;
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: #667eea;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            background: #302b63;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .payment-item {
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .payment-item:last-child {
            border-bottom: none;
        }

        .payment-info {
            flex: 1;
        }

        .payment-date {
            font-size: 12px;
            color: #999;
            margin-bottom: 3px;
        }

        .payment-method {
            font-size: 13px;
            color: #666;
        }

        .payment-amount {
            font-size: 16px;
            font-weight: bold;
            color: #27ae60;
        }

        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            background: #d4edda;
            color: #155724;
            margin-left: 10px;
        }

        @media (max-width: 768px) {
            .nav-links {
                gap: 10px;
            }

            .nav-link {
                font-size: 12px;
                padding: 6px 10px;
            }

            .summary-cards {
                grid-template-columns: 1fr;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .nav-header,
            .payment-section {
                display: none !important;
            }

            .content-grid {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
</head>
<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.php");
    exit();
}

$id = $_SESSION['user_id'];
$sql = $conn->prepare("SELECT PRICE, PAID FROM REGISTRATION WHERE STUDENT_ID = ?");
$sql->bind_param("i", $id);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    $payment = $result->fetch_assoc();
} else {
    $payment = [
        'PRICE' => 0,
        'PAID' => 0
    ];
}
?>

<body>
    <button class="menu-btn" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <div class="sidebar-menu" id="sidebarMenu">
        <div class="menu-header">
            <div class="menu-title">Student Dashboard</div>
        </div>
        <div class="menu-items">
            <a href=studentProfile.php class="menu-item active">
                <span class="menu-item-icon">📄</span>
                <span>My Profile</span>
            </a>
            <a href="payments.php" class="menu-item">
                <span class="menu-item-icon">💳</span>
                <span>Payments</span>
            </a>
        </div>
        <div class="menu-footer">
            <a href="logout.php" class="menu-item" style="color: #e74c3c;">
                <span class="menu-item-icon">🚪</span>
                <span>Logout</span>
            </a>
        </div>
    </div>

    <div class="menu-overlay" id="menuOverlay" onclick="toggleMenu()"></div>

    <div class="container">
        <div class="summary-cards">
            <div class="summary-card total">
                <div class="card-label">Total Fee</div>
                <div class="card-amount"><?php echo $payment["PRICE"]; ?></div>
            </div>
            <div class="summary-card paid">
                <div class="card-label">Paid</div>
                <div class="card-amount"><?php echo $payment["PAID"]; ?></div>
            </div>
            <div class="summary-card remaining">
                <div class="card-label">Remaining</div>
                <div class="card-amount"><?php echo $payment["PRICE"] - $payment["PAID"]; ?></div>
            </div>
        </div>


        <div class="content-grid">

            <div class="payment-section">
                <div class="section-title">Make Payment</div>

                <form action="" method="POST">
                    <div class="form-group">
                        <label class="form-label">Amount</label>
                        <input type="number" name="amount" class="form-input" placeholder="Enter amount" value="<?php echo $payment["PRICE"] - $payment["PAID"]; ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Payment Method</label>
                        <select name="payment_method" class="form-select" required>
                            <option value="">Select payment method</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="mobile">Mobile Payment</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Note (Optional)</label>
                        <input type="text" name="note" class="form-input" placeholder="Payment note">
                    </div>

                    <button type="submit" class="btn-primary">
                        💳 Pay Now
                    </button>
                </form>
            </div>

            <div class="history-section">
                <div class="section-title">Recent Payments</div>

                <div class="payment-item">
                    <div class="payment-info">
                        <div class="payment-date">Jan 15, 2026</div>
                        <div class="payment-method">Credit Card</div>
                    </div>
                    <div>
                        <span class="payment-amount">$1,500</span>
                        <span class="status-badge">Paid</span>
                    </div>
                </div>

                <div class="payment-item">
                    <div class="payment-info">
                        <div class="payment-date">Dec 10, 2025</div>
                        <div class="payment-method">Bank Transfer</div>
                    </div>
                    <div>
                        <span class="payment-amount">$1,000</span>
                        <span class="status-badge">Paid</span>
                    </div>
                </div>

                <div class="payment-item">
                    <div class="payment-info">
                        <div class="payment-date">Nov 5, 2025</div>
                        <div class="payment-method">PayPal</div>
                    </div>
                    <div>
                        <span class="payment-amount">$700</span>
                        <span class="status-badge">Paid</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</div>

<script>
    function toggleMenu() {
        const menu = document.getElementById('sidebarMenu');
        const overlay = document.getElementById('menuOverlay');
        const menuBtn = document.querySelector('.menu-btn');

        menu.classList.toggle('active');
        overlay.classList.toggle('active');
        menuBtn.classList.toggle('active');
    }
</script>
</body>

</html>