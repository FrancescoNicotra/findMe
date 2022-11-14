<?php
require_once 'class.php';
require_once 'session.php';
$dataprelievo=date("Y-m-d H:i:s", time());
//die("LAPAZZA5");
if(isset($_REQUEST)) {
    $db = new db_class();
    //die("LAPAZZA".$dataprelievo);
    $nomeOggetto = $_REQUEST['nome_oggetto'];

    $id_persona = $_SESSION['id_persona'];
    $id_oggetti = $db->getIdObj($id_persona,$nomeOggetto);
    $num_rows = $id_oggetti->num_rows;
    $id_oggetto = $id_oggetti->fetch_array();
    //die("LAPAZZA <pre>".print_r($id_oggetto,1)."</pre>");
//    $dataPrelievo = $_REQUEST['data_prelievo'];
    if ($num_rows >= 1) {
        $elimina = $db->getObject($id_oggetto['id_oggetto'],$dataprelievo,$id_persona);
        //die("LAPAZZA17<pre>".print_r($elimina,1)."</pre>");
        $dataObject = [
            'id_oggetto'=> $id_oggetto,
            //'data_prelievo'=>$dataprelievo
        ];

        echo 1;
        //echo $dataJSONObject = json_encode($dataObject);
        //exit;
    }
}