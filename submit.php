<?php 
	require "connect.php";
	if(isset($_POST['ldap']) && isset($_POST['hostel']) && isset($_POST['amount'])&&isset($_POST['agreeToConditon'])){
		$ldap = $_POST['ldap'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$hostel = $_POST['hostel'];
		$amount = $_POST['amount'];
		$conditionAccepted = $_POST['agreeToConditon'] === '1'? 1: 0;
		try{
			$studentQuery = "SELECT * from covid19 where ldap=:ldap";
			$studentStmt =  $conn->prepare($studentQuery);
			$studentStmt->execute(array("ldap"=>$ldap));
			$results = $studentStmt->fetchAll(PDO::FETCH_ASSOC);
			if(count($results)!=0){
				// echo json_encode($results);
				$stmt1 = "UPDATE covid19 SET amount=:amount, hostel=:hostel,conditionAccepted=:conditionAccepted WHERE ldap=:ldap";
				$stmt =  $conn->prepare($stmt1);
				$stmt->bindParam(':ldap', $ldap, PDO::PARAM_STR, 1000);
				$stmt->bindParam(':hostel', $hostel, PDO::PARAM_STR, 10);
				$stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
				$stmt->bindParam(':conditionAccepted', $conditionAccepted, PDO::PARAM_BOOL);
				$stmt->execute();
			}else{
					// echo json_encode(array("error"=>"No student found with that ldap"));
				$stmt1 = "INSERT into covid19 (ldap,hostel,amount,first_name,last_name,conditionAccepted) VALUES (:ldap,:hostel,:amount,:first_name,:last_name,:conditionAccepted)";
				$stmt =  $conn->prepare($stmt1);
				$stmt->bindParam(':ldap', $ldap, PDO::PARAM_STR, 1000);
				$stmt->bindParam(':hostel', $hostel, PDO::PARAM_STR, 10);
				$stmt->bindParam(':amount', $amount, PDO::PARAM_INT);
				$stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR, 1000);
				$stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR, 1000);
				$stmt->bindParam(':conditionAccepted', $conditionAccepted, PDO::PARAM_BOOL);
				$stmt->execute();
			}
		}catch(PDOException $e){
			 echo json_encode(array("error"=>$e->getMessage()));
		}

	}
	function get_ldap_amount($ldap_id){
		require "connect.php";
		try{
			$studentQuery = "SELECT * from covid19 where ldap=:ldap";
			$studentStmt =  $conn->prepare($studentQuery);
			$studentStmt->execute(array("ldap"=>$ldap_id));
			$results = $studentStmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			 echo json_encode(array("error"=>$e->getMessage()));
		}
		return $results;
	}
 ?>
