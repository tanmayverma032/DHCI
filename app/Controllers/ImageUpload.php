<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\I18n\Time;
use CodeIgniter\Files\File;


class ImageUpload extends BaseController
{
	public $allowed_image_type = ["image/jpg", "image/jpeg", "image/png", "image/webp"];

	function __construct()
	{
		$this->today = date("Ymd");
	}

	public function upload_1280_720($images) {

	foreach ($images as $image) {

		if( ($image->getSize()/1024) > 1024)  {

			$response = 1;

			return $response;

		}
		if ( ! in_array($image->getMimeType(), $this->allowed_image_type)) {

			$response = 2;

			return $response;

		}

		        $filepath = "uploads/" . $image->store();
                $filepathAll[] = $filepath;

                if (!$image->hasMoved())
                {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', lang('Could not upload image'));
                }
                $dp_image = \Config\Services::image();
                $dp_image->withFile("writable/$filepath")->fit(1280, 720, 'center')
                    ->save("writable/$filepath");




	}

	return $filepathAll;
		 
	}



	// Upload resolution 1080/720

 public function upload_1080_720($images) {

	foreach ($images as $image) {

		if( ($image->getSize()/1024) > 1024)  {

			$response = 1;

			return $response;

		}
		if ( ! in_array($image->getMimeType(), $this->allowed_image_type)) {

			$response = 2;

			return $response;

		}

		        $filepath = "uploads/" . $image->store();
                $filepathAll[] = $filepath;

                if (!$image->hasMoved())
                {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', lang('Could not upload image'));
                }
                $dp_image = \Config\Services::image();
                $dp_image->withFile("writable/$filepath")->fit(1080, 720, 'center')
                    ->save("writable/$filepath");




	}

	return $filepathAll;
		 
	}


		// Upload resolution 1080/720 single

           public function upload_1080_720_single($image) {

	 

		if( ($image->getSize()/1024) > 1024)  {

			$response = 1;

			return $response;

		}
		if ( ! in_array($image->getMimeType(), $this->allowed_image_type)) {

			$response = 2;

			return $response;

		}

		        $filepath = "uploads/" . $image->store();
                //$filepathAll[] = $filepath;

                if (!$image->hasMoved())
                {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', lang('Could not upload image'));
                }
                $dp_image = \Config\Services::image();
                $dp_image->withFile("writable/$filepath")->fit(1080, 720, 'center')
                    ->save("writable/$filepath");


	     return $filepath;
		 
	}
	
	 public function upload_single($image) {

	 

		if( ($image->getSize()/1024) > 1024)  {

			$response = 1;

			return $response;

		}
		if ( ! in_array($image->getMimeType(), $this->allowed_image_type)) {

			$response = 2;

			return $response;

		}

		        $filepath = $image->store("../../public/uploads/$this->today");
		        $filepath = str_replace("../../public/", "", $filepath); 

                //$filepathAll[] = $filepath;

                if (!$image->hasMoved())
                {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', lang('Could not upload image'));
                }
               

	    return $filepath;
		 
	}

	public function upload_single_1920_480($image)
	{


		if( ($image->getSize()/1024) > 1024)  {

			$response = 1;

			return $response;

		}
		if ( ! in_array($image->getMimeType(), $this->allowed_image_type)) {

			$response = 2;

			return $response;

		}

		        $filepath = $image->store("../../public/uploads/$this->today");
		        $filepath = str_replace("../../public/", "", $filepath); 
                //$filepathAll[] = $filepath;

                if (!$image->hasMoved())
                {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', lang('Could not upload image'));
                }

                $dp_image = \Config\Services::image();
                $dp_image->withFile("public/$filepath")->fit(1920, 480, 'center')
                    ->save("public/$filepath");
               

	return $filepath;
		
	}
	
	
	public function upload_single_400_500($image)
	{
		 if( ($image->getSize()/1024) > 1024)  {

			$response = 1;

			return $response;

		}
		if ( ! in_array($image->getMimeType(), $this->allowed_image_type)) {

			$response = 2;

			return $response;

		}

		        $filepath = $image->store("../../public/uploads/$this->today");
		        $filepath = str_replace("../../public/", "", $filepath); 
                //$filepathAll[] = $filepath;

                if (!$image->hasMoved())
                {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', lang('Could not upload image'));
                }

                $dp_image = \Config\Services::image();
                $dp_image->withFile("public/$filepath")->fit(400, 500, 'center')
                    ->save("public/$filepath");
               

	return $filepath;
	}
	
	
	
	
	


}