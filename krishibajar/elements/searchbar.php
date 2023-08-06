<?php
class SearchBar{

    public function get($type,$class,$placeholder){
        return "<form action ='../krishibajar/search.php'  method = 'post'><input type =$type class = '$class' id = '$class' placeholder ='$placeholder'></form>";

    }
}


?>