<?php
class ButtonProvider{
    //NB This class wont have a constractor it will caryy static functions and we wont 
    //have to create instances of this class to use them

    public static function createButton($text, $imageSrc, $action, $class){

        $image = ($imageSrc == null) ? "" : "<img src='$imageSrc'>";

        // Change action if needed


        return "<button class='$class' onclick='$action'>
                    $image
                    <span class='text'>$text</span>
                    
                </button>";

    }
}
?>
