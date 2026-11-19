<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EventModel;

class Event extends BaseController
{
    public function index()
    {
        $model = new EventModel();
        $data['events'] = $model->findAll();
        return view('admin/event/index', $data);
    }

    public function store()
    {
        $model = new EventModel();

        $image = $this->request->getFile('image');
        $imageName = '';

        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/events/', $imageName);
        }

        $model->save([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'event_date'  => $this->request->getPost('event_date'),
            'image'       => $imageName,
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('admin/event')->with('success','Event Added Successfully');
    }

    public function delete($id)
    {
        $model = new EventModel();
        $model->delete($id);
        return redirect()->to('admin/event');
    }
}