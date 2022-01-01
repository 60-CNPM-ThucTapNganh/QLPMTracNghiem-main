<?php
class Home extends Controller{

    function Index(){

        //Gọi view
        $this->view("layoutCustomer", 
        [
            "page"=>"indexHome",
        ]
        );
    }
}
?>