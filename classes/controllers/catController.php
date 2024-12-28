


<?php 
    require '../../classes/models/Categorie.php';
    class catController {
        private $validateErrors = ['name' => '','general'=> ''];
        private $isValid = true;


        // add Cat
        public function createCat($name){
            $name = $this->sanitizeInput($name);
            $this->isEmpty($name);

            if(!$this->isValid){
                return $this->validateErrors;
            }

            $cat = new Categorie();
            try {
                $cat->addCategorie($name);
                return true;
            } catch (Exception $e) {
                $this->validateErrors['general'] = 'Failed To add the Cat';
                return $this->validateErrors;
            }
        }
        // get cats
        public function getAllCats(){
            $cat = new Categorie();
            return $cat->getCats();
        }
        // check if the input is valid
        public function isEmpty($data){
            if (empty($data)){
                $this->validateErrors['name'] = "Categorie name is required";
                $this->isValid = false;
            }
        }
        public function sanitizeInput($data) {
            return htmlspecialchars(trim($data));
        }

    }