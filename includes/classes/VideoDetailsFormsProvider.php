<?php

class VideoDetailsFormProvider{
        private $con;

        public function __construct($con)
        {
            $this->con = $con;
        }



    public function createUploadForm(){
        $fileInput = $this->createFileInput();
        $titleInput = $this->createTitleInput();
        $descriptionInput = $this->createDescriptionInput();
        $privacyInput = $this-> createPrivacyInput();
        $catergoriesInput = $this->createCategoriesInput();
        $uploadButton = $this->createUploadButton();
        return "<form action='processing.php' method='POST'>
                    $fileInput
                    $titleInput
                    $descriptionInput
                    $privacyInput
                    $catergoriesInput
                    $uploadButton
                </form>";
    }

    private function createFileInput(){


    return "<div class='form-group' id='form1' >
             <label for='exampleFormControlFile1'></label>
             <input type='file' class='form-control-file' id='exampleFormControlFile1' name='fileInput' required>
            </div>";
    }

    private function createTitleInput(){
        return "<div class='form-group' id='form2'>
                    <input class='form-control' type='text' placeholder='Title' name='titleInput'>
                </div>";           
    }

    private function createDescriptionInput(){
        return "<div class='form-group' id='form3'>
                    <textarea class='form-control' placeholder='Description' name='descriptionInput' rows='3'></textarea>
                </div>";           
    }

    private function createPrivacyInput(){
        return "<div class='form-group' id='form4'>
                        <select class='form-control' name'privacyInput'>
                            <option value='0'>Private</option>
                            <option value='1'>Public</option>
                        </select>
                </div>";
    }

    private function createCategoriesInput(){
        $query = $this->con->prepare("SELECT * FROM categories");
        $query->execute();

        $html = "<div class='form-group' id='form5'>
                   <select class='form-control' name'categoriesInput'>";

        while($row =$query->fetch(PDO::FETCH_ASSOC)){
            $name = $row["name"];
            $id = $row["id"];

            $html .="<option value='$id'>$name</option>";
            }

        $html .= "</select>
                </div>";    
            return $html;
    }

    private function createUploadButton(){
        return "<div class='d-grid gap-2'> 
                    <button type'submit' class='btn btn-primary' name='uploadButton' id='form6'>Upload</submit>
                </div>"; //This Div allows for the button to be spread out accross the whole upload box
        
    }


}


?>