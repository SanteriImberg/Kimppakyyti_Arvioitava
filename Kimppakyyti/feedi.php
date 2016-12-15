<?php

require_once("../Kimppakyyti/config/config.php");

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST['query'])) {
    $datat["siti"] = $_REQUEST['query'].'%';
    $datat["zippi"] = $_REQUEST['query'].'%';
    // print_r($datat);
    $haku = $DBH->prepare("SELECT laani, kunta FROM kunnat WHERE laani LIKE :siti  OR kunta LIKE :zippi");
    $haku->execute($datat);
    $array = array();
    $row = $haku->fetch();
    //print_r($row);
    while ($row = $haku->fetch()) {
        //print_r($row);
        $array[] = array (
            'label' => $row['kunta'].', '.$row['laani'],
            'value' => $row['kunta'].', '.$row['laani']
        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array); 
}

?>