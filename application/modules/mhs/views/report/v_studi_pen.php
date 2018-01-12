<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Didik');
$pdf->SetTitle('Surat mahasiswa');
$pdf->SetSubject('Pdf Surat');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$alamat='                                       '.strtoupper($kop_fkl).'';
$alamat .='                                                                   Jl.Marsda Adisucipto Yogyakarta 55281  
';
$alamat .='               '.$kop_tlp.'  
';
$alamat .='                         '.$kop_web.'
';

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_TITLE_2.$alamat);
//$pdf->SetHeaderData($alamat);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$resolution= array(175, 266);
$pdf->AddPage('P', $resolution);

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(2, 3, 2, 3);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

// set some text for example
$nama_surat ='<table>
    <tr>
        <td width="50px">Nomor</td>
        <td width="210px">: '.$nomor.'</td>
        <td align="R" width="240px">'.$dd.' '.$bulan.' '.$yy.'</td>
    </tr>
    <tr>
        <td  width="50px">Lamp.</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td width="50px">Hal</td>
        <td width="200px">: Permohonan Izin Pendahuluan</td>
        
        <td></td>
    </tr>
</table>';
$txt='Kepada:<br>
Yth. '.$jabatan.' '.$inst.'<br>
di '.$tmpt.'
<p>
<i>Assalamualaikum Wr.Wb</i><br><br>
Kami beritahukan bahwa untuk kelengkapan penyusunan Proposal Skripsi dengan tema : <br>
"<b>'.$judul.'</b>" diperlukan penelitian.<br><br>
Oleh karena itu, kami mengharap kiranya Bapak/Ibu kepala sekolah berkenan memberi izin kepada mahasiswa kami : <p><br><br>
<table>
    <tr>
        <td style="width: 130px;">Nama</td>
        <td>:  '.$nama.'</td>
    </tr>
    <tr>
        <td>NIM</td>
        <td>:  '.$nim.'</td>
    </tr>
    <tr>
        <td>Semester</td>
        <td>:  '.$smt.'</td>
    </tr>
    <tr>
        <td>Program Studi</td>
        <td>:  '.$prodi.'</td>
    </tr>
</table><br><br>
untuk melakukan wawancara di '.$inst.' yang Bapak/Ibu Pimpin pada tanggal '.$tgl.'<br><br>

Demikian Surat permohonan ini disampaikan, atas diperkenankannya diucapkan terimakasih<br><br>
<i>Wassalamualaikum Wr.Wb</i>';
$txt2 = '<table><tr>
<td></td>
<td></td>
<td align="L">Yogyakarta, '.$dd.' '.$bulan.' '.$yy.' <br>
         a.n. Dekan<br>
                Wakil Dekan Bidang Akademik
                <br><br><br><br>
                



        '.$ttd.'</td>
        </tr>
        </table>
';
$txt3='<p>Tembusan :<br>
Dekan(Sebagai laporan)</p>
';
// print a blox of text using multicell()
$pdf->WriteHTMLCell(0,0,'','',$nama_surat, 0, 1, 0, true, 'L', true);
$pdf->WriteHTMLCell(0,0,'','',$txt, 0, 1, 0, true, 'L', true);
$pdf->WriteHTMLCell(0,0,'','',$txt2, 0, 1, 0, true, 'R', true);
$pdf->WriteHTMLCell(0,0,'','',$txt3, 0, 1, 0, true, 'L', true);

$style = array(
    'border' => 0,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 0.1, // width of a single module in points
    'module_height' => 0.1 // height of a single module in points
);

// QRCODE,L : QR-CODE Low error correction
$pdf->write2DBarcode($nomor, 'QRCODE,L', 20, 221, 20, 20, $style, 'N');

// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_clean(); //untuk menghapus output buffer
$pdf->Output('surat_Studi_Pendahuluan.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
