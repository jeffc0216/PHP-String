<?php
	session_start();
?>
<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>
		
	</title>
	<style>
		span {
			color: #ff0000;
		}
		textarea {
			width: 300px;
			height: 100px;
		}
	</style>
	</head>
	<body>
		<p>string.php</p>
		
		<?php
			echo "str_replace:<br>";
			$description = str_replace("\n","<br>",$_POST["description"]);


			$description = str_replace($_POST["keyword"],
				"<span>".$_POST["keyword"]."</span>", 
				$description);	
			echo $description;
		?>
		<form action="?" method="post" enctype="multipart/form-data">
			Keyword:<br>
			<input type="text" name="keyword"><br>
			
			Description:<br>
			<textarea name="description" style="width:300px;height:100px;"></textarea>
			<input type="submit" value="Send">
		</form>
		================================================================<br>
		<?php
			echo "explode:<br>";
			//print_r(explode("-", "2016-05-23"));
			foreach(explode("\n", $_POST["date"]) as $key => $value){
				$d=explode("-",$value);

				if($d[1]=="05"){
					echo $value."<br>";
				}
			}
		?>
		<form action="?" method="post" enctype="multipart/form-data">			
			Date:<br>
			<textarea name="date"></textarea>
			<input type="submit" value="Send">
		</form>
		================================================================<br>
		<?php
			if(_GET["action"] == "implode"){
				echo "implode:<br>";
				echo implode("-", array(2016,05,23)); //當成數字會去掉0
				echo "<br>";
				echo implode("-", array(2016,'05',23));
			}
		?>
		<br>
		<form action="?action=implode" method="post" enctype="multipart/form-data">			
			Birthday:<br><br>
			Date:<input type="date" name="date"><br><br>
			<input type="number" name="birthday[year]" min="1900" max="2016">-
			<input type="number" name="birthday[month]" min="1" max="12">-
			<input type="number" name="birthday[day]" min="1" max="31">
			<input type="submit" value="Send">
		</form><br>
		<?php
			//傳統串法 不建議用
			//echo $_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
			echo $_POST["birthday"]["year"]."-".$_POST["birthday"]["month"]."-".$_POST["birthday"]["day"];
			echo "<br>";
			//直接用$_POST會有其他資料干擾，所以要改成陣列才可避免
			echo implode("-", $_POST["birthday"]); 
		?>
		<br>================================================================<br>
		<?php
			//全改小寫
			echo "strtolower:<br>";
			echo strtolower('ABC');
			echo "<br>";
			//全改大寫
			echo "strtoupper:<br>";
			echo strtoupper('abc');
			echo "<br>";
		?>
		<br>================================================================<br>
		<?php
			//字串長度
			echo "strlen:<br>";
			echo strlen("dhjhbtulibjokfeflrgty");
			echo "<br>";
		?>
		<br>================================================================<br>
		<?php
			echo "substr1:<br>";
			//在0~21的字母中，從2開始取出5個
			echo substr("dhjhbtulibjokfeflrgty", 2, 5); 
			echo "<br><br>";
		?>

		<?php
			echo "substr2:<br>";
			if($_GET["action"] == "substr"){
				//在0~21的字母中，從0開始取出5個
				echo "<div id='substr_show'>"; //截斷文字標籤
				echo substr($_POST["content"], 0, 5); 
				//字串超過5個之後的顯示...
				if(strlen($_POST["content"]) > 5){
					echo "...";
				}
				echo "<a href='javascript:show_all();'>(More)</a>";
				echo "</div>";
				echo "<div id='substr_all' style='display:none;'>".$_POST["content"]."</div>"; //完整文字標籤
				echo "<br>";
			}
		?>
		<script>
			function show_all(){
				document.querySelector("#substr_show").style.display="none";
				document.querySelector("#substr_all").style.display="block";
			}
		</script>
		<form action="?action=substr" method="post" enctype="multipart/form-data">			
			Content:<br>
			<textarea name="content"></textarea><br>
			<input type="submit" value="Send">
		</form><br>
		<br>================================================================<br>
		<?php
			echo "strchr:<br>";
			if($_GET["action"] == "strchr"){
				
				//判斷是否有找到
				if(strchr($_POST["content"],$_POST["keyword"]) != false){
					echo "找到了";
				} else {
					echo "沒找到";
				}
				echo "<br>";
			}
		?>
		<form action="?action=strchr" method="post" enctype="multipart/form-data">
			Keyword:<br>
			<input type="text" name="keyword"><br>
			
			Content:<br>
			<textarea name="content"></textarea><br>
			<input type="submit" value="Send">
		</form>






	</body>
</html>