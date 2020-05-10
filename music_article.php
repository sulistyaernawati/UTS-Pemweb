<?php 
	class Article
	{
		
		function __construct()
		{
			date_default_timezone_set('Asia/Jakarta');
			$conn = mysqli_connect ("localhost", "root", "","lmu_id");

			if (mysqli_connect_errno()){
  				echo "Koneksi Gagal".mysqli_connect_error();
 			}	
		}
		function getArticle(){
			$data = mysqli_query($this->conn, "SELECT * FROM music_article");
			while ($row = mysqli_fetch_array($data)) {
				$res = $row;
			}
			return $res;
		}
		function getArticleById($id_article){
			$data = mysqli_query($this->conn, "SELECT * FROM music_article WHERE id_article = ".$id);
			while ($row = mysqli_fetch_array($data)) {
				$res = $row;
			}
			return $res;
		}
		function addArticle($title_article, $id, $isi_article, $tanggal_publish){
			$ins = mysqli_query($this->conn, "INSERT INTO music_article VALUES(null,'$title_article','$id', '$isi_article', '$tanggal_publish')");
			
			return $ins;
		}

		function updateArticle($id_article, $title_article, $id, $isi_article, $tanggal_publish){
			$ed = mysqli_query($this->conn, "UPDATE music_article SET id_article
			 = '$id_article', title_article = '$title_article', isi_article = '$isi_article', tanggal_publish = '$tanggal_publish' WHERE id_article = $id_article");
			return $ed;
		}

		function deleteMenu($id){
			$del = mysqli_query($this->conn, "DELETE FROM music_article WHERE id_article = $id_article");
			return $del;
		}
	}
?>