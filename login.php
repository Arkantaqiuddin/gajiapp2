<?php
session_start();
include 'config.php'; // Pastikan file ini berisi koneksi database Anda

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];

    $query = "SELECT * FROM m_pegawai WHERE nama_pegawai = ? AND nip = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $nama, $nip);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['is_admin'] ? 'admin' : 'user';
        header("Location: dashboard.php");
    } else {
        echo "Nama atau NIP salah!";
    }
}
?>
