<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


/*********************** Model  ********************/
use App\Models\AdminModel;
use Config\App;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    protected $helpers = ["form", "auth", "inflector", "string", "user","url","html","form_validation","app"];
    protected $session;
    protected $security;
    protected $validation;
    protected $AdminModel;
    protected $Upload;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->session = \Config\Services::session();
        $this->security = \Config\Services::security();
        $this->validation = \Config\Services::validation();
        $this->db = \Config\Database::connect();

        // $this->isAdmin = new App\Helpers\auth_helper();
        

        // ******************** Modal Load ***************************//
        $this->AdminModel = new AdminModel();
        $this->Upload = new \App\Controllers\ImageUpload();

    }
}
