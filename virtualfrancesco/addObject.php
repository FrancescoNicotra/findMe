<?php
date_default_timezone_set('Europe/Rome');
require_once'class.php';
require_once'session.php';
if(isset($_REQUEST)){
    $id = $_SESSION['id_persona'];
    $dataDeposito=date("Y-m-d H:i:s", time());
    $db = new db_class();
    $stringa = $_REQUEST['nome_oggetto'];
    $stringa = $db->parole_escluse($stringa);
    if(isset($_REQUEST['data_deposito']) && $_REQUEST['data_deposito']!==''){
        $data_deposito = $_REQUEST['data_deposito'];
    } else $data_deposito = $dataDeposito;
    //die($data_deposito);
    //die("LAPAZZA25".$_REQUEST['mobile']);
    if(isset($_REQUEST['mobile']) && $_REQUEST['mobile']!==''){
        $mobile = $_REQUEST['mobile'];

        $db->add_mobile_esistente($mobile);
        $id_mobile_esistente = $db->show_id_mobile_esistente($mobile);
        $db->add_mobile($mobile,$id,$id_mobile_esistente['id_mobile']);

        //die( "ID MOBILE ESISTENTE <pre>".print_r($id_mobile_esistente,1)."</pre>");
        $id_mobile = $db->show_id_mobile($mobile,$id);
        //echo "STRINGA:".$stringa."<br>";
        //echo "STAMPA MOBILE <pre>".print_r($mobile,1)."</pre>";
        $tmp = $db->find_mobile($stringa);

        //echo "STAMPA tmp <pre>".print_r($tmp,1)."</pre>";
        $stringa = $tmp['stringa'];
        $oggetto = $db->find_obj($stringa);
        //die("STRINGA FINALE<pre>".print_r($oggetto,1)."</pre>");
        //die("LAPAZZA32 <pre>".print_r($oggetto,1)."</pre>");
        if($oggetto['nome_oggetto']=='' && $oggetto['stringa'] !== '') {
            //die("LAPAZZA32");
            $nome_oggetto = $oggetto['stringa'];
            $nome_oggetto = $db->parole_escluse($nome_oggetto);
            if($db->same_obj($nome_oggetto,$id)===true){
                //echo "LAPAZZA37";
                return false;
            }
            if($db->existenceOfObj($id,$id_mobile['id_mobile'],$nome_oggetto,$data_deposito)){
                $objectData = [
                    'nome_oggetto'=>$nome_oggetto,
                    //'data_deposito'=>$data_deposito,
                    //'mobile'=>$mobile
                ];
                echo $objectJSONData = json_encode($objectData);
                exit();
            }
            $db->add_obj_esistente($nome_oggetto);

            $db->add_object($nome_oggetto,$data_deposito,$id,$id_mobile['id_mobile']);
            $objectData = [
                'nome_oggetto'=>$nome_oggetto,
                //'data_deposito'=>$data_deposito,
                //'mobile'=>$mobile
            ];
            echo $objectJSONData = json_encode($objectData);
            exit();
        }
        //die("LAPAZZA45 <pre>".print_r($oggetto,1)."</pre>");
        if ($oggetto['nome_oggetto'] !=='' && $oggetto['stringa'] == ''){
            $nome_oggetto = $oggetto['nome_oggetto'];
            if($db->same_obj($nome_oggetto,$id)===true) return false;
            if($db->existenceOfObj($id,$id_mobile['id_mobile'],$nome_oggetto,$data_deposito)){
                $objectData = [
                    'nome_oggetto'=>$nome_oggetto,
                    //'data_deposito'=>$data_deposito,
                    //'mobile'=>$mobile
                ];
                echo $objectJSONData = json_encode($objectData);
                exit();
            }
            $db->add_obj_esistente($nome_oggetto);

            $db->add_object($nome_oggetto,$data_deposito,$id,$id_mobile['id_mobile']);
            //die("LAPAZZA45".$nome_oggetto." ".$dataDeposito." ".$mobile);
            $objectData = [
                'nome_oggetto'=>$nome_oggetto,
                //'data_deposito'=>$data_deposito,
                //'mobile'=>$mobile
            ];
            echo $objectJSONData = json_encode($objectData);
        } else die("IMPOSSIBILE AGGIUNGERE L'OGGETTO");

    } else {
        //die("LAPAZZA68");
        $arraymobile = $db->find_mobile($stringa);
        //$arrayOggetto = $db->find_obj($stringa);
       //echo "STAMPA ARRAY MOBILE <pre>".print_r($arraymobile,1)."</pre>";
        if($arraymobile['nome_mobile']==''){
            die("Mobile non trovato");
        }
        else{
            //die("LAPAZZA84");
            $id_mobile_esistente = $db->show_id_mobile_esistente($arraymobile['nome_mobile']);
            $mobile = $arraymobile['nome_mobile'];
            $db->add_mobile($mobile,$id,$id_mobile_esistente);
            $id_mobile = $db->show_id_mobile($mobile,$id);
            $arrayOggetto = $db->find_obj($arraymobile['stringa']);
            if($arrayOggetto['stringa']=='' && $arrayOggetto!== ''){

                //die("LAPAZZA94");
                $nome_oggetto = $arrayOggetto['nome_oggetto'];
                //die($nome_oggetto);
                if($db->same_obj($nome_oggetto,$id)===true){
                    //echo "LAPAZZA94";
                    return false;
                }
                if($db->existenceOfObj($id,$id_mobile['id_mobile'],$nome_oggetto,$data_deposito)){
                    $objectData = [
                        'nome_oggetto'=>$nome_oggetto,
                        //'data_deposito'=>$data_deposito,
                        //'mobile'=>$mobile
                    ];
                    echo $objectJSONData = json_encode($objectData);
                    exit();
                }
                $db->add_obj_esistente($nome_oggetto);

                $db->add_object($nome_oggetto,$data_deposito,$id,$id_mobile['id_mobile']);
                $objectData = [
                    'nome_oggetto'=>$nome_oggetto,
                    //'data_deposito'=>$data_deposito,
                    //'mobile'=>$mobile
                ];
                echo 1;
                exit();
            }
            else{
                //die("LAPAZZA111");
                $nome_oggetto = $arrayOggetto['stringa'];
                if($db->same_obj($nome_oggetto,$id)===true){
                    //echo "ERRORE";
                    return false;
                }
                //die($nome_oggetto);
                if($db->existenceOfObj($id,$id_mobile['id_mobile'],$nome_oggetto,$data_deposito)){
                    $objectData = [
                        'nome_oggetto'=>$nome_oggetto,
                        //'data_deposito'=>$data_deposito,
                        //'mobile'=>$mobile
                    ];
                    echo $objectJSONData = json_encode($objectData);
                    exit();
                }
                $db->add_obj_esistente($nome_oggetto);
                $db->add_object($nome_oggetto,$data_deposito,$id,$id_mobile['id_mobile']);
                $objectData = [
                    'nome_oggetto'=>$nome_oggetto,
                    //'data_deposito'=>$data_deposito,
                    //'mobile'=>$mobile
                ];
                echo 1;
                exit();
            }
        }
    }
    /*$db->add_mobile_esistente($mobile);
    $id_mobile_esistente = $db->show_id_mobile_esistente($mobile);
    $db->add_mobile($mobile,$id,$id_mobile_esistente);
    $id_mobile = $db->show_id_mobile($mobile,$id);
    //die("FIND MOBILE: <pre>".print_r($mobile,1)."</pre>");
    //if($data_deposito == '') $data_deposito = $dataDeposito;
    //die("LAPAZZA".$data_deposito);
    $stringa = $db->parole_escluse($stringa);
    $mobileDaEliminare = $db->find_mobile($stringa);
    $nome_oggetto_trovato = $db->find_obj($mobileDaEliminare['stringa']);
    $nome_oggetto = $nome_oggetto_trovato['nome_oggetto'];
    $db->add_obj_esistente($nome_oggetto);
    $db->add_object($nome_oggetto,$data_deposito,$id,$id_mobile);
    die("MOBILE INSERITO");
    $objectData = [
        'nome_oggetto'=>$nome_oggetto,
        'data_deposito'=>$data_deposito,
        'mobile'=>$mobile
    ];
    echo $objectJSONData = json_encode($objectData);
    //$db->add_object($arr[2],$data_deposito,$id,$idMobile['id_mobile']);*/
}