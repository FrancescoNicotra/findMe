<?php
require_once 'class.php';
require_once 'session.php';
if(isset($_REQUEST)){

    $db = new db_class();
    $id_persona = $_SESSION['id_persona'];
    $oggettoCercato = $_REQUEST["nome_oggetto_cercato"];
    $nomeOggetto = $_REQUEST["nome_oggetto"];
    $data_deposito = $_REQUEST["data_deposito"];
    $mobile = $_REQUEST["mobile"];
    $id_mobile = $db->show_id_mobile($mobile,$id_persona);
    if($id_mobile['count']<1){
        $id_mobile = $db->add_mobile($mobile,$id_persona);
    }

    //die("LAPAZZA <pre>".print_r($id_persona,1)."</pre><pre>".print_r($oggettoCercato,1)."</pre><pre>".print_r($nomeOggetto,1)."</pre><pre>".print_r($data_deposito,1)."</pre><pre>".print_r($mobile,1)."</pre>");
    //$id_mobile = $db->show_id_mobile($mobile,$id_persona);
    $db->updateObj($nomeOggetto,$oggettoCercato,$data_deposito,$id_persona,$id_mobile['id_mobile']);
    $updatedObj = [
        'nome_oggetto_cercato'=>$oggettoCercato,
        'nome_oggetto'=>$nomeOggetto,
        'data_deposito'=>$data_deposito,
        'mobile'=>$mobile
    ];
    echo $updateJSONdObj = json_encode($updatedObj);
}