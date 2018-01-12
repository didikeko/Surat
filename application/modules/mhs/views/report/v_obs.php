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
        <td align="R" width="250px">Yogyakarta, '.$dd.' '.$bulan.' '.$yy.'</td>
    </tr>
    <tr>
        <td  width="50px">Lamp.</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td  width="50px">Hal</td>
        <td>: Permohonan Izin Observasi</td>
        
        <td></td>
    </tr>
</table>';

$txt='Kepada:<br>
Yth. '.$kepada.' '.$instansi.'<br>
di '.$tempat.'
<p>
<i>Assalamualaikum Wr.Wb</i><br><br>
Dengan hormat, sehubungan dengan pelaksanaan mata kuliah '.$mtkuliah.' pada Program Studi '.$prodi.' Fakultas '.$fkl.' Universitas Islam Negeri Sunan Kalijaga pada Semester (gasal/genap) Tahun Akademik '.$thn_akademik.' , maka kami memberikan tugas kepada mahasiswa berikut : <br><br>
<table border="1" cellpadding="3">
    <tr>
        <td align="C" width="30px">No.</td>
        <td width="200px">Nama</td>
        <td>NIM</td>
    </tr>
    <tr>
        <td  align="C">1</td>
        <td>'.$namaA.'</td>
        <td>'.$nimA.'</td>
    </tr>
    <tr>
        <td  align="C">2</td>
        <td>'.$namaB.'</td>
        <td>'.$nimB.'</td>
    </tr>

</table><br><br>
untuk mengadakan observasi ke sekolah berkaitan dengan manajemen ketatausahaan di '.$instansi.' pada tanggal '.$tgl.'.<br><br>

Sehubungan dengan hal tersebut, dengan ini kami memohon kesediaan Bapak/Ibu Kepala Madrasah untuk memberikan izin dan memfasilitasi kepada mahasiswa tersebut diatas.<br><br>
Demikian surat ini kami sampaikan, atas perhatian dan kerjasama Bapak/Ibu kami ucapkan terimakasih.<br><br>
<i>Wassalamualaikum Wr.Wb</i>';
$txt2 = '<table><tr>
<td></td>
<td></td>
<td width="200px" align="L">Yogyakarta '.$dd.' '.$bulan.' '.$yy.' <br>
         a.n. Dekan<br>
                Wakil Dekan Bidang Akademik
                <br><br><br><br>
                



       '.$ttd.'<br></td>
        </tr>
        </table>
';
// print a blox of text using multicell()
$pdf->WriteHTMLCell(0,0,'','',$nama_surat, 0, 1, 0, true, 'L', true);
$pdf->WriteHTMLCell(0,0,'','',$txt, 0, 1, 0, true, 'L', true);
$pdf->WriteHTMLCell(0,0,'','',$txt2, 0, 1, 0, true, 'R', true);

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
$pdf->write2DBarcode($nomor, 'QRCODE,L', 20, 215, 20, 20, $style, 'N');

// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------
ob_end_clean();

//Close and output PDF document
ob_clean(); //untuk menghapus output buffer
$pdf->Output('surat_ijin_observasi.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
