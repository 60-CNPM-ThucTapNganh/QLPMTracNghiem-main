<?php
class MonHocClient extends Controller{
    
    function Index(){
    
        //Gọi view
        $this->view("layoutCustomer",
        [
            "page"=>"indexMonHoc"
        ]
        );
    }
}
?>