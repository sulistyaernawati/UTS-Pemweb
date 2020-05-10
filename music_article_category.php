<?php 
	class Music_Article_Category{
		function __construct(){
			$this->conn = mysqli_connect('localhost', 'root', '', 'lmu_id');

			if (mysqli_connect_errno()) {
				echo mysqli_connect_error();
			}
		}

		function getArticleCategory(){
			$data = mysqli_query($this->conn, "SELECT * FROM article_category");
			while ($row = mysqli_fetch_array($data)) {
				$res = $row;
			}
			return $res;
		}

		function getMenuCategoryById($id){
			$data = mysqli_query($this->conn, "SELECT * FROM article_category WHERE id_article_category = ".$id);
			while ($row = mysqli_fetch_array($data)) {
				$res = $row;
			}
			return $res;
		}

		function addMenuCategory($article, $category_name){
			$ins = mysqli_query($this->conn, "INSERT INTO article_category VALUES(null,'$article', '$category_name')");
			
			return $ins;
		}

		function updateMenuCategory($id, $article, $category_name){
			$ed = mysqli_query($this->conn, "UPDATE article_category SET id_article = '$article', category_name = '$category_name' WHERE id_article_category = $id");
			return $ed;
		}

		function deleteMenuCategory($id){
			$del = mysqli_query($this->conn, "DELETE FROM article_category WHERE id_article_category = $id");
			return $del;
		}
	}
 ?>