<?php 
	class User {
		function __construct()
		{
			date_default_timezone_set('Asia/Jakarta');
			$conn = mysqli_connect ("localhost", "root", "","lmu_id");

			if (mysqli_connect_errno()){
  				echo "Koneksi Gagal".mysqli_connect_error();
 			}	
		}
		// login lmu.id (Sulistya Ernawati)
		function login ($user, $pass){
			$query=mysqli_query($conn,"select * from user where usernames='$user' and passwords='$pass'".md5($pass)."'");
			$jumlahdata =mysqli_num_rows($query);

			if ($jumlahdata == 0 ) {
				echo "<script>alert('usernames dan passwords tidak sesuai !');
				window.location.href='login.php';</script>";
			}else{

				$data= mysqli_fetch_array($query);
				// cek jika user login sebagai admin
				if($data['level']=="1"){
	 
				// buat session login dan username
				$_SESSION['username'] = $data['nama_user'];
				$_SESSION['level'] = "Admin";
				// alihkan ke halaman dashboard admin
				echo "<script>alert('Login Sukses !');
				</script>";
				header("location:admin_dashboard.php");
				
				// cek jika user login sebagai kontributor
			}else if($data['level']=="2"){
				// buat session login dan username
				$_SESSION['username'] = $data['nama_user'];
				$_SESSION['level'] = "Kontributor";
				// alihkan ke halaman dashboard kontributor
				echo "<script>alert('Login Sukses !');
				</script>";
				header("location:kontributor_dashboard.php");
				
			}else if($data['level']=="3"){
				// buat session login dan username
				$_SESSION['username'] = $data['nama_user'];
				$_SESSION['level'] = "Pelanggan";
				// alihkan ke halaman dashboard pelanggan
				echo "<script>alert('Login Sukses !');
				</script>";
				header("location:pelanggan_dashboard.id"); 
			}
		}

		function logout(){
			session_destroy();
			header('location:login.php');
		}
	}
}
?>