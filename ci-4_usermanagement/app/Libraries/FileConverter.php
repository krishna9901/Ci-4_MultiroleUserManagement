<?php
namespace App\Libraries;

use PhpOffice\PhpWord\IOFactory;
use Dompdf\Dompdf;

class FileConverter
{
    public function convertToPdf($inputFilePath, $outputFilePath)
    {
        // Load the Word document
        $phpWord = IOFactory::load($inputFilePath);

        // Save as HTML
        $xmlWriter = IOFactory::createWriter($phpWord, 'HTML');
        $htmlFilePath = $outputFilePath . '.html';
        $xmlWriter->save($htmlFilePath);

        // Convert HTML to PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml(file_get_contents($htmlFilePath));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdfFilePath = $outputFilePath . '.pdf';
        file_put_contents($pdfFilePath, $dompdf->output());

        // Delete the temporary HTML file
        unlink($htmlFilePath);

        return $pdfFilePath;
    }
}
?>