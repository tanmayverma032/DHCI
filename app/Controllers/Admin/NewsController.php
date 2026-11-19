<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\NewsModel;

class NewsController extends BaseController
{
    public function index($id = null)
    {
        $model = new NewsModel();

        $data['news'] = $model->orderBy('id','DESC')->findAll();

        if($id){
            $data['editdata'] = $model->find($id);
        }

        return view('admin/news/index', $data);
    }

    // Store new news
    public function store()
    {
        $file = $this->request->getFile('pdf_file');
        $fileName = '';

        if($file && $file->isValid()){
            $fileName = $file->getRandomName();
            $file->move('uploads/news', $fileName);
        }

        $model = new NewsModel();
        $model->save([
            'title' => $this->request->getPost('title'),
            'department' => $this->request->getPost('department'),
            'publish_date' => $this->request->getPost('publish_date'),
            'pdf_file' => $fileName,
            'is_new' => $this->request->getPost('is_new'),
            'status' => 1
        ]);

        return redirect()->to('/admin/news');
    }

    // Update existing news
    public function update($id)
    {
        $model = new NewsModel();
        $file = $this->request->getFile('pdf_file');
        $fileName = $this->request->getPost('old_pdf');

        if($file && $file->isValid()){
            $fileName = $file->getRandomName();
            $file->move('uploads/news', $fileName);
        }

        $model->update($id, [
            'title' => $this->request->getPost('title'),
            'department' => $this->request->getPost('department'),
            'publish_date' => $this->request->getPost('publish_date'),
            'pdf_file' => $fileName,
            'is_new' => $this->request->getPost('is_new')
        ]);

        return redirect()->to('/admin/news');
    }

    // Delete news
    public function delete($id)
    {
        $model = new NewsModel();
        $model->delete($id);
        return redirect()->to('/admin/news');
    }
}
