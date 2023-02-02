<?php

header('Accsess-controle-Allow-Origne: *');
header('Content-type: aplication/json');
header('Access-Control-Allow-headers: access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Autorization,X-Requested');

class createController  extends methods {

        //// add new user ////
    public function add_user(){
        $data  = json_decode(file_get_contents("php://input"));

        $this->First_name  = $data->First_name;
        $this->Last_name  = $data->Last_name;
        $this->date_of_birth  = $data->date_of_birth;
        $this->nationality  = $data->nationality;
        
        $this->family_status  = $data->family_status;
        $this->address  = $data->address;
        $this->visat_ype  = $data->visat_ype;
        $this->Date_of_departure  = $data->Date_of_departure;

        $this->Date_of_arrival  = $data->Date_of_arrival;
        $this->document_type  = $data->document_type;
        $this->document_number  = $data->document_number;
        $this->Reference_key  = uniqid();

        
        if($this->add_user_req()){
            echo json_encode(array('message = > data save'));
        }else {   
            echo json_encode(array('message = > data bot save'));
        }
    }



    /// add new reservation ///

    
    public function add_reservation(){
        $data  = json_decode(file_get_contents("php://input"));
        
        
        $this->date_reservation  = $data->date_reservation;
        $this->id_user = $this->get_id_user();

        
        if($this->add_reservation_req()){
            echo json_encode(array('message = > data save'));
        }else {   
            echo json_encode(array('message = > data bot save'));
        }
    }
    
}