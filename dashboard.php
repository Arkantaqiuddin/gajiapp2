<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil informasi pengguna dari database
include 'config.php';
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM m_pegawai WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat datang, <?php echo $user['nama_pegawai']; ?>!</h1>
    <p>Anda login sebagai: <?php echo ($_SESSION['user_role'] == 'admin' ? 'Admin' : 'User'); ?></p>
    <p>NIP: <?php echo $user['nip']; ?></p>
    <p>Golongan: <?php echo $user['golongan']; ?></p>

    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
