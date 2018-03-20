<?php
namespace Ajax;
use \PDO;


class Userss
{
    
	private $conn;
    private $tableName = "tesadasdsdast";
 
	
 
   
  test2= drugi commit

    public function __construct()
    {
       $database = new \Config\Database();
	   $this->conn = $database->getConnection();
	   
    }

	public function read()
	{
        //select all data
        $query = "SELECT
                   id, nazwisko,imie,telefon,adres
                FROM
                    " . $this->tableName . "
				ORDER BY 
					id desc
                ";  
 
        $data = $this->conn->prepare( $query );
        $data->execute();

		$result=$data->fetchAll(PDO::FETCH_ASSOC);
		

		$table=array();
		$i=0;
	
		
		foreach($result as $row)
		{
		$table[$i]['id']= $row['id'];	
		$table[$i]['Nazwisko']= $row['nazwisko'];	
		$table[$i]['Imię']= $row['imie'];	
		$table[$i]['Telefon']= $row['telefon'];	
		$table[$i]['Adres']= $row['adres'];	
		$table[$i]['Akcje']= '<button  data-surname="'.$row['nazwisko'].'" data-name="'.$row['imie'].'"  data-phone="'.$row['telefon'].'" data-address="'.$row['adres'].'" data-id="'.$row['id'].'" data-target="modal_edit"  class="edit btn waves-effect waves-light orange lighten-1" >Edytuj
								<i class="material-icons right">edit</i>
							  </button>
							  <button data-id="'.$row['id'].'" data-target="modal_delete"   class="delete btn waves-effect waves-light red darken-3" >Usuń
								<i class="material-icons right">delete</i>
							  </button>
							  ';	
		
		
		
		$i++;
		
		}
	
	echo json_encode($table);
	
	
	}
	
	
	
	
	
	
	public function insert($post)
	{
		
	$post=array('name' => $post['name'],
				'surname' => $post['surname'],
				'address' => $post['address'],
				'phone' => $post['phone']);
		
		$query = "INSERT INTO
		
                    " . $this->tableName . "
                
                    (nazwisko,imie,adres,telefon) VALUES (:surname,:name,:address,:phone)";
 
        $data = $this->conn->prepare($query);
 
	   // bind values 
        $data->bindParam(":name", $post['name']);
        $data->bindParam(":surname", $post['surname']);
        $data->bindParam(":address", $post['address']);
        $data->bindParam(":phone", $post['phone']);
       
 
        if($data->execute()){
			$array[]='success';
           echo json_encode($array);
        }else{
			$array[]='failure';
            echo json_encode($array);
        }
		
		
		
		
		
		
	}
	
	
	
	public function edit($post)
	{
		$post=array('id'=>$post['id'],
			'name' => $post['name'],
			'surname' => $post['surname'],
			'address' => $post['address'],
			'phone' => $post['phone']);
	
		
		$query = "UPDATE 
		
                    " . $this->tableName . "
                
                    SET nazwisko=:surname,imie=:name,adres=:address,telefon=:phone
					WHERE id=:id";
 
        $data = $this->conn->prepare($query);

	   // bind values 
        $data->bindParam(":name", $post['name']);
        $data->bindParam(":surname", $post['surname']);   
	    $data->bindParam(":address", $post['address']); 
        $data->bindParam(":phone", $post['phone']);
        $data->bindParam(":id", $post['id']);
        
 
        if($data->execute()){
			$array[]='success';
           
        }else{
			$array[]='failure';
          
        }
		echo json_encode($array);
		
		
		
		
		
	}
	
	
	public function delete_row($post)
	{
		$post=array('id'=>$post['id']);
	
		
		$query = "delete FROM
		
                    " . $this->tableName . "

					WHERE id=:id";
 
        $data = $this->conn->prepare($query);

	   // bind values 
	   
        $data->bindParam(":id", $post['id']);
        
 
        if($data->execute()){
			$array[]='success';
           
        }else{
			$array[]='failure';
          
        }
		echo json_encode($array);
		
		
		
		
		
	}
	
	
	
	
	
	

}



	
	
	
?>