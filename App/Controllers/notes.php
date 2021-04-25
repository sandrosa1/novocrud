<?php

use \App\Core\Controller;
use \App\Auth;

class Notes extends Controller {

    /**
     * Método responsável por levar os dados para home/index
     *
     * @param string $nome
     * @return void
     */
    public function ver($id = ''){

        $note = $this->model('Note');
        $dados = $note->findId($id);

    
        $this->view('notes/ver',$dados);

    }

    /**
     * Método responsavel pela capiturar os dados do bloco de anotação
     *
     * @return void
     */
    public function criar(){

        Auth::checkLogin();

        $mensagem = array();
        
        /**
         * Se houver ação envai para view
         */
        if(isset($_POST['cadastrar'])){
            
            if(empty($_POST['titulo'])){
                $mensagem[] = "O campo titulo não pode estar vazio";

            }elseif(empty($_POST['texto'])){
                $mensagem[] = "O campo texto não pode estar vazio";

            }else{

                //Upload
                           
                $storage = new \Upload\Storage\FileSystem('uploads');
                $file = new \Upload\File('foo', $storage);

                // Optionally you can rename the file on upload
                $new_filename = uniqid();
                $file->setName($new_filename);

                // Validate file upload
                // MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
                $file->addValidations(array(
                    // Ensure file is of type "image/png"
                    //new \Upload\Validation\Mimetype('image/png'),

                    //You can also add multi mimetype validation
                    new \Upload\Validation\Mimetype(array('image/png','image/jpeg','image/gif')),

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
                    $note = $this->model('Note');
                    $note->titulo =  $_POST['titulo'];
                    $note->texto  =  $_POST['texto'];
                    $note->imagem  = $data['name'];

                    $mensagem[] = $note->save();
                    
                } catch (\Exception $e) {
                    // Fail!
                    $errors = $file->getErrors();
                    $mensagem[] = implode("<br>", $errors) ;
                }

                

            }

        }
        $this->view('notes/criar', $dados = ['mensagem' => $mensagem]);
        
    }



    public function editar($id){

        Auth::checkLogin();

        $mensagem = array();
        $note = $this->model('Note');

            
            /**
             * Se houver ação envai para view
             */
        if(isset($_POST['atualizar'])){
            
            if(empty($_POST['titulo'])){
                $mensagem[] = "O campo titulo não pode estar vazio";

            }elseif(empty($_POST['texto'])){
                $mensagem[] = "O campo texto não pode estar vazio";

            }else{
                $note->titulo =  $_POST['titulo'];
                $note->texto  =  $_POST['texto'];

                $mensagem[] = $note->update($id);

            }

        }
        if(isset($_POST['atualizarImagem'])){ 
           
             //Upload
                           
             $storage = new \Upload\Storage\FileSystem('uploads');
             $file = new \Upload\File('foo', $storage);

             // Optionally you can rename the file on upload
             $new_filename = uniqid();
             $file->setName($new_filename);

             // Validate file upload
             // MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
             $file->addValidations(array(
                 // Ensure file is of type "image/png"
                 //new \Upload\Validation\Mimetype('image/png'),

                 //You can also add multi mimetype validation
                 new \Upload\Validation\Mimetype(array('image/png','image/jpeg','image/gif')),

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
                 $note = $this->model('Note');
                 $note->titulo =  $_POST['titulo'];
                 $note->texto  =  $_POST['texto'];
                 $note->imagem  = $data['name'];

                 $mensagem[] = $note->updateImagem($id);
                 
             } catch (\Exception $e) {
                 // Fail!
                 $errors = $file->getErrors();
                 $mensagem[] = implode("<br>", $errors) ;
             }

        }

        if(isset($_POST['deletarImagem'])){
            $imagem = $note->findId($id);
            unlink("uploads/".$imagem['imagem']);
            $mensagem[] = $note->deleteImage($id);


        }
        $dados = $note->findId($id);

        $this->view('notes/editar', $dados = ['mensagem' => $mensagem, 'registros' => $dados]);
    }

    /**
     * Método reponsável por excluir
     *
     * @param string $id
     * @return void
     */
    public function excluir($id = ''){

        Auth::checkLogin();

        $mensagem = array();

        $note = $this->model('Note');

        $mensagem[] = $note->delete($id);

        $dados = $note->getAll();

        $this->view('home/index' , $dados = ['registros' => $dados, 'mensagem' => $mensagem]);


    }




}