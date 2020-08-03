<?php
if(isset($_SESSION['id'])){
    if($_SESSION['entity'] == "coordinador"){
        $Coordinador = new Coordinador($_SESSION['id']);
        $Coordinador -> select();
    }else{
        $pid = base64_encode("ui/error.php");
        echo "<script>location.href = 'index.php?pid=" . $pid . "'</script>";
    }
}else{
    header('Location: index.php');
}
?>