<?php
require_once 'class.php';
require_once 'session.php';

if(isset($_REQUEST)) {
    $search = "{$_REQUEST["keyword"]}%";
    //die("LAPAZZA7".$search);
    $db = new db_class();
    $id_persona = $_SESSION['id_persona'];
    //$db->selectObj($search,$id_persona);
    $result = $db->selectObj($search,$id_persona);
    if(!empty($result)){
        ?>
        <ul id="listaNomi">
            <?php
            foreach($result as $nomeOggetto){
                ?>
                <p onclick="selectObject('<?php echo $nomeOggetto["nome_oggetto"];?>')">
                    <?php echo $nomeOggetto["nome_oggetto"]?>
                </p>
            <?php }?>
        </ul>
        <?php
    }
}
?>

