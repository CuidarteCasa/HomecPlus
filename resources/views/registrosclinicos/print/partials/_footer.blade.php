
   <script type="text/php">
    if (isset($pdf)) {
        $text ="Impreso por {{ Auth::user()->name }}, fecha de impresion  {{ date('Y-m-d H:m') }}";
        $text1 ="pagina {PAGE_NUM} / {PAGE_COUNT}";
        $ln="______________________________________________________________________________________________________";
        $size = 7;
        $font = $fontMetrics->getFont("Verdana");
        $font1 = $fontMetrics->getFont("Century Gothic");
        $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
        //$x = ($pdf->get_width() - $width) / 2;
        //$y = $pdf->get_height() - 50;
        $x1 = ($pdf->get_width() - $width)/2;
        $y2 = $pdf->get_height() - 25 ;
        $pdf->page_text(165, 765, $text, $font1, $size);
        $pdf->page_text(500, 765, $text1, $font, $size); 
        $pdf->page_text(60, 755, $ln, $font, $size); 

    }
</script>

 