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

        public function addAppointement(){
            $this->header->init("POST");
            $data = json_decode(file_get_contents("php://input"));
            $this->appointment->add($data->id, date("Y-m-d"), $data->hour);
            $this->header->status(201, "Created");
            echo json_encode([
                "message" => "appointment created for user with id:$data->id",
            ]);
        }
    }
?>