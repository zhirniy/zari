<?php include "page.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href='style.css' rel='stylesheet' type='text/css'>
	<title>Zari</title>
</head>
<ul>
	<li><a href="?page=1">Page1</a></li>
	<li><a href="?page=2">Page2</a></li>
	<li><a href="?page=3">Page3</a></li>
</ul>
<body>
<div id="contain">
<?php 
//Если страница 3 выводим дополнительные параметры поиска
if($page==3){
	echo '<form action="index.php">
			<input name="page" type="hidden" value="3">
			<select name="material">
				<option disabled selected value="material">Материал</option>
				<option value="дерево">Дерево</option>
				<option value="Дерево и металл">Дерево и Металл</option>
			</select>
			<select name="form">
				<option disabled selected value="forma_">Форма</option>
				<option value="круглая">Круглая</option>
				<option value="овальная">Овальная</option>
				<option value="слэб">Слэб</option>
			</select>
			<select name="breed">
				<option disabled selected value="breed_">Материал</option>
				<option value="Ясень">Ясень</option>
				<option value="сосна">Сосна</option>
			</select>
			<input type="submit" value="Найти">
	     </form>';
}
if(!empty($value)){
	for ($i=0; $i < count($value); $i++) { 
		echo '<div class="table">';
		echo '<div class="image" style="background-color:'.$value[$i]->color.'"></div>';
		echo '<p>Материал:'.$value[$i]->material.'</p>';
		echo '<p>Форма:'.$value[$i]->form.'</p>';
		echo '<p>Порода:'.$value[$i]->breed.'</p>';
		echo "</div>";
	}
}
?>
</div>
</body>
</html>