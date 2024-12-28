<?php 


    require_once 'Database.php';
    class Book {
        private $title;
        private $author;
        private $category_id;
        private $cover_image;
        private $summary;
        private $id;
        private $status;
        private $created_at;


        // add book
        public function addBook($title, $author, $category_id, $cover_image, $summary){
            try {
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = 'INSERT INTO books (title, author, category_id, cover_image, summary) VALUES (:title, :author, :category_id, :cover_image, :summary)';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':title', $title, PDO::PARAM_STR);
                $stmt->bindParam(':author', $author, PDO::PARAM_STR);
                $stmt->bindParam(':category_id', $category_id, PDO::PARAM_STR);
                $stmt->bindParam(':cover_image', $cover_image, PDO::PARAM_STR);
                $stmt->bindParam(':summary', $summary, PDO::PARAM_STR); 
                $stmt->execute();
            } catch (PDOException $err) {
                echo 'Failed to add the Book: ' . $err->getMessage();
                exit();
            } finally {
                $stmt = null;
            }
        }
        // display books
        public function displayBook(){
            try {
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = 'SELECT books.*, categories.name FROM books JOIN categories ON books.category_id = categories.id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $books;
            } catch (PDOException $err) {
                echo 'Failed to add the Book: ' . $err->getMessage();
                exit();
            } finally {
                $stmt = null;
            }
        }
    
    }

    // public function __construct($title, $author, $category_id, $cover_image, $summary, $id=null, $status=null, $created_at=null){
        //     $this->title = $title;
        //     $this->author = $author;
        //     $this->category_id = $category_id;
        //     $this->cover_image = $cover_image;
        //     $this->summary = $summary;
        //     $this->id = $id;
        //     $this->status = $status;
        //     $this->created_at = $created_at;
        // }