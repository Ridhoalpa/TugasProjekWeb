<!DOCTYPE html>
<html>
<head> 
	<link rel="stylesheet" type="text/css" href="../css/home-pegawai.css">
	<?php 
	session_start();
	include '../../controler/koneksi.php';
	$query = mysqli_query($koneksi,"SELECT * FROM data_donasi ORDER BY id_pengguna ASC");
	?>
	<title></title>
</head>
<body>
	<table>
		<div class="header">
			<div >
				<div class="logoo">
					<img src="../img/a.png" width=200px; height=50px;>
				</div>
				<ul class="user">
					<?php 
					if (isset($_SESSION['username'])){
						echo '<a onclick="konfirmasi();" href="../../controler/logout.php">Keluar</a>';
						echo '<a href"home-pegawai-profil.php">Hi, '.$_SESSION['username'].'</a>';

					} 
					else{echo '<a href="login.php">Masuk/Daftar</a>';}
					?>
					<script language = "javascript">
						function konfirmasi(){
							var tanya = confirm("Apakah Anda Yakin ?");
							if (tanya == true){
								window.location.href = "logout.php"; 
							}
						}
					</script>
				</ul> 
				<ul class="user1">
					<a href="home-pegawai.php"><p>Beranda</p></a>
				</ul> 
			</div>
		</div>
	</table>


	<br><br><br><br><br><br>
	<ul class="ul">
		<div>
			<li class="li"><a href="home-pegawai-profil.php">Profil</a></li>
		</div>
		<div>
			<li class="li"><a href="home-pegawai-update.php">Tambah Buku</a></li>
		</div>
		<div>
			<li class="li"><a href="home-pegawai-verifikasi.php">Verifikasi Buku</a></li>
		</div>
		<div>
			<li class="li"><a href="home-pegawai-listbuku.php">Edit Buku</a></li>
		</div>
		<div>
			<li class="li"><a href="home-pegawai-listdonasi.php">Data Donasi</a></li>
		</div>
		<div>
			<li class="li"><a href="home-pegawai-listtukar.php">Data Tukar</a></li>
		</div>
	</ul>s

	<div style="margin-left:25%;padding:1px 16px;height:100%;">
		<section>
			<article class="article">
				<div class="judul_data"><b>Data Donasi Buku</b></div>
				
				<table class="tabel1">
					<tr>
						<th>NO</th>
						<th>ID Pengguna</th>
						<th>ID Buku</th>
						<th>Judul</th>
						<th>Pengarang</th>
						<th colspan="2">Keterangan</th>
					</tr>
					<?php if(mysqli_num_rows($query)>0){
						$no = 1;
						while($data = mysqli_fetch_array($query)){
							?>
							<tr>
								<td><?php echo $no ?></td>
								<td>
									<p><?php echo $data["id_pengguna"];?></p>
								</td> 
								<td>
									<p><?php echo $data["id_buku"];?></p>
								</td> 
								<td><?php echo $data["judul_buku"];?></td> 					               
								<td>
									<p><?php echo $data["pengarang"];?></p>
								</td> 
								<td>
									<?php 
									if ($data["status"]==0) {
										echo '<p>Tidak Sesuai</p>';
										}elseif ($data["status"]==1) {
											echo '<p>Sesuai</p>';
										}
										else{
											echo '<form class="form1" method="POST" action="../../controler/proses-terima-donasi.php">
												<input type="hidden" name="id_pengguna" value="'.$data['id_pengguna'].'">
												<input type="hidden" name="id_buku" value="'.$data['id_buku'].'">
												<input type="hidden" name="judul" value="'.$data['judul_buku'].'">
												<input type="hidden" name="pengarang" value="'.$data['pengarang'].'">
												<input type="hidden" name="tahun" value="'.$data['tahun_terbit'].'">
												<input type="hidden" name="deskripsi" value="'.$data['deskripsi'].'">
												<input type="submit" name="terima" class="blue" value="Terima">
											</form>
										</td>
										<td>
											<form class="form1" method="POST" action="../../controler/proses-tolak-donasi.php">
												<input type="hidden" name="id_pengguna" value="'.$data['id_pengguna'].'">
												<input type="hidden" name="id_buku" value="'.$data['id_buku'].'">
												<input type="submit" name="hapus" class="red" value="Tolak ">
											</form>';
											}?>
										</td>
									</tr>
									<?php $no++; } ?>
								<?php } ?>
							</table>
							<br><br><br><br><br><br><br><br><br>


							<br><br>
							<div class="footer" align="center">
								<p id="lol" font  ></p>
								<script >
									function Person(first, last, age, eye) {
										this.firstName = first;
										this.lastName = last;
										this.age = age;
										this.eyeColor = eye;
									}
									var orang1 = new Person("Ridho", "ilahi", 20, "blue");
									var orang2 = new Person("Rizki", "Rahmadi", 20, "green");
									var orang3 = new Person("Yusril", "Raihan", 20, "red");
									document.getElementById("lol").innerHTML =
									"Copyright &copy; 2014 " + orang1.firstName + " " + orang2.firstName + " And " + orang3.firstName;  
								</script>	
							</div>	
						</article> 
					</section>
				</div>


			</body>
			</html>