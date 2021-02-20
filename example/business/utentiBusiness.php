<?php
        
    //DAO della tavola "utenti" generato con PHP-TABLE-GEN di Riccardo Riggi versione 0.0.2



	function selectUtentiByWhere($conn,$id,$nome,$cognome,$data_nascita,$comune_nascita,$isDiplomato,$isLaureato){

		$sql = " SELECT id,nome,cognome,data_nascita,comune_nascita,isDiplomato,isLaureato FROM utenti WHERE 1 = 1 ";

		if($id!=null)
			$sql = $sql . "AND id = :id ";
		if($nome!=null)
			$sql = $sql . "AND nome = :nome ";
		if($cognome!=null)
			$sql = $sql . "AND cognome = :cognome ";
		if($data_nascita!=null)
			$sql = $sql . "AND data_nascita = :data_nascita ";
		if($comune_nascita!=null)
			$sql = $sql . "AND comune_nascita = :comune_nascita ";
		if($isDiplomato!=null)
			$sql = $sql . "AND isDiplomato = :isDiplomato ";
		if($isLaureato!=null)
			$sql = $sql . "AND isLaureato = :isLaureato ";

		$query = $conn->prepare($sql);

		if($id!=null)
			$query -> bindParam(':id',$id);
		if($nome!=null)
			$query -> bindParam(':nome',$nome);
		if($cognome!=null)
			$query -> bindParam(':cognome',$cognome);
		if($data_nascita!=null)
			$query -> bindParam(':data_nascita',$data_nascita);
		if($comune_nascita!=null)
			$query -> bindParam(':comune_nascita',$comune_nascita);
		if($isDiplomato!=null)
			$query -> bindParam(':isDiplomato',$isDiplomato);
		if($isLaureato!=null)
			$query -> bindParam(':isLaureato',$isLaureato);

		generaLog($sql);

		$query->execute();

		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		chiudiConnessione($conn);

		return $result;

	}



	function selectUtentiByKey($conn,$id){

		$sql = " SELECT id,nome,cognome,data_nascita,comune_nascita,isDiplomato,isLaureato FROM utenti WHERE 1 = 1 ";

		if($id!=null)
			$sql = $sql . "AND id = :id ";

		$query = $conn->prepare($sql);

		if($id!=null)
			$query -> bindParam(':id',$id);

		generaLog($sql);

		$query->execute();

		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		chiudiConnessione($conn);

		return $result;

	}



	function updateUtentiByKey($conn,$id,$nome,$cognome,$data_nascita,$comune_nascita,$isDiplomato,$isLaureato){

		$sql = " UPDATE utenti SET ";

		if($nome!=null)
			$sql = $sql . "nome = :nome,";
		if($cognome!=null)
			$sql = $sql . "cognome = :cognome,";
		if($data_nascita!=null)
			$sql = $sql . "data_nascita = :data_nascita,";
		if($comune_nascita!=null)
			$sql = $sql . "comune_nascita = :comune_nascita,";
		if($isDiplomato!=null)
			$sql = $sql . "isDiplomato = :isDiplomato,";
		if($isLaureato!=null)
			$sql = $sql . "isLaureato = :isLaureato";

		$sql = $sql . " WHERE 1 = 1 ";

		
		if($id!=null)
			$sql = $sql . "AND id = :id ";;

		$query = $conn->prepare($sql);

		if($nome!=null)
			$query -> bindParam(':nome',$nome);
		if($cognome!=null)
			$query -> bindParam(':cognome',$cognome);
		if($data_nascita!=null)
			$query -> bindParam(':data_nascita',$data_nascita);
		if($comune_nascita!=null)
			$query -> bindParam(':comune_nascita',$comune_nascita);
		if($isDiplomato!=null)
			$query -> bindParam(':isDiplomato',$isDiplomato);
		if($isLaureato!=null)
			$query -> bindParam(':isLaureato',$isLaureato);


		if($id!=null)
			$query -> bindParam(':id',$id);

		generaLog($sql);

		$query->execute();

		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		chiudiConnessione($conn);

		return $result;

	}



	function insertUtentiWithAutoIncrement($conn,$nome,$cognome,$data_nascita,$comune_nascita,$isDiplomato,$isLaureato){

		$sql = " INSERT INTO utenti( ";

		if($nome!=null)
			$sql = $sql . "nome,";
		if($cognome!=null)
			$sql = $sql . "cognome,";
		if($data_nascita!=null)
			$sql = $sql . "data_nascita,";
		if($comune_nascita!=null)
			$sql = $sql . "comune_nascita,";
		if($isDiplomato!=null)
			$sql = $sql . "isDiplomato,";
		if($isLaureato!=null)
			$sql = $sql . "isLaureato";

		$sql = $sql . " ) VALUES ( ";
		if($nome!=null)
			$sql = $sql ." :nome,";
		if($cognome!=null)
			$sql = $sql ." :cognome,";
		if($data_nascita!=null)
			$sql = $sql ." :data_nascita,";
		if($comune_nascita!=null)
			$sql = $sql ." :comune_nascita,";
		if($isDiplomato!=null)
			$sql = $sql ." :isDiplomato,";
		if($isLaureato!=null)
			$sql = $sql ." :isLaureato";

		$sql = $sql . " ) ";

		

		$query = $conn->prepare($sql);

		if($nome!=null)
			$query -> bindParam(':nome',$nome);
		if($cognome!=null)
			$query -> bindParam(':cognome',$cognome);
		if($data_nascita!=null)
			$query -> bindParam(':data_nascita',$data_nascita);
		if($comune_nascita!=null)
			$query -> bindParam(':comune_nascita',$comune_nascita);
		if($isDiplomato!=null)
			$query -> bindParam(':isDiplomato',$isDiplomato);
		if($isLaureato!=null)
			$query -> bindParam(':isLaureato',$isLaureato);

		generaLog($sql);

		$query->execute();

		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		chiudiConnessione($conn);

		return $result;

	}



	function insertUtentiWithKey($conn,$id,$nome,$cognome,$data_nascita,$comune_nascita,$isDiplomato,$isLaureato){

		$sql = " INSERT INTO utenti( ";

		if($id!=null)
			$sql = $sql . "id,";
		if($nome!=null)
			$sql = $sql . "nome,";
		if($cognome!=null)
			$sql = $sql . "cognome,";
		if($data_nascita!=null)
			$sql = $sql . "data_nascita,";
		if($comune_nascita!=null)
			$sql = $sql . "comune_nascita,";
		if($isDiplomato!=null)
			$sql = $sql . "isDiplomato,";
		if($isLaureato!=null)
			$sql = $sql . "isLaureato";

		$sql = $sql . " ) VALUES ( ";
		if($id!=null)
			$sql = $sql ." :id,";
		if($nome!=null)
			$sql = $sql ." :nome,";
		if($cognome!=null)
			$sql = $sql ." :cognome,";
		if($data_nascita!=null)
			$sql = $sql ." :data_nascita,";
		if($comune_nascita!=null)
			$sql = $sql ." :comune_nascita,";
		if($isDiplomato!=null)
			$sql = $sql ." :isDiplomato,";
		if($isLaureato!=null)
			$sql = $sql ." :isLaureato";

		$sql = $sql . " ) ";

		

		$query = $conn->prepare($sql);

		if($id!=null)
			$query -> bindParam(':id',$id);
		if($nome!=null)
			$query -> bindParam(':nome',$nome);
		if($cognome!=null)
			$query -> bindParam(':cognome',$cognome);
		if($data_nascita!=null)
			$query -> bindParam(':data_nascita',$data_nascita);
		if($comune_nascita!=null)
			$query -> bindParam(':comune_nascita',$comune_nascita);
		if($isDiplomato!=null)
			$query -> bindParam(':isDiplomato',$isDiplomato);
		if($isLaureato!=null)
			$query -> bindParam(':isLaureato',$isLaureato);

		generaLog($sql);

		$query->execute();

		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		chiudiConnessione($conn);

		return $result;

	}



	function deleteUtentiByWhere($conn,$id,$nome,$cognome,$data_nascita,$comune_nascita,$isDiplomato,$isLaureato){

		$sql = " DELETE FROM utenti ";

		$sql = $sql. " WHERE 1 = 1 ";

		
		if($id!=null)
			$sql = $sql . "AND id = :id ";
		if($nome!=null)
			$sql = $sql . "AND nome = :nome ";
		if($cognome!=null)
			$sql = $sql . "AND cognome = :cognome ";
		if($data_nascita!=null)
			$sql = $sql . "AND data_nascita = :data_nascita ";
		if($comune_nascita!=null)
			$sql = $sql . "AND comune_nascita = :comune_nascita ";
		if($isDiplomato!=null)
			$sql = $sql . "AND isDiplomato = :isDiplomato ";
		if($isLaureato!=null)
			$sql = $sql . "AND isLaureato = :isLaureato ";

		$query = $conn->prepare($sql);

		if($id!=null)
			$query -> bindParam(':id',$id);
		if($nome!=null)
			$query -> bindParam(':nome',$nome);
		if($cognome!=null)
			$query -> bindParam(':cognome',$cognome);
		if($data_nascita!=null)
			$query -> bindParam(':data_nascita',$data_nascita);
		if($comune_nascita!=null)
			$query -> bindParam(':comune_nascita',$comune_nascita);
		if($isDiplomato!=null)
			$query -> bindParam(':isDiplomato',$isDiplomato);
		if($isLaureato!=null)
			$query -> bindParam(':isLaureato',$isLaureato);

		generaLog($sql);

		$query->execute();

		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		chiudiConnessione($conn);

		return $result;

	}



	function deleteUtentiByKey($conn,$id){

		$sql = " DELETE FROM utenti ";

		$sql = $sql. " WHERE 1 = 1 ";

		
		if($id!=null)
			$sql = $sql . "AND id = :id ";

		$query = $conn->prepare($sql);

		if($id!=null)
			$query -> bindParam(':id',$id);

		generaLog($sql);

		$query->execute();

		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		chiudiConnessione($conn);

		return $result;

	}



?>