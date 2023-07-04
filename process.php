<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpWord\TemplateProcessor;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];

        if ($accion === 'funcion1') {
            funcion1();
        } elseif ($accion === 'funcion2') {
            funcion2();
        }
    }
}

//////////////////////////////////////Function 1
function funcion1() {
    // Specific actions for function 1
    //words you have to modify with your words/!\/!\/!\/!\/!\/!\/!\
    $nombre = $_POST["nombre"];
    $amigo = $_POST["amigo"];
    $colegio = $_POST["colegio"];

    $archivo = 'textito.docx'; // Path to Word file
    $palabrasAntiguas = array(
        'nombre',
        'amigo',
        'colegio'
    );

    $nuevasPalabras = array(
        $nombre,
        $amigo,
        $colegio
    );

    $templateProcessor = new TemplateProcessor($archivo);

    for ($i = 0; $i < count($palabrasAntiguas); $i++) {
        $templateProcessor->setValue($palabrasAntiguas[$i], $nuevasPalabras[$i]);
    }

    $archivoModificado = 'Document2.docx'; // Path to new Word file
    $templateProcessor->saveAs($archivoModificado);

    //echo "The words have been replaced and the new file has been saved to '$archivoModificado'.";
   
    // Convert to pdf
    // Configure the PDF generation library
    Settings::setPdfRendererPath('vendor/dompdf/dompdf');
    Settings::setPdfRendererName('DomPDF');

    // Path to file .docx from entry
    $inputFile = 'Document2.docx';

    // Path to file from exit .pdf
    $outputFile = 'archivo.pdf';

    // Load archivo .docx
    $phpWord = IOFactory::load($inputFile);

    // Save to PDF
    $pdfWriter = IOFactory::createWriter($phpWord, 'PDF');
    $pdfWriter->save($outputFile);

    header('Location: main.php');
    exit;
}

////////////////////////////////Function 2
function funcion2() {
    // Specific actions for function 2
    //words you have to modify with your words /!\/!\/!\/!\/!\/!\/!\
    $amigo2 = $_POST["amigo2"];
    $gato = $_POST["gato"];

    $archivo = 'texto2.docx'; //
    // Words to change
    $palabrasAntiguas = array(
        'amigo2',
        'gato2'
    );

    $nuevasPalabras = array(
        $amigo2,
        $gato,
    );

    $templateProcessor = new TemplateProcessor($archivo);

    for ($i = 0; $i < count($palabrasAntiguas); $i++) {
        $templateProcessor->setValue($palabrasAntiguas[$i], $nuevasPalabras[$i]);
    }

    $archivoModificado = 'DocTexto2.docx'; // 
    $templateProcessor->saveAs($archivoModificado);


    Settings::setPdfRendererPath('vendor/dompdf/dompdf');
    Settings::setPdfRendererName('DomPDF');

    
    $inputFile = 'DocTexto2.docx';

    $outputFile = 'archivo2.pdf';

    $phpWord = IOFactory::load($inputFile);

    // Guardar como PDF
    $pdfWriter = IOFactory::createWriter($phpWord, 'PDF');
    $pdfWriter->save($outputFile);

    header('Location: main.php');
    exit;
}

?>