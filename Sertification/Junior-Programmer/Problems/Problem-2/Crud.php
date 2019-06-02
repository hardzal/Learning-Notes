<?php
    class Crud {
        private $db;

        public $id;
        public $nik;
        public $nama;

        public function __construct($database) {
            $this->db = $database;
        }

        public function showAll() {
            // untuk memilih semua data
            $query = "SELECT * FROM karyawan ORDER BY nik DESC";
            $stmt = $this->db->prepare($query);

            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return false;
        }

        public function showById($id){
            // untuk melihat data berdasarkan id
            $query = "SELECT * FROM karyawan WHERE id = :id";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':id', $id);
            if($stmt->execute()) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            return false;
        }

        public function create($data) {
            $query = "INSERT INTO karyawan VALUES('', :nik, :nama)";

            $nama = filter_var($data['nama'], FILTER_SANITIZE_STRING);
            $nik = filter_var($data['nik'], FILTER_SANITIZE_STRING);

            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':nik', $nik);

            if($stmt->execute()) {
                return $stmt->rowCount();
            }
            return false;
        }

        public function update($data) {
            $query = "UPDATE karyawan SET nama = :nama WHERE nik = :nik";
            $stmt = $this->db->prepare($query);
            
            $id = htmlspecialchars(strip_tags($data['nik']));
            $nama = htmlspecialchars(strip_tags($data['nama']));

            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':nik', $id);

            if($stmt->execute()) {
                return $stmt->rowCount();
            }
            return false;
        }

        public function delete($id) {
            $query = "DELETE FROM karyawan WHERE id = :id";

            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':id', $id);

            if($stmt->execute()) {
                return $stmt->rowCount();
            }

            return false;
        }

        public function search($data) {
            $data = filter_var($data, FILTER_SANITIZE_STRING);
            
            $query = "SELECT * FROM karyawan WHERE nama LIKE '%$data%' OR nik LIKE '%$data%'";

            $stmt = $this->db->prepare($query);

            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            return false;
        }

        public function checkRow($query) {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->rowCount();
        }

        public function checkId() {
            if(!isset($_GET['id']) && empty($_GET['id'])) {
                return false;
            }
            return true;
        }

        public function validate($var) {
            return htmlspecialchars(strip_tags($var));
        }

        public function checkNumber($var) {
            return is_numeric($var);
        }
    }
?>