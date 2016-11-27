<?php  
	$query = "Select * from quote";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die("There is an error!");
    } 

        $myarray = array();
        while($all_quotes = mysqli_fetch_assoc($result)){
            $res = $all_quotes['content'];
            $myarray[] = $res;  
        }  
?>