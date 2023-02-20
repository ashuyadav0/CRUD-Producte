<?php 

    function getFormValue($nom){
        return trim(strip_tags($_POST[$nom]));
    }
    
    function specialChars($string){
        return htmlspecialchars($string);
    }
    
    function alertJS($text, $pagina){
        echo "<script type='text/javascript'>alert('$text');</script>";
        echo "<script type='text/javascript'>window.location.href = '$pagina';</script>";
    }
    
?>