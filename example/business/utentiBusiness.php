<?php
        
        //DAO della tavola "utenti" generato con PHP-TABLE-GEN di Riccardo Riggi versione 0.0.1



	function selectUtentiByWhere($conn,$id,$nome,$cognome,$data_nascita,$comune_nascita,$isDiplomato,$isLaureato){

		$sql = " SELECT id,nome,cognome,data_nascita,comune_nascita,isDiplomato,isLaureato FROM utenti WHERE 1 = 1 ";

		if($id!=null)
			$sql = $sql . "AND id = ".mysqli_real_escape_string($conn,$id);
		if($nome!=null)
			$sql = $sql . "AND nome = ".mysqli_real_escape_string($conn,$nome);
		if($cognome!=null)
			$sql = $sql . "AND cognome = ".mysqli_real_escape_string($conn,$cognome);
		if($data_nascita!=null)
			$sql = $sql . "AND data_nascita = ".mysqli_real_escape_string($conn,$data_nascita);
		if($comune_nascita!=null)
			$sql = $sql . "AND comune_nascita = ".mysqli_real_escape_string($conn,$comune_nascita);
		if($isDiplomato!=null)
			$sql = $sql . "AND isDiplomato = ".mysqli_real_escape_string($conn,$isDiplomato);
		if($isLaureato!=null)
			$sql = $sql . "AND isLaureato = ".mysqli_real_escape_string($conn,$isLaureato);

		generaLog($sql);

		$result = $conn->query($sql);
		chiudiConnessione($conn);

		return $result;

	}



	function selectUtentiByKey($conn,$id){

		$sql = " SELECT id,nome,cognome,data_nascita,comune_nascita,isDiplomato,isLaureato FROM utenti WHERE 1 = 1 ";

		if($id!=null)
			$sql = $sql . "AND id = ".mysqli_real_escape_string($conn,$id);

		generaLog($sql);

		$result = $conn->query($sql);
		chiudiConnessione($conn);

		return $result;

	}



	function updateUtentiByKey($conn,$id,$nome,$cognome,$data_nascita,$comune_nascita,$isDiplomato,$isLaureato){

		$sql = " UPDATE utenti SET ";

		if($nome!=null)
			$sql = $sql . "nome = '".mysqli_real_escape_string($conn,$nome)."'";
		if($cognome!=null)
			$sql = $sql . "cognome = '".mysqli_real_escape_string($conn,$cognome)."'";
		if($data_nascita!=null)
			$sql = $sql . "data_nascita = '".mysqli_real_escape_string($conn,$data_nascita)."'";
		if($comune_nascita!=null)
			$sql = $sql . "comune_nascita = '".mysqli_real_escape_string($conn,$comune_nascita)."'";
		if($isDiplomato!=null)
			$sql = $sql . "isDiplomato = ".mysqli_real_escape_string($conn,$isDiplomato);
		if($isLaureato!=null)
			$sql = $sql . "isLaureato = ".mysqli_real_escape_string($conn,$isLaureato);

		$sql = $sql . " WHERE 1 = 1 AND ";

		
		if($id!=null)
			$sql = $sql . "AND id = ".mysqli_real_escape_string($conn,$id);

		generaLog($sql);

		$result = $conn->query($sql);
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
			$sql = $sql ."'".mysqli_real_escape_string($conn,$nome)."'".",";
		if($cognome!=null)
			$sql = $sql ."'".mysqli_real_escape_string($conn,$cognome)."'".",";
		if($data_nascita!=null)
			$sql = $sql ."'".mysqli_real_escape_string($conn,$data_nascita)."'".",";
		if($comune_nascita!=null)
			$sql = $sql ."'".mysqli_real_escape_string($conn,$comune_nascita)."'".",";
		if($isDiplomato!=null)
			$sql = $sql .mysqli_real_escape_string($conn,$isDiplomato).",";
		if($isLaureato!=null)
			$sql = $sql .mysqli_real_escape_string($conn,$isLaureato);

		$sql = $sql . " ) ";

		generaLog($sql);

		$result = $conn->query($sql);
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
			$sql = $sql .mysqli_real_escape_string($conn,$id).",";
		if($nome!=null)
			$sql = $sql ."'".mysqli_real_escape_string($conn,$nome)."'".",";
		if($cognome!=null)
			$sql = $sql ."'".mysqli_real_escape_string($conn,$cognome)."'".",";
		if($data_nascita!=null)
			$sql = $sql ."'".mysqli_real_escape_string($conn,$data_nascita)."'".",";
		if($comune_nascita!=null)
			$sql = $sql ."'".mysqli_real_escape_string($conn,$comune_nascita)."'".",";
		if($isDiplomato!=null)
			$sql = $sql .mysqli_real_escape_string($conn,$isDiplomato).",";
		if($isLaureato!=null)
			$sql = $sql .mysqli_real_escape_string($conn,$isLaureato);

		$sql = $sql . " ) ";

		generaLog($sql);

		$result = $conn->query($sql);
		chiudiConnessione($conn);

		return $result;

	}



	function deleteUtentiByWhere($conn,$id,$nome,$cognome,$data_nascita,$comune_nascita,$isDiplomato,$isLaureato){

		$sql = " DELETE FROM utenti ";

		$sql = $sql. " WHERE 1 = 1 ";

		
		if($id!=null)
			$sql = $sql . "AND id = ".mysqli_real_escape_string($conn,$id);
		if($nome!=null)
			$sql = $sql . "AND nome = ".mysqli_real_escape_string($conn,$nome);
		if($cognome!=null)
			$sql = $sql . "AND cognome = ".mysqli_real_escape_string($conn,$cognome);
		if($data_nascita!=null)
			$sql = $sql . "AND data_nascita = ".mysqli_real_escape_string($conn,$data_nascita);
		if($comune_nascita!=null)
			$sql = $sql . "AND comune_nascita = ".mysqli_real_escape_string($conn,$comune_nascita);
		if($isDiplomato!=null)
			$sql = $sql . "AND isDiplomato = ".mysqli_real_escape_string($conn,$isDiplomato);
		if($isLaureato!=null)
			$sql = $sql . "AND isLaureato = ".mysqli_real_escape_string($conn,$isLaureato);

		generaLog($sql);

		$result = $conn->query($sql);
		chiudiConnessione($conn);

		return $result;

	}



	function deleteUtentiByKey($conn,$id){

		$sql = " DELETE FROM utenti ";

		$sql = $sql. " WHERE 1 = 1 ";

		
		if($id!=null)
			$sql = $sql . "AND id = ".mysqli_real_escape_string($conn,$id);

		generaLog($sql);

		$result = $conn->query($sql);
		chiudiConnessione($conn);

		return $result;

	}



?>