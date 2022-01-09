<?php
class HomeClient extends Controller{

    function Index(){
        $this->view("layoutCustomer",[
            'page' => 'indexHome',
        ]);
    }
}
?>