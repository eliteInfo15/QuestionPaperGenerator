<?php 
require '../Model/UnitModel.php';
class UnitController{
public function addUnit($course_id,$semester,$subject_id,$units_array)
	{
		$unit_model=new UnitModel();
		$unit_model->setUnitName($units_array);
		$unit_model->addUnitToDb($course_id,$semester,$subject_id);
	}
	public function getUnit($subject_id)
	{
		$unit_model=new UnitModel();
		
		$unit_data=$unit_model->getUnitFromDb($subject_id);
		return $unit_data;
	}

     public function removeUnit($unit_id)
{
    $unit_model=new UnitModel();
    $unit_model->removeUnit($unit_id);
}

}
if (isset($_POST["delete-unit"])) {
   $unit_id=$_POST["remove_unit_id"];
    $unit=new UnitController();
   $unit->removeUnit($unit_id);
    header('location:../View/ManageUnit.php');
}
if (isset($_POST['viewunit'])) {
        $subject_id=$_POST["subject_id"];
      
        $unit_controller= new UnitController();
        $unit_data=$unit_controller->getUnit($subject_id);
        echo json_encode($unit_data);
} 
if (isset($_POST["addunit"])) {
	$course_id=$_POST["course_field"];
     $semester=$_POST["semester_field"];
     $no_of_unit=$_POST["no_of_unit"];
    $subject_id= $_POST["subject_field"];
     $units_array = array( );
     for ($i=1; $i <=$no_of_unit ; $i++) { 
        array_push($units_array, $_POST["unit".$i]);
     }
    $unit_controller= new UnitController();
    $unit_controller->addUnit($course_id,$semester,$subject_id,$units_array);
    header('location:../View/ManageUnit.php');
} 

 ?>