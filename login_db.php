<?php
include 'include/session.php';
$conn = $pdo->open();

if (isset($_POST['login'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];

	try {

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
		$stmt->execute(['email' => $email]);
		$row = $stmt->fetch();
		if ($row['numrows'] > 0) {
			if ($row['status']) {
				if (password_verify($password, $row['password'])) {
					$_SESSION['user'] = $row['id'];
					// $_SESSION['firstname'] = $row['firstname'];
				} else {
					$_SESSION['error'] = 'รหัสผ่านผิดพลาด';
				}
			} else {
				$_SESSION['error'] = 'บัญชีไม่ได้เปิดใช้งาน';
			}
		} else {
			$_SESSION['error'] = 'ไม่พบอีเมล';
		}
	} catch (PDOException $e) {
		echo "มีปัญหาบางอย่างในการเชื่อมต่อ: " . $e->getMessage();
	}
} else {
	$_SESSION['error'] = 'ใส่ข้อมูลให้ครบก่อน เข้าสู่ระบบก่อน';
}

$pdo->close();

header('location: login.php');
