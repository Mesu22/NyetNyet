<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $protocol = 'smtp';
    public $SMTPHost = 'smtp.gmail.com';
    public $SMTPUser = 'mesab520@gmail.com';
    public $SMTPPass = 'wirosaban22';
    public $SMTPPort = 587;
    public $SMTPCrypto = 'tsl';
    public $mailType = 'html';
}
