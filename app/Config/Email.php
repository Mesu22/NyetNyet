<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $fromEmail = 'mesab520@gmail.com';
    public $fromName = 'Nyet Nyet';
    public $recipients = '';

    public $protocol = 'smtp';
    public $SMTPHost = 'smtp.gmail.com';
    public $SMTPUser = 'mesab520@gmail.com';
    public $SMTPPass = 'wirosaban22';
    public $SMTPPort = 587;
    public $SMTPCrypto = 'tls';

    public $mailType = 'html'; // atau 'text' untuk email biasa
    public $charset = 'utf-8';
    public $wordWrap = true;
}