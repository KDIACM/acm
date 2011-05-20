<?php

class RVJ_ImageResize {
  
  
   var $strOriginalImagePath;
  
   var $strResizedImagePath;
  
   var $arrOriginalDetails;
  
   var $arrResizedDetails;
  
   var $resOriginalImage; 
  

   var $resResizedImage;
  
   var $boolProtect = true;  
  
   /*  
   *  
   *   @Method:      __constructor  
   *   @Parameters:   5
  
   *   @Param-1:      strPath - String - The path to the image
  
   *   @Param-2:      strSavePath - String - The path to save the new image to 
  

   *   @Param-3:      strType - String - The type of resize you want to perform
  
   *   @Param-4:      value - Number/Array - The resize dimensions  
   *   @Param-5:      boolProect - Boolen - Protects the image so that it doesnt resize an image if its already smaller  
   *   @Description:   Calls the RVJ_Pagination method so its php 4 compatible  
   *  
   */
  
   function __constructor($strPath, $strSavePath, $strType = 'W', $value = '150', $boolProtect = true){
  
      $this->RVJ_ImageResize($strPath, $strSavePath, $strType, $value); 
  

   }
  
   
  
   /*  
   *  
   *   @Method:      RVJ_ImageResize  
   *   @Parameters:   5
  
   *   @Param-1:      strPath - String - The path to the image
  
   *   @Param-2:      strSavePath - String - The path to save the new image to
  
   *   @Param-3:      strType - String - The type of resize you want to perform 
  

   *   @Param-4:      value - Number/Array - The resize dimensions  
   *   @Param-5:      boolProect - Boolen - Protects the image so that it doesnt resize an image if its already smaller  
   *   @Description:   Calls the RVJ_Pagination method so its php 4 compatible  
   *  
   */
  
   function RVJ_ImageResize($strPath, $strSavePath, $strType = 'W', $value = '150', $boolProtect = true){
  
      //save the image/path details
  
      $this->strOriginalImagePath = $strPath;
  
      $this->strResizedImagePath = $strSavePath; 
  

      $this->boolProtect = $boolProtect;  
      
  
      //get the image dimensions
  
      $this->arrOriginalDetails = getimagesize($this->strOriginalImagePath);
  
      $this->arrResizedDetails = $this->arrOriginalDetails;
  
      
  
      //create an image resouce to work with
  
      $this->resOriginalImage = $this->createImage($this->strOriginalImagePath);
  
                                           
  

      //select the image resize type
  
      switch(strtoupper($strType)){
  
         case 'P':
  
            $this->resizeToPercent($value);
  
            break;
  
         case 'H':
  
            $this->resizeToHeight($value);
  
            break;
  
         case 'C':
  
            $this->resizeToCustom($value);
  
            break;
  
         case 'W':
  
         default:
  
            $this->resizeToWidth($value); 
  

            break;
  
      }  
   }
  
  
   /*  
   *  
   *   @Method:      findResourceDetails  
   *   @Parameters:   1  
   *   @Param-1:      resImage - Resource - The image resource you want details on  
   *   @Description:   Returns an array of details about the resource identifier that you pass it  
   *  
   */ 
  

   function findResourceDetails($resImage){
  
      //check to see what image is being requested
  
      if($resImage==$this->resResizedImage){                              
  
         //return new image details
  
         return $this->arrResizedDetails;
  
      }else{
  
         //return original image details
  
         return $this->arrOriginalDetails;
  
      }
  
   }
  
  
   /*  
   *  
   *   @Method:      updateNewDetails     
   *   @Parameters:   0  
   *   @Description:   Updates the width and height values of the resized details array  
   *  
   */ 
  

   function updateNewDetails(){
  
      $this->arrResizedDetails[0] = imagesx($this->resResizedImage);
  
      $this->arrResizedDetails[1] = imagesy($this->resResizedImage);
  
   }
  
      
  
   /*  
   *  
   *   @Method:      createImage  
   *   @Parameters:   1  
   *   @Param-1:      strImagePath - String - The path to the image  
   *   @Description:   Created an image resource of the image path passed to it  
   *  
   */ 
  

   function createImage($strImagePath){
  
      //get the image details
  
      $arrDetails = $this->findResourceDetails($strImagePath);
  
        
      //choose the correct function for the image type  
      switch($arrDetails['mime']){
  
         case 'image/jpeg':
  
            return imagecreatefromjpeg($strImagePath);
  
            break;
  
         case 'image/png':
  
            return imagecreatefrompng($strImagePath);
  
            break;
  
         case 'image/gif':
  
            return imagecreatefromgif($strImagePath);
  
            break;
  
      }
  
   } 
  

      
  
   /*  
   *  
   *   @Method:      saveImage  
   *   @Parameters:   1  
   *   @Param-1:      numQuality - Number - The quality to save the image at  
   *   @Description:   Saves the resize image  
   *  
   */ 
  

   function saveImage($numQuality = 85){
  
      switch($this->arrResizedDetails['mime']){
  
         case 'image/jpeg':
  
            imagejpeg($this->resResizedImage, $this->strResizedImagePath, $numQuality);
  
            break;
  
         case 'image/png':
  
            // imagepng = [0-9] (not [0-100])           
            imagepng($this->resResizedImage, $this->strResizedImagePath, 7);
  
            break;
  
         case 'image/gif':
  
            imagegif($this->resResizedImage, $this->strResizedImagePath, $numQuality); 
  

            break;
  
      }
  
   }
  
   
  
   /*  
   *  
   *   @Method:      showImage  
   *   @Parameters:   1  
   *   @Param-1:      resImage - Resource - The resource of the image you want to display  
   *   @Description:   Displays the image resouce on the screen  
   *  
   */ 
  

   function showImage($resImage){
  
      //get the image details
  
      $arrDetails = $this->findResourceDetails($resImage);
  
        
      //set the correct header for the image we are displaying  
      header("Content-type: ".$arrDetails['mime']);
  
        
      switch($arrDetails['mime']){
  
         case 'image/jpeg':
  
            return imagejpeg($resImage);
  
            break;
  
         case 'image/png':
  
            return imagepng($resImage);
  
            break;
  
         case 'image/gif':
  
            return imagegif($resImage); 
  

            break;
  
      }
  
   }
  
   
  
   /*  
   *  
   *   @Method:      destroyImage  
   *   @Parameters:   1  
   *   @Param-1:      resImage - Resource - The image resource you want to destroy  
   *   @Description:   Destroys the image resource and so cleans things up  
   *  
   */ 
  

   function destroyImage($resImage){
  
      imagedestroy($resImage);
  
   }
  
   
  
   /*  
   *  
   *   @Method:      _resize  
   *   @Parameters:   2  
   *   @Param-1:      numWidth - Number - The width of the image in pixels  
   *   @Param-2:      numHeight - Number - The height of the image in pixes  
   *   @Description:   Resizes the image by creatin a new canvas and copying the image over onto it. DONT CALL THIS METHOD DIRECTLY - USE THE METHODS BELOW  
   *  
   */ 
  

   function _resize($numWidth, $numHeight){
  
      //check for image protection  
      if($this->_imageProtect($numWidth, $numHeight)){     
         if($this->arrOriginalDetails['mime']=='image/gif'){
  
            //GIF image
  
            $this->resResizedImage = imagecreate($numWidth, $numHeight);
  
         }else if($this->arrOriginalDetails['mime']=='image/jpeg'){
  
            //JPG image
  
            $this->resResizedImage = imagecreatetruecolor($numWidth, $numHeight);
  
         }else if($this->arrOriginalDetails['mime']=='image/png'){  
            //PNG image  
            $this->resResizedImage = imagecreatetruecolor($numWidth, $numHeight);  
            imagecolortransparent($this->resResizedImage, imagecolorallocate($this->resResizedImage, 0, 0, 0));  
            imagealphablending($this->resResizedImage, false);  
            imagesavealpha($this->resResizedImage, true);  
         }  
     
         //update the image size details  
         $this->updateNewDetails();  
        
         //do the actual image resize  
         imagecopyresized($this->resResizedImage, $this->resOriginalImage, 0, 0, 0, 0, $numWidth, $numHeight, $this->arrOriginalDetails[0], $this->arrOriginalDetails[1]); 
  

  
         //saves the image  
         $this->saveImage();  
      }  
   }
  
  
   /*  
   *  
   *   @Method:      _imageProtect  
   *   @Parameters:   2  
   *   @Param-1:      numWidth - Number - The width of the image in pixels  
   *   @Param-2:      numHeight - Number - The height of the image in pixes  
   *   @Description:   Checks to see if we should allow the resize to take place or not depending on the size the image will be resized to  
   *  
   */     
   function _imageProtect($numWidth, $numHeight){  
      if($this->boolProtect AND ($numWidth > $this->arrOriginalDetails[0] OR $numHeight > $this->arrOriginalDetails[1])){  
         return 0;  
      }  
        
      return 1;  
   }  
    
  

   /*  
   *  
   *   @Method:      resizeToWidth  
   *   @Parameters:   1  
   *   @Param-1:      numWidth - Number - The width to resize to in pixels  
   *   @Description:   Works out the height value to go with the width value passed, then calls the resize method.  
   *  
   */
  
   function resizeToWidth($numWidth){ 
  

      $numHeight=(int)(($numWidth*$this->arrOriginalDetails[1])/$this->arrOriginalDetails[0]);
  
      $this->_resize($numWidth, $numHeight);   
  
   }
  
  
   /*  
   *  
   *   @Method:      resizeToHeight  
   *   @Parameters:   1  
   *   @Param-1:      numHeight - Number - The height to resize to in pixels  
   *   @Description:   Works out the width value to go with the height value passed, then calls the resize method.  
   *  
   */ 
  

   function resizeToHeight($numHeight){
  
      $numWidth=(int)(($numHeight*$this->arrOriginalDetails[0])/$this->arrOriginalDetails[1]);
  
      $this->_resize($numWidth, $numHeight);   
  
   }
  
   
  
   /*  
   *  
   *   @Method:      resizeToPercent  
   *   @Parameters:   1  
   *   @Param-1:      numPercent - Number - The percentage you want to resize to  
   *   @Description:   Works out the width and height value to go with the percent value passed, then calls the resize method.  
   *  
   */ 
  

   function resizeToPercent($numPercent){
  
      $numWidth = (int)(($this->arrOriginalDetails[0]/100)*$numPercent);
  
      $numHeight = (int)(($this->arrOriginalDetails[1]/100)*$numPercent);
  
      $this->_resize($numWidth, $numHeight);   
  
   }
  
  
   /*  
   *  
   *   @Method:      resizeToCustom  
   *   @Parameters:   1  
   *   @Param-1:      size - Number/Array - Either a number of array of numbers for the width and height in pixels  
   *   @Description:   Checks to see if array was passed and calls the resize method with the correct values.  
   *  
   */ 
  

   function resizeToCustom($size){
  
      if(!is_array($size)){
  
         $this->_resize((int)$size, (int)$size);
  
      }else{
  
         $this->_resize((int)$size[0], (int)$size[1]);
  
      }
  
   }
  
   
  
}

?>