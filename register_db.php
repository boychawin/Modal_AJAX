<?php

include 'include/session.php';

if (isset($_POST['signup'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];


	if (!isset($_SESSION['captcha'])) {

		$secretKey = '6LcITtQZAAAAALiRB5oKaGsDa-z_yVK1U1I78FQz';
		$ip = $_SERVER['REMOTE_ADDR'];
		$captcha = $_POST['g-recaptcha-response'];
		$response = file_get_contents(
			'https://www.google.com/recaptcha/api/siteverify?secret=' .
				$secretKey .
				'&response=' .
				$captcha .
				'&remoteip=' .
				$ip
		);
		$responseKeys = json_decode($response, true);
		if (intval($responseKeys['success']) !== 1) {
			$_SESSION['error'] = 'กรุณาตอบ recaptcha ให้ถูกต้อง';
			header('location: register.php');
			exit();
		}
	}

	if ($password != $repassword) {
		$_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
		header('location: register.php');
	} else {
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email' => $email]);
		$row = $stmt->fetch();
		if ($row['numrows'] > 0) {
			$_SESSION['error'] = 'อีเมลซ้ำ';
			header('location: register.php');
		} else {
			$now = date('Y-m-d');
			$password = password_hash($password, PASSWORD_DEFAULT);

			//generate code
			$set = 'e66831415d23f88990c2b0da35112aad';
			$code = substr(str_shuffle($set), 0, 12);

			try {
				$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname,status) VALUES (:email, :password, :firstname, :lastname, :status)");
				$stmt->execute(['email' => $email, 'password' => $password, 'firstname' => $firstname, 'lastname' => $lastname, 'status' => '1']);
				$userid = $conn->lastInsertId();

				$_SESSION['success'] = 'สมัครใช้งานสำเร็จ';
				header('location: register.php');
			} catch (PDOException $e) {
				$_SESSION['error'] = $e->getMessage();
				header('location: register.php');
			}

			$pdo->close();
		}
	}
} else {
	$_SESSION['error'] = 'กรอกแบบฟอร์มสมัครก่อน';
	header('location: register.php');
}
