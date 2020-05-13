<?php  
	header('Content-Type:text/html;charset=utf-8');
	include('pdo.php');
	$action = isset($_POST["action"]) ? $_POST["action"] : "";
	if($action == "posts") {
		$title = $_POST["posts_title"];
		$content = $_POST["content"];
		$query = "INSERT INTO `post`(`title`,`content`) VALUES (?,?)";
		$result = $link->prepare($query);	//聲明 placeholder
		$result->execute(array("$title","$content"));		//將先前聲明的欄位的值放進去
		if($result) {
			$query = "SELECT `id` FROM `post` ORDER BY `id` DESC Limit 1";
			$result = $link->prepare($query);	//聲明 placeholder
			$result->execute();
			if($result) {
				$row = $result->fetch(PDO::FETCH_ASSOC);
				$ret[0] = "success";
				$ret[1] = $row["id"];
			}
			else
				$ret[0] = "failure";
		}
		else
			$ret[0] = "failure";
	}
    echo json_encode($ret);
?>