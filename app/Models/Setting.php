<?php

namespace App\Models;

use CodeIgniter\Model;

class Setting extends Model
{
    protected $table            = 'settings';
    protected $allowedFields    = ['site_name','site_title','description','site_logo','site_fav','number','email','address','map_link','smtp_host','smtp_user','smtp_pass','smtp_port','smtp_encryption'];
}
