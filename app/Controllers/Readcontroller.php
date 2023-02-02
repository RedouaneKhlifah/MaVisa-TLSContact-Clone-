<?php 

// headers 
header('Accsess-controle-Allow-Origne: *');
header('Content-type: aplication/json');
// include_once (  MODELS .'/connexion.php');
// include_once  (MODELS .'/post.php');

class ReadController extends methods {


 //// get all user /////////

public function get_users(){
        
    //get_all query
    $result  = $this->get_all_user();
    
    
    
    //Get row count
    
    $num  = mysqli_num_rows($result);

    // check if database not empty
    
    if ($num > 0){
       $post_arr = array();
       $post_arr['data'] = array();
        while ($row  = mysqli_fetch_assoc($result)){
            extract($row);

            $post_item = array(
                'id_user' => $id_user,
                'First_name ' => $First_name,
                'Last_name' =>$Last_name,
                'date_of_birth' => $date_of_birth,
                'nationality' => $nationality,
                'family_status' => $family_status,

                'address' => $address,
                'visat_ype ' => $visat_ype,
                'Date_of_departure' =>$Date_of_departure,
                'Date_of_arrival' => $Date_of_arrival,
                'document_type' => $document_type,
                'document_number' => $document_number,

                'Reference_key' => $Reference_key,
    
            );
    
            // push tp 'data'
            array_push($post_arr['data'],$post_item);
    
        }
        // turn to JSON & output
        echo json_encode($post_arr);
    
    }else {
        echo json_encode(array('message' => 'no data found'));
    }
}







   /// get single user ////////

public function get_user($id){

    /// get id
    $this->id_user  = isset($id) ?$id:die();

    // excute query
    $this->get_user_req();

    // push data into array

    $post_arr = array(
        'id_user' => $this->id_user,
        'First_name' => $this->First_name,
        'Last_name' =>$this->Last_name,
        'date_of_birth' => $this->date_of_birth,
        'nationality' => $this->nationality,
        'family_status' => $this->family_status,

        'address' => $this->address,
        'visat_ype' => $this->visat_ype,
        'Date_of_departure' =>$this->Date_of_departure,
        'Date_of_arrival' => $this->Date_of_arrival,
        'document_type' => $this->document_type,
        'document_number' => $this->document_number,

        'Reference_key' => $this->Reference_key,

    );

    // make jason

    print_r(json_encode($post_arr));
}



    /// get all reservation ///

    public function get_reservation(){
        
        //get_all query
        $result  = $this->get_all_reservs();
        
        
        
        //Get row count
        
        $num  = mysqli_num_rows($result);
    
        // check if database not empty
        
        if ($num > 0){
           $post_arr = array();
           $post_arr['data'] = array();
            while ($row  = mysqli_fetch_assoc($result)){
                extract($row);
    
                $post_item = array(
                    'id_reservation' => $id_reservation,
                    'date_reservation' => $date_reservation,
                    'id_user' =>$id_user
        
                );
        
                // push tp 'data'
                array_push($post_arr['data'],$post_item);
        
            }
            // turn to JSON & output
            echo json_encode($post_arr);
        
        }else {
            echo json_encode(array('message' => 'no data found'));
        }
    }



}