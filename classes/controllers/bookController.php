<?php 

    require '../../classes/models/Book.php';


    class bookController {

        private $validation_errors = [
            'title' => '',
            'author' => '',
            'category_name' => '',
            'cover_image' => '',
            'summary' => '',
            'general' => ''
        ];
        private $is_valid = true;
        
        // function : ajouter un Livre
        public function addBookCtr($data){
            $this->validateFormData($data);

        
            if (!$this->is_valid) {
                return $this->validation_errors;
            }

            $book = new Book();

            //  add book
            try {
                $book->addBook($data['title'], $data['author'], $data['category_id'] , $data['cover_image'], $data['summary']);
                return true;
            } catch (Exception $e) {
                $this->validation_errors['general'] = 'Failed To add the Book';
                return $this->validation_errors;
            }

            



        }
        // function to display all books in db
        public function showBooks(){
            $books = new Book();
            $rows = $books->displayBook();
            return $rows;
        }
        // get book by id
        public function getBook($id){
            $book = new Book();
            $row = $book->getBookId($id);
            return $row;
        }
        // update book
        public function updateBookCtr($data){
            $this->validateFormData($data);

        
            if (!$this->is_valid) {
                return $this->validation_errors;
            }

            $book = new Book();

            //  add book
            try {
                $book->updateBook($data['id'],$data['title'], $data['author'], $data['category_id'] , $data['cover_image'], $data['summary'], $data['status']);
                return true;
            } catch (Exception $e) {
                $this->validation_errors['general'] = 'Failed To update the Book';
                return $this->validation_errors;
            }
        }
        public function deleteBookCtr($id){
            $book = new Book();

            try {
                $book->deleteBook($id);
                return true;
            } catch (Exception $e) {
                $this->validation_errors['general'] = 'Failed To delete the Book';
                return $this->validation_errors;
            }
        }

        
        
        
        
        
        
        
        // function validation des inputs  = imputs not empty and prevent
        private function validateFormData($data) {
            // Validate Title
            if (empty($data['title'])) {
                $this->validation_errors['title'] = 'Title is required';
                $this->is_valid = false;
            }
    
            // Validate Author
            if (empty($data['author'])) {
                $this->validation_errors['author'] = 'author is required';
                $this->is_valid = false;
            } 

            // Validate Categoory
            if (empty($data['category_id'])) {
                $this->validation_errors['category_id'] = 'category is required';
                $this->is_valid = false;
            }
            
            // Validate Cover image
            if (empty($data['cover_image'])) {
                $this->validation_errors['cover_image'] = 'Image is required';
                $this->is_valid = false;
            }

            // Validate Summary
            if (empty($data['summary'])) {
                $this->validation_errors['summary'] = 'summary is required';
                $this->is_valid = false;
            }
        }
        // private function sanitizeInput($data) {
        //     return htmlspecialchars(trim($data));
        // }

    }