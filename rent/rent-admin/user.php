<?php
require('config.php');
class Employee extends Dbconfig {
    protected $hostName;
    protected $userName;
    protected $password;
    protected $dbName;
    private $empTable = 'login';
    private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){
            $database = new dbConfig();
            $this -> hostName = $database -> serverName;
            $this -> userName = $database -> userName;
            $this -> password = $database ->password;
            $this -> dbName = $database -> dbName;
            $conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else{
                $this->dbConnect = $conn;
            }
        }
    }
    private function getData($sqlQuery) {
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        if(!$result){
            die('Error in query: '. mysqli_error());
        }
        $data= array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[]=$row;
        }
        return $data;
    }
    private function getNumRows($sqlQuery) {
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        if(!$result){
            die('Error in query: '. mysqli_error());
        }
        $numRows = mysqli_num_rows($result);
        return $numRows;
    }
    public function employeeList(){
        $sqlQuery = "SELECT * FROM ".$this->empTable." ";
        if(!empty($_POST["search"]["value"])){
            $sqlQuery .= 'where(username LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= 'where(password LIKE "%'.$_POST["search"]["value"].'%" ';
            $sqlQuery .= ' OR role LIKE "%'.$_POST["search"]["value"].'%") ';
       
        }
        if(!empty($_POST["order"])){
            $sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        } else {
            $sqlQuery .= 'ORDER BY id DESC ';
        }
        if($_POST["length"] != -1){
            $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        
        $sqlQuery1 = "SELECT * FROM ".$this->empTable." ";
        $result1 = mysqli_query($this->dbConnect, $sqlQuery1);
        $numRows = mysqli_num_rows($result1);
        
        $employeeData = array();
        while( $employee = mysqli_fetch_assoc($result) ) {
            $empRows = array();
            $empRows[] = ucfirst($employee['username']);
            $empRows[] = ucfirst($employee['password']);
            $empRows[] = ucfirst($employee['role']);
            $empRows[] = '<button type="button" name="update" id="'.$employee["id"].'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button> <button type="button" name="delete" id="'.$employee["id"].'" class="btn btn-danger btn-xs delete" ><i class="fa fa-trash"></i></button>';
            $employeeData[] = $empRows;
        }
        $output = array(
            "draw"				=>	intval($_POST["draw"]),
            "recordsTotal"  	=>  $numRows,
            "recordsFiltered" 	=> 	$numRows,
            "data"    			=> 	$employeeData
        );
        echo json_encode($output);
    }
    public function getEmployee(){
        if($_POST["empId"]) {
            $sqlQuery = "
				SELECT * FROM ".$this->empTable."
				WHERE id = '".$_POST["empId"]."'";
            $result = mysqli_query($this->dbConnect, $sqlQuery);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            echo json_encode($row);
        }
    }
    public function updateEmployee(){
        if($_POST['empId']) {
            $updateQuery = "UPDATE ".$this->empTable."
			SET username = '".$_POST["username"]."',password = '".$_POST["password"]."',role = '".$_POST["role"]."'
			WHERE id ='".$_POST["empId"]."'";
            
            
            
            $isUpdated = mysqli_query($this->dbConnect, $updateQuery);
        }
    }
    public function addEmployee(){
        $insertQuery = "INSERT INTO ".$this->empTable." (username,password,role)
			VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["role"]."')";
        $isUpdated = mysqli_query($this->dbConnect, $insertQuery);
    }
    public function deleteEmployee(){
        if($_POST["empId"]) {
            $sqlDelete = "
				DELETE FROM ".$this->empTable."
				WHERE id = '".$_POST["empId"]."'";
            mysqli_query($this->dbConnect, $sqlDelete);
        }
    }
}
?>