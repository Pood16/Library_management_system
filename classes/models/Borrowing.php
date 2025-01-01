<?php
    require_once 'Database.php';
    class Borrowing {
       
       
        // add borrowing book
        public function setBorrowingBook($user_id, $book_id, $borrow_date, $due_date){
           try{
            $db = new Database('Library', 8951);
            $pdo = $db->connect();
            $sql = "INSERT INTO borrowings (user_id, book_id, borrow_date, due_date) VALUES (:user_id, :book_id, :borrow_date, :due_date); UPDATE books SET books.status = 'borrowed' WHERE books.id = :book_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':book_id', $book_id);
            $stmt->bindParam(':borrow_date', $borrow_date);
            $stmt->bindParam(':due_date', $due_date);
            $stmt->execute();
            return true;
           }catch(PDOException $err){
                echo "Failed to borrow the book : ". $err->getMessage();
           }finally{
            $stmt = null;
           }
        }
        // get book by id
        public function myBorrowingBooks($id){
            try{
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                // join book
                $sql = "SELECT books.*, borrowings.*, DATEDIFF(borrowings.due_date, CURDATE()) AS remainig_days FROM books INNER JOIN borrowings ON books.id = borrowings.book_id WHERE user_id = :id AND books.status = 'borrowed' AND borrowings.return_date IS NULL";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
               }catch(PDOException $err){
                    echo "Failed to Load books : ". $err->getMessage();
               }finally{
                $stmt = null;
               }
        }
        // return book
        public function returnBook($id){
            try{
                $db = new Database('Library', 8951);
                $pdo = $db->connect();
                $sql = "UPDATE books SET books.status = 'available' WHERE books.id = :id; UPDATE borrowings SET borrowings.return_date = CURDATE() WHERE book_id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam('id', $id, PDO::PARAM_INT);
                $stmt->execute();
                return true;
            }catch(PDOException $err){
                echo "Failed to return the book :". $err->getMessage();
            }
        }
            
        
    }