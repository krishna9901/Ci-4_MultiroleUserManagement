<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Upload extends BaseConfig
{
    // The directory where uploaded files will be stored.
    public $storePath = WRITEPATH . 'uploads';

    // Maximum allowed file size in kilobytes (KB). Set to 0 for no limit.
    public $maxSize = 0;

    // Allowed file types. An empty array means all file types are allowed.
    public $allowedTypes = ['jpg', 'jpeg', 'png', 'gif','pdf','doc'];

    // Whether to enforce a file extension on uploaded files.
    public $detectMimeType = true;

    // Whether to validate the uploaded file's image dimensions.
    public $detectImageSize = true;

    // Maximum allowed width in pixels. Set to 0 for no limit.
    public $maxWidth = 0;

    // Maximum allowed height in pixels. Set to 0 for no limit.
    public $maxHeight = 0;
}
