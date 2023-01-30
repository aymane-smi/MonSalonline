<?php
    class Api extends Controller{
        private $header;
        private $client;

        private $utilities;

        public function __construct(){
        $this->header = new headers();
        $this->client = $this->model("Client");
        $this->utilities = new Utilities();
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
    }
?>