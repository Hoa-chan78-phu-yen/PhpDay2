<?php
include 'Customer.php';
session_start();

if (!isset($_SESSION['customers'])) {
    $_SESSION['customers'] = [];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $customer = new Customer($id, $username, $password, $fullname, $address, $phone, $gender, $birthday);
    $_SESSION['customers'][] = $customer;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2>Add New Customer</h2>
    <form method="post" action="">
        ID: <input type="text" name="id" required><br><br>
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        Fullname: <input type="text" name="fullname" required><br><br>
        Address: <input type="text" name="address" required><br><br>
        Phone: <input type="text" name="phone" required><br><br>
        Gender: 
        <select name="gender" required>
            <option value="">--Select--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>
        Birthday: <input type="date" name="birthday" required><br><br>
        <input type="submit" value="Add Customer">
    </form>
    <h2>Customer List</h2>
    <?php if (!empty($_SESSION['customers'])): ?>
    <table class="table table-bordered table-striped table-hover mt-3">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Fullname</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Birthday</th>
        </tr>
        <?php foreach ($_SESSION['customers'] as $cust): ?>
        <tr>
            <td><?= htmlspecialchars($cust->id) ?></td>
            <td><?= htmlspecialchars($cust->username) ?></td>
            <td><?= htmlspecialchars($cust->password) ?></td>
            <td><?= htmlspecialchars($cust->fullname) ?></td>
            <td><?= htmlspecialchars($cust->address) ?></td>
            <td><?= htmlspecialchars($cust->phone) ?></td>
            <td><?= htmlspecialchars($cust->gender) ?></td>
            <td><?= htmlspecialchars($cust->birthday) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
        <p class="text-muted">No customers added yet.</p>
    <?php endif; ?>
</body>
</html>
