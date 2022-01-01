<?php
class CaNhanClient extends Controller{
    
    function Index(){
    
        //Gọi view
        $this->view("layoutCustomer",
        [
            "page"=>"indexCaNhan"
        ]
        );
    }
}
?>