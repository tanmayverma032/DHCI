<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class GalleryController extends BaseController
{
    protected $galleryModel;

    public function __construct()
    {
        $this->galleryModel = new \App\Models\GalleryModel();
    }

    // Sanitize text
    public function sanitize($string = "")
    {
        return htmlspecialchars(addslashes($string));
    }

    // ------------------------------------
    // LIST PAGE
    // ------------------------------------
    public function index()
    {
        $data['gallery'] = $this->galleryModel->findAll();
        // var_dump( $data['gallery'] ); exit;
        return view('admin/imggallery/galleryindex', $data);
    }

    // ------------------------------------
    // ADD FORM VIEW
    // ------------------------------------
    public function create()
    {
        return view('admin/imggallery/add-gallery', ['editdata' => null]);
    }

    // ------------------------------------
    // STORE IMAGE
    // ------------------------------------
    public function store()
    {
        $id     = $this->request->getPost('id');
        $title  = $this->sanitize($this->request->getPost('title'));
        $alt    = $this->sanitize($this->request->getPost('alt'));
        $status = $this->request->getPost('status');

        $img     = $this->request->getFile('image');
        $newName = "";

        // If editing, fetch old data
        $existing = null;
        if ($id) {
            $existing = $this->galleryModel->find($id);
        }

        // Upload Image
        if ($img && $img->isValid() && ! $img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move('uploads/gallery', $newName);

            // delete old image if exists
            if ($id && ! empty($existing['image']) && file_exists('uploads/gallery/' . $existing['image'])) {
                unlink('uploads/gallery/' . $existing['image']);
            }
        } else {
            // keep existing image if not uploading new
            if ($id) {
                $newName = $existing['image'];
            }
        }

        // Data to insert/update
        $data = [
            'title'  => $title,
            'alt'    => $alt,
            'image'  => $newName,
            'status' => $status,
        ];

        if ($id) {
            $this->galleryModel->update($id, $data);
            return redirect()->to('/admin/gallery')->with('msg', 'Gallery updated successfully');
        } else {
            $this->galleryModel->insert($data);
            return redirect()->to('/admin/gallery')->with('msg', 'Image added successfully');
        }
    }

    // ------------------------------------
    // EDIT FORM VIEW
    // ------------------------------------
    public function edit($id)
    {
        $editdata = $this->galleryModel->find($id);

        return view('admin/imggallery/add-gallery', ['editdata' => $editdata]);
    }

    // ------------------------------------
    // UPDATE IMAGE
    // ------------------------------------
    public function update($id)
    {
        $title = $this->sanitize($this->request->getPost('title'));
        $alt   = $this->sanitize($this->request->getPost('alt'));

        $oldData = $this->galleryModel->find($id);
        $img     = $this->request->getFile('image');
        $newName = $oldData['image'];

        // If new file uploaded
        if ($img && $img->isValid() && ! $img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move('uploads/gallery', $newName);

            // delete old image
            if (! empty($oldData['image']) && file_exists('uploads/gallery/' . $oldData['image'])) {
                unlink('uploads/gallery/' . $oldData['image']);
            }
        }

        $this->galleryModel->update($id, [
            'title' => $title,
            'alt'   => $alt,
            'image' => $newName,
        ]);

        return redirect()->to('/admin/gallery')->with('msg', 'Updated successfully');
    }

    // ------------------------------------
    // DELETE IMAGE
    // ------------------------------------
        public function delete($id)
        {
            
            $oldData = $this->galleryModel->find($id);

            if ($oldData) {
                // Delete image file
                if (! empty($oldData['image']) && file_exists('uploads/gallery/' . $oldData['image'])) {
                    unlink('uploads/gallery/' . $oldData['image']);
                }

                // Delete DB row
                $this->galleryModel->delete($id);
            }

            return redirect()->to('/admin/gallery')->with('msg', 'Deleted successfully');
        }
}
