<?php
    class Api extends Controller{
        private $header;
        private $client;
        private $appointment;

        private $utilities;

        public function __construct(){
        $this->header = new headers();
        $this->client = $this->model("Client");
        $this->utilities = new Utilities();
        $this->appointment = $this->model("Appointment");
        }

        public function index(){
        $this->header->init("GET");
        echo json_encode([
            "message" => "hello",
        ]);
        }

        public function createClient(){
            $this->header->init("POST");
            $data = json_decode(file_get_contents("php://input"));
            $token = $this->utilities->randomStrGenerator();
            $this->client->add($data->fname, $data->lname, $data->email, $data->phone, $token);
            $this->header->status(201, "Created");
            echo json_encode([
                "message" => "client created",
                "token" => $token,
            ]);
        }

        public function editToken(){
            $this->header->init("PUT");
            $data = json_decode(file_get_contents("php://input"));
            $token = $this->utilities->randomStrGenerator();
            $this->client->editToken($data->id, $token);
            $this->header->status(202, "Accepted");
            echo json_encode([
                "message" => "token updated",
                "token" => $token,
            ]);
        }

        public function tokenAccess(){
            $this->header->init("POST");
            $data = json_decode(file_get_contents("php://input"));
            if($this->client->verifyToken($data->token)){
                $this->header->status(202, "Created");}
            else
                $this->header->status(401, "Unauthorized");
        }


        public function editClient(){
            $this->header->init("PUT");
            $data = json_decode(file_get_contents("php://input"));
            $token = $this->utilities->randomStrGenerator();
            $this->client->edit($data->fname, $data->lname, $data->email, $data->phone, $data->id);
            $this->header->status(202, "Accepted");
            echo json_encode([
                "message" => "client updated",
            ]);
        }

        public function addAppointment(){
            $this->header->init("POST");
            $data = json_decode(file_get_contents("php://input"));
            $this->appointment->add($data->id, date("Y-m-d"), $data->hour);
            $this->header->status(201, "Created");
            echo json_encode([
                "message" => "appointment created for user with id:$data->id",
            ]);
        }

        public function editAppointment(){
            $this->header->init("PUT");
            $data = json_decode(file_get_contents("php://input"));
            $this->appointment->edit($data->id, $data->date, $data->hour);
            $this->header->status(202, "Accepted");
            echo json_encode([
                "message" => "appointment with id:$data->id was updated!",
            ]);
        }

        public function delete($id){
            $this->header->init("DELETE");
            $this->appointment->deleteById($id);
            $this->header->status(200, "OK");
            echo json_encode([
                "message" => "appointment with id:$id was deleted!",
            ]);
        }

        public function all($id){
            $this->header->init("GET");
            $result = $this->appointment->all($id);
            $this->header->status(200, "OK");
            echo json_encode([
                "message" => "all appointment for client(id:$id)!",
                "appointments" => ($result),
            ]);
        }
    }
?>