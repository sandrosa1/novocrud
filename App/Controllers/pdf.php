<?php

use App\Core\Controller;
use Dompdf\Dompdf;

class Pdf extends Controller {


    public function index($nome ){

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml('hello world');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("Arquivo do pdf",["Attachment" => false]);
    

        $this->view('pdf/index');

    }


}