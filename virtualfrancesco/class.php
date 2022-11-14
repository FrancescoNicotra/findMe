<?php
require_once "config.php";
ini_set("display_errors",1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
class db_class extends db_connect{
    public $tmp = array();
    public $save = array();
    public $oggettoTrovato = 0;
    public $luogoTrovato = 0;
    public $mobileTrovato = 0;


    public function __construct()
    {
        $this->connect();
    }
    //user
    public function add_user($nome,$cognome,$email,$username,$password,$numero_tel){
        $query = $this->conn->prepare("INSERT INTO persona (nome,cognome,email,username,password,numero_tel) VALUES (?,?,?,?,?,?)") or die($this->conn->error);
        $query->bind_param("ssssss",$nome,$cognome,$email,$username,$password,$numero_tel );
        if($query->execute()){
            $query->close();
            return true;
        }
    }

    public function login($username,$password){
        $query = $this->conn->prepare("SELECT * FROM persona WHERE username='$username' OR numero_tel='$username' AND password='$password'") or die ($this->conn->error);
        if($query->execute()){
            $result = $query->get_result();
            $valid = $result->num_rows;
            $fetch = $result->fetch_array();
            return array(
                'id_persona'=>isset($fetch['id_persona']) ? $fetch['id_persona'] : 0,
                'count'=>isset($valid) ? $valid:0
            );
        }
    }


    public function displayUser($id_utente){
        $query = $this->conn->prepare("SELECT * FROM persona WHERE id_persona = '$id_utente'");
        if($query->execute()){
            $result = $query->get_result();
            $fetch = $result->fetch_array();
            return array(
                'id_persona'=>isset($fetch['id_persona'])?$fetch['id_persona']:0,
                'username'=>isset($fetch['username'])?$fetch['username']:''
            );
        }
    }


    //--------------------------------------------------------------------------

    //oggetti
    public function display_object($id_persona){
        $query = $this->conn->prepare("SELECT * FROM oggetto WHERE id_persona ='$id_persona' AND depositato=1 ") or die ($this->conn->error);
        if($query->execute()){
            $result = $query->get_result();
            return $result;
        }
    }
    public function add_object($nome_oggetto,$data_deposito,$id_persona,$id_mobile){
        $exists = $this->conn->prepare("SELECT * FROM oggetto WHERE id_persona='$id_persona' AND nome_oggetto = '$nome_oggetto' AND depositato = 1");
        if($exists->execute()){
            $result = $exists->get_result();
            $value = $result->num_rows;
            if($value>0){
                $exists->close();
                return false;
            }
        }
        $existsNonDepositato = $this->conn->prepare("SELECT * FROM oggetto WHERE id_persona = '$id_persona' AND nome_oggetto = '$nome_oggetto' AND depositato = 0");
        //die("LAPAZZA75 <pre>".print_r($existsNonDepositato,1)."</pre>");
        if($existsNonDepositato->execute()){
            $query = $this->conn->prepare("UPDATE oggetto SET depositato = 1 WHERE id_persona = '$id_persona' AND nome_oggetto = '$nome_oggetto' AND id_mobile='$id_mobile'");
            if($query->execute()){
                die("LAPAZZA78");
                $query->close();
                return true;
            }
        }
        else {
            $query = $this->conn->prepare("INSERT INTO oggetto (nome_oggetto,data_deposito,id_persona,id_mobile) VALUES (?,?,?,?)") or die($this->conn->error);
            $query->bind_param("ssii", $nome_oggetto, $data_deposito, $id_persona, $id_mobile);
            if ($query->execute()) {
                $changeBool = $this->conn->prepare("UPDATE oggetto SET depositato=1 WHERE nome_oggetto='$nome_oggetto' AND data_deposito='$data_deposito' AND id_persona='$id_persona' AND id_mobile='$id_mobile'") or die($this->conn->error);
                if ($changeBool->execute()) {
                    $query->close();
                    return true;
                }
            }
        }
    }

    public function getIdObj($id_persona,$nome_oggetto){
        $query = $this->conn->prepare("SELECT * from oggetto WHERE id_persona = '$id_persona' AND nome_oggetto= '$nome_oggetto'");
        //$query->bind_param("s",$nome_oggetto);
        if($query->execute()){
            $result = $query->get_result();
            return $result;
        }
    }

    public function getObject($id_oggetto,$data_prelievo,$id_persona){
        $query = $this->conn->prepare("UPDATE oggetto SET depositato=0 WHERE id_oggetto='$id_oggetto' AND id_persona = '$id_persona'")or die($this->conn->error);
        if($query->execute()) {
            $setPrelievo = $this->conn->prepare("UPDATE oggetto SET data_prelievo=?") or die($this->conn->error);
            $setPrelievo->bind_param("s", $data_prelievo);
            //die("LAPAZZA");
            if($setPrelievo->execute()){
                //die("STO ELIMINANDO L'OGGETTO");
                $query->close();
                $setPrelievo->close();
                return true;
            }
        }
    }

    public function selectObj($oggettoCercato,$id_persona){
        $query=$this->conn->prepare("SELECT * FROM oggetto WHERE nome_oggetto LIKE ? AND id_persona = '$id_persona' AND oggetto.depositato = 1 ORDER BY nome_oggetto")or die($this->conn->error);
        $query->bind_param("s",$oggettoCercato);
        if($query->execute()){
            $result = $query->get_result();
            return $result;
        }
    }



    public function updateObj($nome_oggetto,$oggettoCercato,$data_deposito,$id_persona,$id_mobile){
        $query = $this->conn->prepare("UPDATE oggetto SET nome_oggetto=?, data_deposito=?, id_mobile = ? WHERE id_persona = '$id_persona' AND nome_oggetto = '$oggettoCercato'")or die($this->conn->error);
        $query->bind_param("ssi",$nome_oggetto,$data_deposito,$id_mobile);
        if($query->execute()){
            $query->close();
            return true;
        }
    }



    public function displayFoundedObj($id_persona,$stringa){
        //die($stringa);
        $stringa = trim($stringa);
        $query = $this->conn->prepare("SELECT * FROM oggetto WHERE id_persona = '$id_persona' AND nome_oggetto LIKE '%$stringa%' AND depositato = 1")or die($this->conn->error);
        //die($stringa);
        //$query->bind_param("s",$stringa);
        if($query->execute()){
            //die(print_r($query,1));
            $result = $query->get_result();
            //die(print_r($result,1));
            return $result;
        }else {
            return false;
        }
    }



    public function displayAllObjFromMobile($id_persona,$id_mobile){
        $query = $this->conn->prepare("SELECT * FROM oggetto WHERE id_persona='$id_persona' AND id_mobile = '$id_mobile'")or die($this->conn->error);
        if($query->execute()){
            $result = $query->get_result();
            return $result;
        }
    }



    public function existenceOfObj($id_persona,$id_mobile,$nome_oggetto,$data_deposito){
        $exist = $this->conn->prepare("SELECT * FROM oggetto WHERE depositato = 0 AND id_persona = '$id_persona' AND nome_oggetto LIKE '%$nome_oggetto%' AND id_mobile = '$id_mobile'");
        if($exist->execute()){
            $result = $exist->get_result();
            $num_rows = $result->num_rows;
            while($fetch = $result->fetch_array()){
                //die("LAPAZZA 151 <pre>".print_r($fetch,1)."</pre>");
                similar_text($nome_oggetto,$fetch['nome_oggetto'],$percent);
                if($percent>80.0){
                    $exist->close();
                    $query = $this->conn->prepare("UPDATE oggetto SET depositato = 1 AND data_deposito = ? AND data_prelievo = ''");
                    $query->bind_param("s",$data_deposito);
                    if($query->execute()){
                            $query->close();
                            return true;
                    }
                }
            }
        }
    }



//--------------------------------------------------------------------------

    //mobile
    public function add_mobile($nome_mobile,$id_persona,$id_mobili_esistenti){
        $exists = $this->conn->prepare("SELECT * FROM mobile WHERE id_persona='$id_persona' AND nome_mobile = '$nome_mobile'");
        if($exists->execute()) {
            $result = $exists->get_result();
            $value = $result->num_rows;
            if ($value > 0) {
                return false;
            } else {
                $query = $this->conn->prepare("INSERT INTO mobile (nome_mobile,id_persona,id_mobili_esistenti) VALUES (?,?,?)") or die($this->conn->error);
                $query->bind_param("sii", $nome_mobile, $id_persona,$id_mobili_esistenti);
                if ($query->execute()) {
                    $query->close();
                    return true;
                }
            }
        }
    }



    public function getNomeMobileFromOggetto($id_persona,$id_mobile){
        $query = $this->conn->prepare("SELECT * FROM mobile WHERE id_persona='$id_persona' AND id_mobile = '$id_mobile'")or die($this->conn->error);
        if($query->execute()){
            $result = $query->get_result();
            $fetch = $result->fetch_array();
            $valid = $result->num_rows;
            return array(
                'id_mobile'=>isset($fetch['id_mobile'])?$fetch['id_mobile']:0,
                'nome_mobile'=>isset($fetch['nome_mobile'])?$fetch['nome_mobile']:0,
                'count'=>isset($valid)?$valid:0
            );
        }
    }



    public function getIdMobileFromOggetto($id_persona,$id_oggetto){
            $query = $this->conn->prepare("SELECT * FROM oggetto WHERE id_persona = '$id_persona' AND id_oggetto = '$id_oggetto'");
            if($query->execute()){
                $result = $query->get_result();
                $fetch = $result->fetch_array();
                return array(
                    'id_mobile'=>isset($fetch['id_mobile'])?$fetch['id_mobile']:0,
                    'nome_oggetto'=>isset($fetch['nome_oggetto'])?$fetch['nome_oggetto']:''
                );
            }
    }




/*return array(
'id_oggetto'=>isset($fetch['id_mobile']) ? $fetch['id_mobile']:0,
'id_mobile'=>isset($fetch['id_mobile']) ? $fetch['id_mobile']:0,
'nome_oggetto'=>isset($fetch['nome_oggetto'])?$fetch['nome_oggetto']:0
);*/

    public function show_id_mobile($nome_mobile,$id_persona){
        $query = $this->conn->prepare("SELECT * FROM mobile WHERE nome_mobile = '$nome_mobile' AND id_persona = '$id_persona'") or die($this->conn->error);
        if($query->execute()){
            $result = $query->get_result();
            $valid = $result->num_rows;
            $fetch = $result->fetch_array();
            return array(
                'id_mobile'=>isset($fetch['id_mobile']) ? $fetch['id_mobile'] : 0,
                'count' => isset($valid) ? $valid:0
            );
        }
    }
    public function display_mobile($id_persona){
        $query = $this->conn->prepare("SELECT * FROM mobile,oggetto WHERE mobile.id_persona ='$id_persona' AND mobile.id_mobile=oggetto.id_mobile AND oggetto.depositato=1") or die ($this->conn->error);
        if($query->execute()){
            $result = $query->get_result();
            return $result;
        }
    }
    public function displayFoundedMobile($id_persona,$id_mobile){
        $query = $this->conn->prepare("SELECT * FROM mobile,oggetto WHERE mobile.id_persona = '$id_persona' AND mobile.id_mobile = '$id_mobile' AND depositato=1 AND mobile.id_mobile = oggetto.id_mobile")or die($this->conn->error);
        if($query->execute()){
            $result = $query->get_result();
            return $result;
        }
        return false;
    }




//--------------------------------------------------------------------------
    //ricerca

    public function parole_escluse($stringa){
        //echo "STRINGA:".$stringa;
        $query = $this->conn->prepare("SELECT * FROM parole_escluse") or die ($this->conn->error);
        if($query->execute()) {
            $result = $query->get_result();
            $valid = $result->num_rows;
            $stringa = ' '.$stringa.' ';
            $stringa = str_replace("'",' ',$stringa);
            $stringa = str_replace(",",' ',$stringa);
            $stringa = str_replace(".",' ',$stringa);
            $stringa = str_replace("?",' ',$stringa);
            for($i = 0;$i<$valid;$i++){
                $fetch = $result->fetch_array();
                $words = explode(' ',$stringa);
                //die("lapazza226 <pre>".print_r($words,1)."</pre>");
                foreach ($words as $word){
                    $confronto = array(
                        'stringa'=> isset($stringa)?$stringa:0,
                        'parola'=>isset($fetch['parola'])?$fetch['parola']:''
                    );
                    $word = ' '.$word.' ';
                    similar_text($word,$confronto['parola'],$percent);

                    //echo "<pre>".print_r($confronto,1)."</pre>";
                    //echo "confronto:".$word."=".$confronto['parola'].$percent."% <br>";
                    if($percent>=80.0){
                       // echo "sto eliminando:".$word."<br>";
                        $stringa = str_replace($word, ' ', $stringa);
                        //echo "STRINGA FINALE:".$stringa."<br>";
                        //$stringa = ltrim($stringa);
                        //array_push($this->tmp, $confronto['parola']);
                    }
                }
            }

            return $stringa;
        }
    }

/*
 * $stringa = str_replace($place, '', $stringa);
   $stringa = ltrim($stringa);
*/
    public function find_obj($stringa){
        $query = $this->conn->prepare("SELECT * FROM oggetti_esistenti");
        if($query->execute()){
            $result = $query->get_result();
            $valid = $result->num_rows;
            //die("LAPAZZA324".$valid);
            $stringa=trim($stringa);
            $object = explode(' ',$stringa);
            $i = 0;
            while($fetch = $result->fetch_array()){
                foreach ($object as $obj) {
                    similar_text($fetch['nome_oggetto'],$obj,$percent);
                    //echo "CONFRONTO:".$obj."=".$fetch['nome_oggetto'].$percent."% <br>";
                    //echo "valore di i=valid:".$i."=".$valid."<br>";
                    if($percent>=85.0){
                        //echo "HO TROVATO L'OGGETTO NELLA TABELLA:".$obj;
                        //echo "<pre>".print_r($fetch,1)."</pre>";
                        $stringa = str_replace($fetch['nome_oggetto'], '', $stringa);
                        $stringa = trim($stringa);

                        return array(
                            'stringa'=>isset($stringa)?$stringa:'',
                            'nome_oggetto'=>isset($fetch['nome_oggetto'])?$fetch['nome_oggetto']:''
                        );
                    }

                    else if ($i == $valid-1){
                        //echo "NON ESISTE L'OGGETTO, <br> valore di obj:".$obj."<br> valore della stringa:".$stringa;
                        return array(
                            'stringa'=>isset($stringa)?$stringa:'',
                            'nome_oggetto'=>''
                        );
                    }
                    $i++;
                }
            }

        }
    }

    public function find_mobile($stringa){
        $query = $this->conn->prepare("SELECT * FROM mobili_esistenti");
        if($query->execute()){
            $result = $query->get_result();
            $nome_mobile = explode(" ",$stringa);
            //echo "nome_mobile:".print_r($nome_mobile,1)."<br>";
            //echo "stringa passata:".$stringa."<br>";
            $i = 0;

            while($fetch = $result->fetch_array()){
                $j = 0;
                foreach ($nome_mobile as $mobile){
                    //echo $i."=".$result->num_rows."<br>".$j."=".count($nome_mobile)."<br>";
                    similar_text($mobile,$fetch['nome_mobile'],$percent);
                    //echo "parola confrontata:".$mobile."=".$fetch['nome_mobile'].$percent."% <br>";
                    if($percent>=85.0){
                        $this->mobileTrovato=1;
                        $stringa = str_replace($mobile, '', $stringa);
                        $stringa = ltrim($stringa);
                        return array(
                            'stringa'=>isset($stringa)?$stringa:'',
                            'nome_mobile'=>isset($mobile)?$mobile:''
                        );
                    }
                    else if ($i==($result->num_rows)-1 && $percent<85.0 && $j==(count($nome_mobile))-1){
                        return array(
                            'stringa'=>isset($stringa)?$stringa:'',
                            'nome_mobile'=>''
                        );
                    }
                    $j++;
                }
                $i+=1;
            }
        }
    }


    public function same_obj($nome_oggetto,$id_persona){
        $exist = $this->conn->prepare("SELECT * FROM oggetto WHERE id_persona = '$id_persona' AND depositato = 1")or die($this->conn->error);
        if($exist->execute()){
            $result = $exist->get_result();
            while($fetch = $result->fetch_array()){
                similar_text($nome_oggetto,$fetch['nome_oggetto'],$percent);
                if($percent >= 80.0){
                    return true;
                }
            }
        }
        return false;
    }


    //--------------------------------------------------------------------------
    //mobili esistenti

    public function show_id_mobile_esistente($nome_mobile){
        $query = $this->conn->prepare("SELECT * FROM mobili_esistenti WHERE nome_mobile = '$nome_mobile'") or die($this->conn->error);
        if($query->execute()){
            $result = $query->get_result();
            $valid = $result->num_rows;
            $fetch = $result->fetch_array();
            return array(
                'id_mobile'=>isset($fetch['id_mobile']) ? $fetch['id_mobile'] : 0,
                'nome_mobile'=>isset($fetch['nome_mobile'])?$fetch['nome_mobile']:'',
                'count' => isset($valid) ? $valid:0
            );
        }
    }
    public function num_rows_mobile(){
    $query = $this->conn->prepare("SELECT * FROM mobili_esistenti") or die($this->conn->error);
    if($query->execute()){
        $result = $query->get_result();
        $valid = $result->num_rows;
        $fetch = $result->fetch_array();
        return array(
            'id_mobile'=>isset($fetch['id_mobile']) ? $fetch['id_mobile'] : 0,
            'nome_mobile' => isset($fetch['nome_mobile']) ? $fetch['nome_mobile'] : '',
            'count' => isset($valid) ? $valid:0
        );
    }
}

    public function add_mobile_esistente($nome_mobile){
        $exist = $this->conn->prepare("SELECT * FROM mobili_esistenti WHERE nome_mobile='$nome_mobile'");
        if($exist->execute()){
            $result = $exist->get_result();
            $valid = $result->num_rows;
            if($valid>0) return false;
            else{
                $query = $this->conn->prepare("INSERT INTO mobili_esistenti (nome_mobile) VALUES (?)");
                $query->bind_param("s",$nome_mobile);
                if($query->execute()){
                    $query->close();
                    return true;

                }
            }
        }
    }



    //--------------------------------------------------------------------------
    //luoghi esistenti

    public function show_id_luoghi_esistente($nome_luogo){
        $query = $this->conn->prepare("SELECT * FROM luogo WHERE nome_luogo = '$nome_luogo'") or die($this->conn->error);
        if($query->execute()){
            $result = $query->get_result();
            $valid = $result->num_rows;
            $fetch = $result->fetch_array();
            return array(
                'id_luogo'=>isset($fetch['id_luogo']) ? $fetch['id_luogo'] : 0,
                'count' => isset($valid) ? $valid:0
            );
        }
    }

    public function num_rows_luogo()
    {
        $query = $this->conn->prepare("SELECT * FROM luogo") or die($this->conn->error);
        if ($query->execute()) {
            $result = $query->get_result();
            $valid = $result->num_rows;
            $fetch = $result->fetch_array();
            return array(
                'id_mobile' => isset($fetch['id_mobile']) ? $fetch['id_mobile'] : 0,
                'nome_luogo' => isset($fetch['nome_luogo']) ? $fetch['nome_luogo'] : '',
                'count' => isset($valid) ? $valid : 0
            );
        }
    }
    //--------------------------------------------------------------------------
    //oggetti esistenti

    public function add_obj_esistente($nome_oggetto){
        $query = $this->conn->prepare("INSERT INTO oggetti_esistenti (nome_oggetto) VALUES (?)") or die($this->conn->error);
        $query->bind_param("s",$nome_oggetto);
        if($query->execute()){
            $query->close();
            return true;
        }
    }




    public function show_id_oggetto_esistente($nome_oggetto){
        $query = $this->conn->prepare("SELECT * FROM luogo WHERE nome_luogo = '$nome_oggetto'") or die($this->conn->error);
        if($query->execute()){
            $result = $query->get_result();
            $valid = $result->num_rows;
            $fetch = $result->fetch_array();
            return array(
                'id_oggetto'=>isset($fetch['id_oggetto']) ? $fetch['id_oggetto'] : 0,
                'count' => isset($valid) ? $valid:0
            );
        }
    }

    public function num_rows_oggetto()
    {
        $query = $this->conn->prepare("SELECT * FROM oggetti_esistenti") or die($this->conn->error);
        if ($query->execute()) {
            $result = $query->get_result();
            $valid = $result->num_rows;
            $fetch = $result->fetch_array();
            return array(
                'id_oggetto' => isset($fetch['id_oggetto']) ? $fetch['id_oggetto'] : 0,
                'nome_oggetto' => isset($fetch['nome_oggetto']) ? $fetch['nome_oggetto'] : '',
                'count' => isset($valid) ? $valid : 0
            );
        }
    }

}