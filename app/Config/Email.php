<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $fromEmail = 'mesab520@gmail.com';
    public $fromName = 'Mesa';
    public $recipients = '';

    public $protocol = 'smtp';
    public $SMTPHost = 'smtp.gmail.com';
    public $SMTPUser = 'mesab520@gmail.com';
    public $SMTPPass = 'wirosaban22'; // Ganti dengan password aplikasi Gmail Anda
    public $SMTPPort = 587;
    public $SMTPCrypto = 'tls';

    public $mailType = 'text'; // atau 'text' untuk email biasa
    public $charset = 'utf-8';
    public $wordWrap = true;
}
