<?php
if(isset($_SESSION['id'])){
    if($_SESSION['entity'] == "estudiante"){
        $Estudiante = new Estudiante($_SESSION['id']);
        $Estudiante -> select();
    }else{
        $pid = base64_encode("ui/error.php");
        echo "<script>location.href = 'index.php?pid=" . $pid . "'</script>";
    }
}else{
    header('Location: index.php');
}
?>