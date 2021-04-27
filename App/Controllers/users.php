<?php

use \App\Core\Controller;
use \App\Auth;

class Users extends Controller
{
    
    public function cadastrar(){
        
        Auth::checkLogin();
        Auth::checkLoginAdmin();

        $mensagem = array();

        if(isset($_POST['cadastrar'])){

            if(empty($_POST['email']) or empty($_POST['senha']) or empty($_POST['nome'])){

                $mensagem[] = "O campo nome, email e senha são obrigatorios";

            }else{


                $storage = new \Upload\Storage\FileSystem('imagemUsuarios');
                $file = new \Upload\File('imagem', $storage);

                // Optionally you can rename the file on upload
                $new_filename = uniqid();
                $file->setName($new_filename);

                // Validate file upload
                // MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
                $file->addValidations(array(
                    // Ensure file is of type "image/png"
                    //new \Upload\Validation\Mimetype('image/png'),

                    //You can also add multi mimetype validation
                    new \Upload\Validation\Mimetype(array('image/png', 'image/gif', 'image/jpeg')),

                    // Ensure file is no larger than 5M (use "B", "K", M", or "G")
                    new \Upload\Validation\Size('5M')
                ));

                // Access data about the file that has been uploaded
                $data = array(
                    'name'       => $file->getNameWithExtension(),
                    'extension'  => $file->getExtension(),
                    'mime'       => $file->getMimetype(),
                    'size'       => $file->getSize(),
                    'md5'        => $file->getMd5(),
                    'dimensions' => $file->getDimensions()
                );

                // Try to upload file
                try {
                    // Success!
                    $file->upload();
                    $mensagem[] = "M.toast({html: 'Upload realizado com sucesso', classes: 'rounded, blue'});";
                    $nome =$_POST['nome'];
                    $email =$_POST['email'];
                    $senha =password_hash($_POST['senha'], PASSWORD_DEFAULT);
                    $user = $this->model('User');
                    $user->nome = $nome;
                    $user->email = $email;
                    $user->senha = $senha;
                    $user->imagemUsuario = $data['name'];
    
                    $mensagem[] = $user->save();

                } catch (\Exception $e) {
                    // Fail!
                    $errors = $file->getErrors();
                    $mensagem[] = implode("<br>", $errors) ;


                }


                
            }
            
        }

        $this->view('users/cadastrar', $dados =['mensagem' => $mensagem]);

    }

}