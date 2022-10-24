<?php

namespace App\Models;

use CodeIgniter\Model;

class modelServidorEmail extends Model
{
    protected $table = 'sysServidorSmtp';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'End',
        'Usuario',
        'Senha',
        'Porta',
        'Ssl'
    ];
    protected $returnType = 'object';

    public function envioEmail($Email, $Titulo, $Corpo)
    {
        $smtp =  $this->first();

        $this->email = \Config\Services::email();

        // $protocol = 'smtp';
        // $smtp_host = $smtp->End;
        // $smtp_port = $smtp->Porta;
        // $smtp_user = $smtp->Usuario;
        // $smtp_pass = $smtp->Senha;
        // $mailtype = 'html';
        // $charset = 'iso-8859-1';
        // $wordwrap = TRUE;
        // $crlf = "\r\n";
        // $newline = "\r\n";

        $config = array(
            'protocol' => 'smtp',
            'SMTPHost' => $smtp->End,
            'SMTPPort' => $smtp->Porta,
            'SMTPUser' => $smtp->Usuario,
            'SMTPPass' => $smtp->Senha,
            'mailType' => 'html',
        );

        $this->email->initialize($config);

        $this->email->clear();

        $this->email->setFrom($smtp->Usuario, 'EhFesta');
        $this->email->setTo($Email);
        $this->email->setSubject($Titulo);
        $this->email->setMessage($Corpo);

        // if (!$this->email->send()) {
        //     var_dump($this->email->printDebugger());
        // } else {
        //     echo 'Your e-mail has been sent!';
        // }
        // return $config;
        return $this->email->send();
    }
}
