<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;



class AboutController extends BaseController
{

    public function __construct()
    {
        $this->AboutModel = new \App\Models\AboutModel();
        
    }
    public function sanitize($stringToSanitize = false)
    {
        if (!empty($stringToSanitize)) {
            return addslashes(htmlspecialchars($stringToSanitize));
        } else {
            return "";
        }
    }

    public function index()
    {
        return view('admin/pages/add_about');
    }

    // View Blogs
    public function viewAbout()
    {
        $about = $this->AboutModel->findAll();
        return view('admin/pages/about', ['data' => $about]);
    }


       // Blog content Action
     public function aboutAction()
     {
        $btn = $this->request->getPost("about_btn");
        if (isset($btn)) {
           // Handle thumbnail image upload
            $thumbnailFile = $this->request->getFile('thumbnail');
            $thumbnailFileName = $thumbnailFile->getRandomName();
            $thumbnailFile->move('public/uploads/thumbnail/', $thumbnailFileName); // Save the thumbnail in public/uploads

           // Sanitize and prepare data for insertion into the database
            $data_to_insert = [
                "title" => $this->sanitize($this->request->getPost("title")),
                "slug" => $this->sanitize($this->request->getPost("slug")),
                "author" => $this->sanitize($this->request->getPost("author")),
                "content" => $this->sanitize($this->request->getPost("content")),
                "thumbnail" => 'public/uploads/thumbnail/' . $thumbnailFileName, // Save the thumbnail path in the database
            ];
            $result = $this->AboutModel->save($data_to_insert);

            if ($result) {
                return redirect()->back()->with("success", "About created Successfully.");
            } else {
                return redirect()->back()->with("error", "Something went wrong");
            }
        }
    }

    public function editAbout($aboutId)
    {
        $aboutData  = $this->AboutModel->find($aboutId);
        if (!$aboutId) {
            $this->session->setFlashdata('error', lang("About not found."));
            return redirect()->back();
        }
        return view('admin/pages/edit_about', ['aboutData' => $aboutData]);
    }

   public function updateAbout()
    {
        $dataToUpdate['id'] = $this->request->getPost("about_id");
        $dataToUpdate['title'] = $this->request->getPost("title");
        $dataToUpdate['slug'] = $this->request->getPost("slug");
        $dataToUpdate['content'] = $this->request->getPost("content");
        $thumbnailFile = $this->request->getFile('thumbnail');

        try {
            $existingData = $this->AboutModel->find($dataToUpdate['id']);
            if ($thumbnailFile->isValid() && !$thumbnailFile->hasMoved()) {
                if ($existingData['thumbnail'] && file_exists($existingData['thumbnail'])) {
                    unlink($existingData['thumbnail']);
                }

                $thumbnailFileName = $thumbnailFile->getRandomName();
                $thumbnailFile->move('public/uploads/thumbnail/', $thumbnailFileName);
                $dataToUpdate["thumbnail"] = 'public/uploads/thumbnail/' . $thumbnailFileName;
            }

            $result = $this->AboutModel->save($dataToUpdate);
            if ($result) {
                return redirect()->back()->with('success', ' Updated Successfully');
            }
        } catch (\Exception $th) {
            return $th->getMessage();
            //return redirect()->back()->with('error', $th->getMessage());
        }
    }

  //  public function aboutDelete()
   // {
   //     $delete_btn = $this->request->getPost("delete_btn");

      //  if ($delete_btn && $this->AboutModel->where("id", $delete_btn)->delete()) {
     //       $this->session->setFlashdata("success", lang("Deleted Successfully"));
     //   } else {
          //  $this->session->setFlashdata("error", lang("Something Went Wrong!!"));
     //   }

    //    return redirect()->back();
   // }
   
   
   public function aboutDelete()
    {
        $id = $this->request->getVar('id');
        
        $this->AboutModel->where('id', $id)->delete();
        return json_encode( array( 
            "status" => 1,
            "token" => csrf_hash()
        ));   
    }
    
   
   
}

