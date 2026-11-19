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

    /**
     * Ensure gallery table has all needed columns (type, video_url, status)
     */
    protected function ensureTableSchema(): void
    {
        try {
            $db = \Config\Database::connect();
            $forge = \Config\Database::forge();

            if (! $db->tableExists('gallery')) {
                $forge->addField([
                    'id' => [
                        'type'           => 'INT',
                        'constraint'     => 11,
                        'unsigned'       => true,
                        'auto_increment' => true,
                    ],
                    'title' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 255,
                        'null'       => true,
                    ],
                    'alt' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 255,
                        'null'       => true,
                    ],
                    'image' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 255,
                        'null'       => true,
                    ],
                    'video_url' => [
                        'type' => 'TEXT',
                        'null' => true,
                    ],
                    'type' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 30,
                        'default'    => 'image',
                    ],
                    'status' => [
                        'type'       => 'TINYINT',
                        'constraint' => 1,
                        'default'    => 1,
                    ],
                    'created_at' => [
                        'type' => 'DATETIME',
                        'null' => true,
                    ],
                    'updated_at' => [
                        'type' => 'DATETIME',
                        'null' => true,
                    ],
                ]);
                $forge->addKey('id', true);
                $forge->createTable('gallery', true);
            } else {
                $fields = $db->getFieldNames('gallery');
                $newFields = [];

                if (! in_array('video_url', $fields, true)) {
                    $newFields['video_url'] = [
                        'type' => 'TEXT',
                        'null' => true,
                    ];
                }
                if (! in_array('type', $fields, true)) {
                    $newFields['type'] = [
                        'type'       => 'VARCHAR',
                        'constraint' => 30,
                        'default'    => 'image',
                    ];
                }
                if (! in_array('status', $fields, true)) {
                    $newFields['status'] = [
                        'type'       => 'TINYINT',
                        'constraint' => 1,
                        'default'    => 1,
                    ];
                }

                if (! empty($newFields)) {
                    $forge->addColumn('gallery', $newFields);
                }
            }
        } catch (\Throwable $e) {
            log_message('error', 'Gallery schema check error: ' . $e->getMessage());
        }
    }

    // Sanitize text
    public function sanitize($string = "")
    {
        return htmlspecialchars(trim((string)$string));
    }

    // ------------------------------------
    // LIST PAGE
    // ------------------------------------
    public function index()
    {
        $this->ensureTableSchema();
        $data['gallery'] = $this->galleryModel->orderBy('id', 'DESC')->findAll();
        return view('admin/imggallery/galleryindex', $data);
    }

    // ------------------------------------
    // ADD FORM VIEW
    // ------------------------------------
    public function create()
    {
        $this->ensureTableSchema();
        return view('admin/imggallery/add-gallery', ['editdata' => null]);
    }

    // ------------------------------------
    // STORE IMAGE OR VIDEO
    // ------------------------------------
    public function store()
    {
        $this->ensureTableSchema();

        $id       = $this->request->getPost('id');
        $title    = $this->sanitize($this->request->getPost('title'));
        $alt      = $this->sanitize($this->request->getPost('alt'));
        $type     = $this->request->getPost('type') ? trim((string)$this->request->getPost('type')) : 'image';
        $videoUrl = trim((string)$this->request->getPost('video_url'));
        $status   = $this->request->getPost('status') !== null ? (int)$this->request->getPost('status') : 1;

        $existing = null;
        if ($id) {
            $existing = $this->galleryModel->find($id);
        }

        $fileName = $existing['image'] ?? '';

        // Check if a file was uploaded (image or video file)
        $file = $this->request->getFile('media_file') ?? $this->request->getFile('image');

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $ext = strtolower($file->getClientExtension());
            $newName = $file->getRandomName();

            $uploadDir = FCPATH . 'uploads/gallery';
            if (! is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $file->move($uploadDir, $newName);

            // Delete old file if present
            if ($id && ! empty($existing['image']) && file_exists($uploadDir . '/' . $existing['image'])) {
                @unlink($uploadDir . '/' . $existing['image']);
            }

            $fileName = $newName;

            // Auto-detect video from extension
            if (in_array($ext, ['mp4', 'webm', 'mov', 'avi', 'mkv', 'ogg'])) {
                $type = 'video';
            }
        }

        // If video URL provided, type is video
        if (! empty($videoUrl)) {
            $type = 'video';
        }

        $data = [
            'title'      => $title,
            'alt'        => $alt,
            'type'       => $type,
            'video_url'  => $videoUrl,
            'image'      => $fileName,
            'status'     => $status,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($id) {
            $this->galleryModel->update($id, $data);
            return redirect()->to(site_url('admin/gallery'))->with('msg', 'Gallery item updated successfully');
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->galleryModel->insert($data);
            $itemLabel = ($type === 'video') ? 'Video' : 'Photo';
            return redirect()->to(site_url('admin/gallery'))->with('msg', $itemLabel . ' added successfully to gallery');
        }
    }

    // ------------------------------------
    // EDIT FORM VIEW
    // ------------------------------------
    public function edit($id)
    {
        $this->ensureTableSchema();
        $editdata = $this->galleryModel->find($id);

        if (! $editdata) {
            return redirect()->to(site_url('admin/gallery'))->with('error', 'Gallery item not found');
        }

        return view('admin/imggallery/add-gallery', ['editdata' => $editdata]);
    }

    // ------------------------------------
    // UPDATE
    // ------------------------------------
    public function update($id)
    {
        // Re-use store logic by populating id
        $_POST['id'] = $id;
        return $this->store();
    }

    // ------------------------------------
    // DELETE
    // ------------------------------------
    public function delete($id)
    {
        $oldData = $this->galleryModel->find($id);

        if ($oldData) {
            if (! empty($oldData['image']) && file_exists(FCPATH . 'uploads/gallery/' . $oldData['image'])) {
                @unlink(FCPATH . 'uploads/gallery/' . $oldData['image']);
            }

            $this->galleryModel->delete($id);
        }

        return redirect()->to(site_url('admin/gallery'))->with('msg', 'Item deleted successfully');
    }
}
