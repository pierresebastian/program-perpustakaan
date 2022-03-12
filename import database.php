<?php
	include('connect.php');
	$sql = "CREATE TABLE users(
				id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
				nama_lengkap VARCHAR(100) NOT NULL,
				username VARCHAR(100) NOT NULL,
				password VARCHAR(100) NOT NULL,
				email VARCHAR(100) NOT NULL
			)";
	$sql = mysqli_query($con, $sql);
	
	$sql = "INSERT INTO users(nama_lengkap, username, password, email)
			VALUES
			('Pierre Sebastian', 'pierre123', 'md5('12345')', 'peirre@gmail.com'),
			('Andreas Stefanus', 'andre', 'md5('ithb')', 'andreasS@gmail.com'),
			('Devan Lubianto', 'devannn', 'md5('wkwkwk')', 'devanlubianto@gmail.com')
			('William Surjana', 'will', 'md5(surjana')', 'williams@gmail.com')
			";
	$sql = mysqli_query($con, $sql);
	
	$sql = "CREATE TABLE book(
				id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
				judul VARCHAR(100) NOT NULL,
				isi VARCHAR(100) NOT NULL,
				author VARHCAR(100) NOT NULL,
				foto VARCHAR(100) NOT NULL,
				ratting INT NOT NULL
			)";
	$sql = mysqli_query($con, $sql);
	
	$sql = "INSERT INTO book(judul, isi, author, foto, ratting)
			VALUES
			('Harry Potter and the Philosopher stone', '../buku/HP1.pdf', 'J.K. Rowling', '../image/HP1.jpg', '5'),
			('Harry Potter and the Chamber of Secrets', '../buku/HP2.pdf', 'J.K. Rowling', '../image/HP2.jpg', '2'),
			('Harry Potter and the Prisoner of Azkaban', '../buku/HP3.pdf',, 'J.K. Rowling' '../image/HP3.jpg', '4'),
			('Harry Potter and the Goblet of Fire', '../buku/HP4.pdf', 'J.K. Rowling', '../image/HP4.jpg', '1'),
			('Harry Potter and the Order of the Phoenix', '../buku/HP5.pdf', 'J.K. Rowling', '../image/HP5.jpg', '5')
			";
	$sql = mysqli_query($con, $sql);
	
	$sql = "CREATE TABLE lomba(
				id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
				nama_event VARCHAR(100) NOT NULL,
				active_inactive INT NOT NULL,
				gambar VARCHAR(100) NOT NULL
			)";
	$sql = mysqli_query($con, $sql);
	
	$sql = "INSERT INTO lomba(nama_event, active_inactive, gambar)
			VALUES
			('Write Short Story', 1, '../image/cerpen.jpg'),
			('Write Book' , 0, '../image/buku.jpg')
			";
	$sql = mysqli_query($con, $sql);
	
	$sql = "CREATE TABLE pendaftaran(
				id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
				nama_lengkap VARCHAR(100) NOT NULL,
				email VARCHAR(100) NOT NULL,
				Book VARCHAR(100) NOT NULL,
				nama_lomba VARCHAR(100) NOT NULL
			)";
	$sql = mysqli_query($con, $sql);
	
	$sql = "CREATE TABLE biodata(
				id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
				nama VARCHAR(100) NOT NULL,
				instagram VARCHAR(100) NOT NULL,
				line VARCHAR(100) NOT NULL,
				hobby VARCHAR(100) NOT NULL
				email VARCHAR(100) NOT NULL
			)";
	$sql = mysqli_query($con, $sql);
	
	$sql = "INSERT INTO biodata(nama, instagram, line, hobby, email)
			VALUES
			('Pierre Sebastian', '@pierresebastiannn', 'pierresebastian', 'Bermain musik, futsal, dan bersosial media', 'pierresebastian30@gmail.com'),
			('Andreas Stefanus', '@andreas.stefanus', 'andreasstefanus', 'Menyanyi, bermain games, dan berolahraga', 'andreasstef100@gmail.com'),
			('Devan Lubianto', '@devanlubianto', 'devanlubianto' 'Bermain games dan berolahraga', 'devanlubianto@gmail.com'),
			('William Surjana', '@william.surjana', 'william.surjana', 'Membuat orang tertawa', 'williamsurjana@gmail.com')
			";
	$sql = mysqli_query($con, $sql);
	
	echo "<script>alert('Success Import Database, Going to Login Menu');document.location = 'login/login.php';</script>";
?>