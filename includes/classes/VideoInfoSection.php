<?php
require_once("includes/classes/VideoInfoControls.php"); 
class VideoInfoSection{

    private $con, $video, $userLoggedInObj;

    public function __construct($con, $video, $userLoggedInObj){
        $this->video=$video;
        $this->con=$con;
        $this->userLoggedInObj=$userLoggedInObj;
    }

    // This create() Function is used to call all the sub-section functions that will creat the overall video information section 
    //Containing the video title and the view count.. it simply just calls the functions that are really creating the 2 sections
    public function create(){
        return $this->createPrimaryInfo() . $this->createSecondaryInfo();   //This appends the 2 function calls for the different sections of the video info part
    }



//This function is responsible for creating the first part of the video info section containing the title and video count
//We use specialised functions from other class like the video class to collect and store data in variables than use those varribles in html elements 
                
private function createPrimaryInfo(){
                        $title = $this->video->getTitle();  // Calls the getTitle function and stores the value of the title in the variable title to make use of it in the html return call
                        $views = $this->video->getViews(); // Calls the getViews function and stores it in the views varriable to resuse it in the html tags
                    
                        $videoInfoControls = new VideoInfoControls($this->video, $this->userLoggedInObj);
                        $controls = $videoInfoControls->create();

                            return "<div class='videoInfo'>  
                                    
                                            <h1>$title</h1>

                                            <div class='bottomSection'>
                                            <span class='viewCount'>$views views</span>
                                            $controls
                                            </div>

                                    </div>";  //Returns the html elements that will render the title and view count on the screen.
 }  
                    
    
 private function createSecondaryInfo(){
        
        $description = $this->video->getDescription();
        $uploadDate = $this->video->getUploadDate();
        $uploadedBy = $this->video->getUploadedBy();
        $profileButton = ButtonProvider::createUserProfileButton($this->con, $uploadedBy);
        

        if($uploadedBy == $this->userLoggedInObj->getUsername()){

            $actionButton = ButtonProvider:: createEditVideoButton($this->video->getId());
        } 
        else{
                $qctionButton = "";
        }

    return "<div class='secondaryInfo'>
                <div class='topRow'>
                $profileButton

                <div class = 'uploadInfo'>
                    <span class='owner'>
                        <a href='profile.php?username='$uploadedBy'>
                            $uploadedBy
                    </span> 
                    <span class='date'>Published on $uploadDate</span>
                </div>
                    $actionButton
                </div>
             </div>";
 }


    


        }
?>