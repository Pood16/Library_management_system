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
        // public function displayBook(){
        //     try {
        //         $db = new Database('Library', 8951);
        //         $pdo = $db->connect();
        //         $sql = 'SELECT books.*, categories.name FROM books JOIN categories ON books.category_id = categories.id';
        //         $stmt = $pdo->prepare($sql);
        //         $stmt->execute();
        //         $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //         return $books;
        //     } catch (PDOException $err) {
        //         echo 'Failed to add the Book: ' . $err->getMessage();
        //         exit();
        //     } finally {
        //         $stmt = null;
        //     }
        // }
        // test
        public function displayBook($search, $category) {
            try {
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = 'SELECT books.*, categories.name FROM books JOIN categories ON books.category_id = categories.id';
                if ($search != '' && $category != '') {
                    $sql .= " WHERE books.title LIKE '%$search%' AND categories.id = '$category'";
                }
                else if ($search != '') {
                    $sql .= " WHERE books.title LIKE '%$search%'";
                }
                else if ($category != '') {
                    $sql .= " WHERE categories.id = '$category'";
                }
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $books;
            } catch (PDOException $err) {
                echo 'Failed to get books: ' . $err->getMessage();
                exit();
            } finally {
                $stmt = null;
            }
        }
        // get book by id
        public function getBookId($id){
            try {
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = 'SELECT books.*, categories.name, borrowings.user_id, borrowings.return_date FROM books INNER JOIN categories ON books.category_id = categories.id LEFT JOIN borrowings ON books.id = borrowings.book_id  AND borrowings.return_date IS NULL WHERE books.id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);
                $stmt->execute();
                $book = $stmt->fetch();
                return $book;
            } catch (PDOException $err) {
                echo 'Failed to add the Book: ' . $err->getMessage();
                exit();
            } finally {
                $stmt = null;
            }
        }
        // update book 
        public function updateBook($id, $title, $author, $category_id, $cover_image, $summary){
            try {
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = 'UPDATE books SET title = :title, author = :author, category_id = :category_id, cover_image = :cover_image, summary = :summary WHERE books.id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':title', $title, PDO::PARAM_STR);
                $stmt->bindParam(':author', $author, PDO::PARAM_STR);
                $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
                $stmt->bindParam(':cover_image', $cover_image, PDO::PARAM_STR);
                $stmt->bindParam(':summary', $summary, PDO::PARAM_STR);
                // $stmt->bindParam(':status', $status, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $err) {
                echo 'Failed to update the book the Book: ' . $err->getMessage();
                exit();
            } finally {
                $stmt = null;
            }
        }
        // delete book 
        public function deleteBook($id){
            try {
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = 'DELETE FROM books WHERE books.id = :id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $err) {
                echo 'Failed to Delete the book the Book: ' . $err->getMessage();
                exit();
            } finally {
                $stmt = null;
            }
        }
        // show books user dash
        public function displayBooks($searched, $filtred){
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

    