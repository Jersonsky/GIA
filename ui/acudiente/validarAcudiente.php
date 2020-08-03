<?php
if(isset($_SESSION['id'])){
    if($_SESSION['entity'] == "acudiente"){
        $Acudiente = new Acudiente($_SESSION['id']);
        $Acudiente -> select();
    }else{
        $pid = base64_encode("ui/error.php");
        echo "<script>location.href = 'index.php?pid=" . $pid . "'</script>";
    }
}else{
    header('Location: index.php');
}
?>