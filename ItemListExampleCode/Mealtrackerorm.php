<?php

class Mealtracker
{
	private $id;
	private $meal;
	private $item;
	private $calories;
	private $carbs;
	private $protein;
	private $fat;
	
	public static function connect() {
		return new mysqli("classroom.cs.unc.edu", 
						"nbasem", 
						"CH@ngemenow99Please!nbasem", 
						"nbasemdb");
	}
	
	public static function create($meal, $item, $calories, $carbs, $protein, $fat){
		$mysqli = Mealtracker::connect();
		$result = $mysqli->query("insert into Tracker values (0, " .
			     "'" . $mysqli->real_escape_string($meal) . "', " .
			     "'" . $mysqli->real_escape_string($item) . "', " .
			     "'" . $mysqli->real_escape_string($calories) . "', " .
			     $mysqli->real_escape_string($carbs) . ", " .
			     $mysqli->real_escape_string($protein) . ", " .
			     $mysqli->real_escape_string($fat) . ", NOW())");
		if($result){
			$id = $mysqli->insert_id;
			return new Mealtracker($id, $meal, $item, $calories, $carbs, $protein, $fat);
		}
		return null;
	}
	
	public function getSums(){
		$mysqli = Mealtracker::connect();
		$result = $mysqli->query("select sum(calories) as calories, sum(carbs) as carbs, sum(protein) as protein, sum(fat) as fat from Tracker where time > date(curdate())");
		return $result;
		
	}
	
	public function getJSON() {
		
		$json_obj = array('id' => $this->id,
				  'meal' => $this->meal,
				  'item' => $this->item,
				  'calories' => $this->calories,
				  'carbs' => $this->carbs,
				  'protein' => $this->protein,
				  'fat' => $this->fat);
		return json_encode($json_obj);
	}	
}
?>