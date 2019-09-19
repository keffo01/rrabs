<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PDF_repor extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Pdf_model', 'PM', TRUE);
    $this->load->add_package_path( APPPATH . 'third_party/fpdf');
    $this->load->library('pdf');

  }


public function index(){

			$pdf = new PDF();

      $pdf->AddPage(); 
      $pdf->SetFont ('times', '', 11);
      $pdf->image('./assets/images/Logo3.png', 10, 2, 30);

      $pdf->setXY(47,14);
      $pdf->SetFont('Arial', '', 18);
      $pdf->MultiCell(100, 4,'Reporte mensual del sistema', 0, 0);
      $pdf->setXY(94,20);
      $pdf->SetFont('Arial', '', 10);
      $pdf->MultiCell(20, 4,'Mes: Junio', 0, 0);  

      $pdf->SetXY(90,30);
      $pdf->SetFont('Arial', '', 14);
      $pdf->MultiCell(40, 4, 'Estadisticas');

       $pdf->SetFont('Arial', '', 12);
      $pdf->SetXY(35,40);
      $pdf->MultiCell(100, 5, 'Post realizados por categorias ', 0,0 );
//////////////////////////////////////////////////////////////////////////////
      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(10,50);
      $pdf->MultiCell(19, 5, 'Celulares   10', 1,'C',0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(29,50);
      $pdf->MultiCell(27, 5, 'Carros Nuevos         20', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(56,50);
      $pdf->MultiCell(27, 5, 'Compuradoras          40', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(83,50);
      $pdf->MultiCell(16, 5, 'Laptops      50', 1, 'C', 0);

     $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(99,50);
      $pdf->MultiCell(15, 5, 'Tablets   20', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(114,50);
      $pdf->MultiCell(33, 5, 'Accesorios Celular        30', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(147,50);
      $pdf->MultiCell(27, 5, 'Carros Usados         2', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(174, 50);
      $pdf->MultiCell(23, 5, 'Motocicletas  90', 1, 'C', 0);


      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(10,60);
      $pdf->MultiCell(18, 5, 'Monitores   10', 1,'C',0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(28,60);
      $pdf->MultiCell(21, 5, 'Impresoras         20', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(49,60);
      $pdf->MultiCell(36, 5, 'Componentes de PC          40', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(85,60);
      $pdf->MultiCell(35, 5, 'Accesorios de Carro      60', 1, 'C', 0);

     $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(120,60);
      $pdf->MultiCell(36, 5, 'Accesorios de Motos   20', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(156,60);
      $pdf->MultiCell(28, 5, 'Otros Vehiculos        30', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(184,60);
      $pdf->MultiCell(13, 5, 'Jardin     2', 1, 'C', 0);


      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(10,70);
      $pdf->MultiCell(11, 5, 'Ropa   10', 1,'C',0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(21,70);
      $pdf->MultiCell(16, 5, 'Mascota     20', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(37,70);
      $pdf->MultiCell(11, 5, 'Casa     40', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(48,70);
      $pdf->MultiCell(13, 5, 'Cocina      60', 1, 'C', 0);

     $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(61,70);
      $pdf->MultiCell(26, 5, 'Refrigeradoras   20', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(87,70);
      $pdf->MultiCell(33, 5, 'Aire Acondicionado        30', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(120,70);
      $pdf->MultiCell(19, 5, 'Lavadoras     2', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(139,70);
      $pdf->MultiCell(19, 5, 'Secadoras     2', 1, 'C', 0);

      $pdf->SetFont('Arial', '', 10);
      $pdf->SetXY(158,70);
      $pdf->MultiCell(39, 5, 'Otros         Electrodomisticos 2', 1, 'C', 0);


      $pdf->SetFont('Arial', 'B', 10);
      $pdf->SetXY(10,80);
      $pdf->MultiCell(187 ,8, 'Total de post realizados en el Mes Julio:                                                                                                            1150  ', 1,'L',0);





           $pdf->Output();   



       
   }
 }

   ?>