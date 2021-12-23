<!DOCTYPE html>
<html lang="ja">

	<head>
		<meta charset="UTF-8">
		<title>4eachblog 掲示板</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
	<?php

	mb_internal_encoding("utf8");

	// 書き換え	$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
	require "DB.php";
	$dbConnect = new DB();
	$pdo = $dbConnect->connect();

	// 書き換え	$stmt = $pdo->query("select * from 4each_keijiban");
	$stmt = $pdo->prepare($dbConnect->select());
	$stmt->execute();

	?>

		<header>
			<img src="4eachblog_logo.jpg">
			<div class="menu">
				<ul>
					<li>トップ</li>
					<li>プロフィール</li>
					<li>4eachについて</li>
					<li>登録フォーム</li>
					<li>問い合わせ</li>
					<li>その他</li>
				</ul>
			</div>
		</header>

		<main>
			<div class="main_contents">
				<h1>プログラミングに役立つ掲示板</h1>

				<form method="post" action="insert.php">
					<h3>入力フォーム</h3>

					<div>
						<label>ハンドルネーム</label>
						<br>
						<input type="text" class="text" name="handlename" size="35">
					</div>

					<div>
						<label>タイトル</label>
						<br>
						<input type="text" class="text" name="title" size="35">
					</div>

					<div>
						<label>コメント</label>
						<br>
						<textarea cols="50" rows="5" name="comments"></textarea>
					</div>

					<div>
						<input type="submit" class="submit" value="投稿する">
					</div>
				</form>

				<?php

				while ($row = $stmt->fetch()) {

					echo "<div class='kiji'>";
					echo "<h3>".$row['title']."</h3>";
					echo "<p>".$row['comments']."</p>";
					echo "<p class='handlename'>posted by ".$row['handlename']."</p>";
					echo "</div>";
				}

				?>

			</div>

			<div class="sidebar">
				<h2>人気の記事</h2>
				<ul>
					<li>PHPオススメ本</li>
					<li>PHP MyAdminの使い方</li>
					<li>今人気のエディタ Top5</li>
					<li>HTMLの基礎</li>
				</ul>

				<h2>オススメリンク</h2>
				<ul>
					<li>インターノウス株式会社</li>
					<li>XAMPPのダウンロード</li>
					<li>Eclipseのダウンロード</li>
					<li>Bracketsのダウンロード</li>
				</ul>

				<h2>カテゴリ</h2>
				<ul>
					<li>HTML</li>
					<li>PHP</li>
					<li>MySQL</li>
					<li>JavaScript</li>
				</ul>
			</div>

		</main>

		<footer>
			<p>copyright © internous | 4each blog the which provides A to Z about programming.</p>
		</footer>

	</body>

</html>