<?php
require_once 'class.php';
require_once 'session.php';
if(isset($_REQUEST)){
    $db = new db_class();
    $id_persona = $_SESSION['id_persona'];
    //die("LAPAZZA8".$id_persona);
    $stringa = $_REQUEST['keyword'];
    //die($stringa.strlen($stringa));
    $parolaCercata = $db->parole_escluse($stringa);
    $username = $db->displayUser($id_persona);
    //echo $parolaCercata;
    //die("LAPAZZA10".$parolaCercata);
    if($parolaCercata===''){
        return false;
    }
    $nome_mobile = '';
    $mobile_cercato = $db->find_mobile($parolaCercata);

    if ($mobile_cercato['stringa'] !== '' && $mobile_cercato['nome_mobile']==''){
        $nome_mobile = $mobile_cercato['stringa'];
    }elseif ($mobile_cercato['stringa'] == '' && $mobile_cercato['nome_mobile']!=='')$nome_mobile = $mobile_cercato['nome_mobile'];
    //die("LAPAZZA23".$nome_mobile."<br>");
    $id_mobile = $db->show_id_mobile($nome_mobile,$id_persona);
    //die("LAPAZZA 23 ".print_r($id_mobile,1)."<br>.$nome_mobile");
    ?>
    <div class="p-2 bd-highlight">
        <button type="button" class="btn btn-primary btn-success btn-block" name="aggiungi_oggetto" id="aggiungi_oggetto" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg class="icon">
                <use href="/bootstrap-italia/svg/sprites.svg#it-plus"></use>
            </svg>Aggiungi</button>
    </div>
            <?php
            $tbl_user = $db->displayAllObjFromMobile($id_persona,$id_mobile['id_mobile']);
            $num_rows = $tbl_user->num_rows;
            //die("LAPAZZA35 <pre>".print_r($tbl_user,1)."</pre>");
            if($num_rows>=1){
                ?><p class="ms-2">Ciao <strong><?php echo $username['username']?></strong>, sul/nel mobile <strong><?php echo $nome_mobile?></strong> trovi i seguenti oggetti: <?php
            //$count = 1;
            while($fetch=$tbl_user->fetch_array()){
                //while($fetch2=$tbl_mobile->fetch_array()){
                $nome_oggetto = $fetch['nome_oggetto'];
                $data_deposito = $fetch['data_deposito'];
                //die("LAPAZZA <pre>".print_r($fetch,1)."</pre>");
                //$nome_mobile = $fetch2['nome_mobile'];
                ?>
                <p class="ms-2"><strong><?php echo $nome_oggetto?></strong> rilasciato il <strong><?php echo $data_deposito." "?></strong><br></p>
                <?php
            }
            ?>

<?php
            }
            //caso in cui si fa una ricerca per nome dell'oggetto e non per mobile
            else{

                $nome_oggetto = '';
                $oggetti = $db->find_obj($parolaCercata);
                //die("LAPAZZA 89 <pre>".print_r($oggetti,1)."</pre>");
                if($oggetti['stringa']!== '' && $oggetti['nome_oggetto']!=='') $nome_oggetto = trim($oggetti['nome_oggetto']);
                if ($oggetti['stringa']== '' && $oggetti['nome_oggetto']!=='') $nome_oggetto = trim($oggetti['nome_oggetto']);
                elseif ($oggetti['stringa']!== '' && $oggetti['nome_oggetto']=='') $nome_oggetto = trim($oggetti['stringa']);
                //die("LAPAZZA91".$id_persona.$nome_oggetto);
                $tbl_user = $db->displayFoundedObj($id_persona,$nome_oggetto);
                //die("LAPAZZA 92 <pre>".print_r($tbl_user,1)."</pre>");
                $num_rows = $tbl_user->num_rows;
                while ($fetch = $tbl_user->fetch_array()){
                    $data_deposito = $fetch['data_deposito'];
                ?>
                        <div class="d-flex">
                    <p class="ms-2">Ciao <strong><?php echo $username['username']?></strong>, l'oggetto <strong><?php echo $nome_oggetto?></strong> rilasciato il <strong><?php echo $data_deposito." "?></strong></p>
                    <?php
                }
                ?>
                <?php
                //die("LAPAZZA115".$id_persona.$nome_oggetto."P");
                $id_oggetti = $db->getIdObj($id_persona,$nome_oggetto);
                //die("LAPAZZA115<pre>".print_r($id_oggetti,1)."</pre>");
                $id_oggetto = $id_oggetti->fetch_array();
                //die("LAPAZZA116 <pre>".print_r($id_oggetto,1)."</pre>");
                $id_mobile = $db->getIdMobileFromOggetto($id_persona,$id_oggetto['id_oggetto']);
                $nome_mobile = $db->getNomeMobileFromOggetto($id_persona,$id_mobile['id_mobile']);
                //die("LAPAZZa 117 <pre>".print_r($nome_mobile,1)."</pre>");
                $mobile_cercato = $nome_mobile['nome_mobile'];
                $i = 0;
                while($i < $num_rows){

                    ?>
                    <p class="ms-2">si trova sul/nel mobile: <strong><?php echo $mobile_cercato?></strong></p>

                    <?php
                    $i++;
                }


                ?>
                </div>

                <?php
            }
            //die("LAPAZZA <pre>".print_r($nome_mobile,1)."</pre>");
            if($nome_mobile!==''){
                ?>
                <script>

                        var nome_oggetto = <?php echo json_encode($nome_oggetto)?>;
                        //alert(nome_oggetto);
                        if(confirm("Vuoi aggiungere questo oggetto? "+ nome_oggetto) && nome_oggetto!==''){
                            $("#aggiungi_oggetto").prop("hidden",false).html("Aggiungi "+'"'+nome_oggetto+'"');
                            $("#nome_oggetto").prop("hidden",true);
                            $("#nome_oggetto_cercato").prop("hidden",false).val(nome_oggetto);
                            //$("#mobile").prop("hidden", false);
                        }

                    </script>
                <?php
                //json_encode($nome_oggetto);
            }
            //echo "LAPAZZA";
    //die("LAPAZZA <pre>".print_r($mobile,1)."</pre><pre>".print_r($id_oggetto,1)."</pre><pre>".print_r($parolaCercata,1)."</pre>");
}