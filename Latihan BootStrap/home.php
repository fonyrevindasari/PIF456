<!DOCTYPE html>
<html>
  <head>
    <title>Latihan Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">
				<h1>
					Praktikum Pemrograman Web
				</h1>
			</div>
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="home.php">Home</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Modul 4<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="Modul 4/Stusus/index.php">Studi Kasus</a>
								</li>
								<li>
									<a href="Modul 4/Tuprak/index.php">Tugas Praktikum</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Modul 5<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="Modul 5/StudiKasus.php">Studi Kasus</a>
								</li>
								<li>
									<a href="Modul 5/Tugas.php">Tugas Praktikum</a>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="?m=logout"">Logout</a>
						</li>
					</ul>
				</div>
				
			</nav>
			<h2>
				Data Diri
			</h2>
			<p>
				Nama : Fony Revindasari
			</p>
			<div>
				NIM : 110533430524
			</div>
			<div>
				Fakultas : Teknik
			</div>
			<div>
				Jurusan : Teknik Elektro
			</div>
			<div>
				Prodi : S1 Pendidikan Teknik Informatika
			</div>
			<div>
				Offering : 2011 off B
			</div>
			
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
			<div class="row clearfix">
				<div class="col-md-6 column">
					<h2>
						Modul 4
					</h2>
					<p>
						Modul 4 (Akses dan Manipulasi Data)
					</p>
					<div>
						Latihan :
					</div>
					<div>
						1. Koneksi ke Data Source
					</div>
					<div>
						2. Menciptakan Database dan Tabel
					</div>
					<div>
						3. Akses dan Manipulasi Data
					</div>
					<div>
						4. Administrasi Data
					</div>
					
					<p>
						<a class="btn" href="#">View details »</a>
					</p>
				</div>
				<div class="col-md-6 column">
					<h2>
						Modul 5
					</h2>
					<p>
						Modul 5 (Akses dan Manipulasi Data Lanjutan)
					</p>
					<div>
						Latihan :
					</div>
					<div>
						1. Pencarian Data
					</div>
					<div>
						2. Membatasi Tampilan Data
					</div>
					<div>
						3. Pemberian Halaman
					</div>
					
					
					<p>
						<a class="btn" href="#">View details »</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/bootstrap.min.js"></script>
</body>
</html>