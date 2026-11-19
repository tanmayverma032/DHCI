<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;



class BlogsController extends BaseController
{

    public function __construct()
    {
        $this->BlogsModel = new \App\Models\BlogsModel();
        
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
        return view('admin/blogs/add_blog');
    }

    // View Blogs
    public function viewBlog()
    {
        $blog = $this->BlogsModel->findAll();
        return view('admin/blogs/blogs', ['data' => $blog]);
    }


    // Blog content Action
    public function blogAction()
    {
        $btn = $this->request->getPost("blog_btn");
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
            $result = $this->BlogsModel->save($data_to_insert);

            if ($result) {
                return redirect()->back()->with("success", "Blog created Successfully.");
            } else {
                return redirect()->back()->with("error", "Something went wrong");
            }
        }
    }

    public function editBlog($blogId)
    {
        $blogData  = $this->BlogsModel->find($blogId);
        if (!$blogId) {
            $this->session->setFlashdata('error', lang("Blog not found."));
            return redirect()->back();
        }
        return view('admin/blogs/edit_blog', ['blogData' => $blogData]);
    }

    public function updateBlog()
    {
        $dataToUpdate['id'] = $this->request->getPost("blog_id");
        $dataToUpdate['title'] = $this->request->getPost("title");
        $dataToUpdate['slug'] = $this->request->getPost("slug");
        $dataToUpdate['author'] = $this->request->getPost("author");
        $dataToUpdate['content'] = $this->request->getPost("content");
        $thumbnailFile = $this->request->getFile('thumbnail');

        try {
            $existingData = $this->BlogsModel->find($dataToUpdate['id']);
            if ($thumbnailFile->isValid() && !$thumbnailFile->hasMoved()) {
                if ($existingData['thumbnail'] && file_exists($existingData['thumbnail'])) {
                    unlink($existingData['thumbnail']);
                }

                $thumbnailFileName = $thumbnailFile->getRandomName();
                $thumbnailFile->move('public/uploads/thumbnail/', $thumbnailFileName);
                $dataToUpdate["thumbnail"] = 'public/uploads/thumbnail/' . $thumbnailFileName;
            }

            $result = $this->BlogsModel->save($dataToUpdate);
            if ($result) {
                return redirect()->back()->with('success', ' Updated Successfully');
            }
        } catch (\Exception $th) {
            return $th->getMessage();
            //return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function blogDelete($id)
    {
        if ($this->BlogsModel->delete($id)) {
            session()->setFlashdata("success", "Deleted Successfully");
        } else {
            session()->setFlashdata("error", "Something Went Wrong!!");
        }
    
        return redirect()->back();
    }
   
   

    
   
   
}
