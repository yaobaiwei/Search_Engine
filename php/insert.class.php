<?PHP
require_once("config.php");
class insert{
    	private $mysqli;
        private $id;
        private $time;
    	private $addr;
    	private $message;         
    	private $title;                
    	// 构造函数
	function __construct(){
		$this->mysqli = new mysqli($GLOBALS['address'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['schema']);
                $this->mysqli->query("set names utf8");
		if($this->mysqli->connect_errno){
			echo "Connect failed:%s\n".mysqli_connect_error();
			exit();
		}
	}
	// 析构函数
	function __destruct(){
		if($this->mysqli){
			$this->mysqli->close();
		 }
  }
  	function insertall($id,$title,$addr,$message,$time){
		$sql = "INSERT INTO search (pid,addr,subject,message,chrono) VALUES (?, ?, ?, ?, ?)";
		$stmt = $this->mysqli->prepare($sql);
		$stmt->bind_param("isssi",$id,$addr,$title,$message,$time);
		$stmt->execute();
		$stmt->close();
		return true;
}
	function __get($property){
		if(isset($this->$property)){
			return $this->$property;
		} else {
			return NULL;
		}
	}
		
	function __set($property, $value){
		$this->$property = $value;
	}
   }
?>
