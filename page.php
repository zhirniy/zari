<?php
/**
 * Класс для создания экземпляров объекта
 */
class Table
{
	public $material;
	public $form;
	public $breed;
	    public function __construct($material, $form, $breed, $color) {
        $this->material = $material;
        $this->form = $form;
        $this->breed = $breed;
        $this->color = $color;
    }

}
/*Экземпляры класса*/
$id1 = new Table('дерево', 'круглая', 'Ясень', 'red');
$id2 = new Table('Дерево и металл', 'овальная', 'сосна', 'yellow');
$id3 = new Table('дерево', 'овальная', 'Ясень', 'blue');
$id4 = new Table('Дерево и металл', 'слэб', 'сосна', 'green');
$id5 = new Table('дерево', 'овальная', 'сосна', 'orange');
$id6 = new Table('дерево', 'слэб', 'Ясень', 'lightblue');
//Экземпляры класса собираем в массив объектов
$tables = [$id1, $id2, $id3, $id4, $id5, $id6];
$value = [];

//Устанавливаем вывод страницы и дефолтной страницы
if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page =1;
}
//Вывод страницы 1
switch ($page) {
	case '1':
		for($i=0; $i < count($tables); $i++){
			if($tables[$i]->material === 'дерево' && $tables[$i]->breed === 'Ясень'){
				array_push($value, $tables[$i]);
			}
		}
		break;
//Вывод страницы 2
	case '2':
		for($i=0; $i < count($tables); $i++){
			if($tables[$i]->material === 'дерево' && ($tables[$i]->form === 'слэб' || $tables[$i]->form === 'круглая')){
				array_push($value, $tables[$i]);
			}
		}
		break;
//Вывод страницы 3 а так же её содержимого в зависимсоти от входных парамметров (запросов пользователя)
	case '3':
		if(isset($_GET['material']) && !isset($_GET['form']) && !isset($_GET['breed'])){
			$material = $_GET['material'];
			for($i=0; $i < count($tables); $i++){
					if($tables[$i]->material === $material){
					array_push($value, $tables[$i]);
					}
				}

		}else if(!isset($_GET['material']) && isset($_GET['form']) && !isset($_GET['breed'])){
			$form = $_GET['form'];
			for($i=0; $i < count($tables); $i++){
					if($tables[$i]->form === $form){
					array_push($value, $tables[$i]);
					}
				}
		}else if(!isset($_GET['material']) && !isset($_GET['form']) && isset($_GET['breed'])){
			$breed = $_GET['breed'];
			for($i=0; $i < count($tables); $i++){
					if($tables[$i]->breed === $breed){
					array_push($value, $tables[$i]);
					}
				}
		}else if(isset($_GET['material']) && isset($_GET['form']) && isset($_GET['breed'])){
			$material = $_GET['material'];
			$breed = $_GET['breed'];
			$form = $_GET['form'];
			for($i=0; $i < count($tables); $i++){
					if($tables[$i]->breed === $breed && $tables[$i]->material === $material && $tables[$i]->form === $form){
					array_push($value, $tables[$i]);
					}
				}
		}else if(isset($_GET['material']) && !isset($_GET['form']) && isset($_GET['breed'])){
			$material = $_GET['material'];
			$breed = $_GET['breed'];
			for($i=0; $i < count($tables); $i++){
					if($tables[$i]->breed === $breed && $tables[$i]->material === $material){
					array_push($value, $tables[$i]);
					}
				}
		}else if(!isset($_GET['material']) && isset($_GET['form']) && isset($_GET['breed'])){
			$breed = $_GET['breed'];
			$form = $_GET['form'];
			for($i=0; $i < count($tables); $i++){
					if($tables[$i]->breed === $breed && $tables[$i]->form === $form){
					array_push($value, $tables[$i]);
					}
				}
		}else if(isset($_GET['material']) && isset($_GET['form']) && !isset($_GET['breed'])){
			$material = $_GET['material'];
			$form = $_GET['form'];
			for($i=0; $i < count($tables); $i++){
					if($tables[$i]->material === $material && $tables[$i]->form === $form){
					array_push($value, $tables[$i]);
					}
				}
		}else{
			$value = $tables;
		}
		break;
		
			
	default:
		$value = null;
		break;
}

 ?>