<?php 

    include("../conexion_be.php");
    require("../../pdf/fpdf.php");

    if (isset($_POST['imprimirReparto'])) {
        $reparto = $_POST['reparto'];
        $fecha = $_POST['fecha'];
    }

    class PDF extends FPDF{

        //cabecera de pagina
        function header(){
        }
        function footer(){
            $this->SetY(-15);
            $this->SetX(-20);
            $this->Cell(0, 10, 'Pagina '.$this->PageNo().' de {nb}', 0, 0, 'C');
        }
    }
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',22);
        $pdf->SetTextColor(100, 100, 100);
        $pdf->Write(5, 'Reparto: ');
        $pdf->Ln();
        $pdf->SetY(18);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial','B',20);
        $pdf->Write(5, $reparto);
        $pdf->SetX(0);
        $pdf->SetY(26);
        $pdf->Write(5, $fecha);
        $pdf->SetY(25);
        $pdf->SetX(80);
        $pdf->SetFont('Arial','',12);
        $pdf->Write(5, 'Caja inicial: _________');
        $pdf->SetX(103);
        $pdf->Write(5, '$');

        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('Arial','',10);
        $pdf->SetY(35);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFillColor(200,200,200);
        $pdf->SetX(17);
        $pdf->Cell(20,7, 'Codigo', 1, 0, 'C',1);
        $pdf->Cell(25,7, 'Nombre', 1, 0, 'C',1);
        $pdf->Cell(40,7, 'Direccion', 1, 0, 'C',1);
        $pdf->Cell(20,7, 'Saldo', 1, 0, 'C',1);
        $pdf->Cell(17,7, 'Sifones', 1, 0, 'C',1);
        $pdf->Cell(30,7, 'Bidones', 1, 0, 'C',1);
        $pdf->Cell(30,7, 'Pago', 1, 1, 'C',1);

        include('../conexion_be.php');
        require('../conexion_be.php');
        
         if($reparto=="Todo"){
            $consulta = "SELECT * FROM clientes WHERE reparto='Ruta' OR repartodia='Lunes' OR repartodia='Martes' OR repartodia='Martes2' OR repartodia='Miercoles' OR repartodia='Ex Gagliano' OR repartodia='Jueves' OR repartodia='Javier Jueves' OR repartodia='Viernes' OR repartodia='Viernes otro' OR repartodia='Sabado' OR repartodia='Javier sabado' OR repartodia='Agustin' ORDER BY numeroCliente ASC";
            $resultado = mysqli_query($conexion,$consulta);
        }else if($reparto=="Cuadrante1"){
            $consulta = "SELECT * FROM clientes WHERE cuadrante='1' ORDER BY SUBSTRING(direccionCliente, -4)*1 ASC";
            $resultado = mysqli_query($conexion,$consulta);
        }else if($reparto=="Cuadrante2"){
            $consulta = "SELECT * FROM clientes WHERE cuadrante='2' ORDER BY SUBSTRING(direccionCliente, -4)*1 ASC";
            $resultado = mysqli_query($conexion,$consulta);
        }else if($reparto=="Cuadrante3"){
            $consulta = "SELECT * FROM clientes WHERE cuadrante='3' ORDER BY SUBSTRING(direccionCliente, -4)*1 ASC";
            $resultado = mysqli_query($conexion,$consulta);
        }else if($reparto=="Cuadrante4"){
            $consulta = "SELECT * FROM clientes WHERE cuadrante='4' ORDER BY SUBSTRING(direccionCliente, -4)*1 ASC";
            $resultado = mysqli_query($conexion,$consulta);
        }else{
            $consulta = "SELECT * FROM clientes WHERE reparto='$reparto' ORDER BY numeroCliente ASC";
            $resultado = mysqli_query($conexion,$consulta);
        }

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFillColor(250,250,250);

        while($row = $resultado->fetch_assoc()){
            $pdf->SetX(17);
            $pdf->Cell(20,7, $row['numeroCliente'], 1, 0, 'C',1);
            $pdf->Cell(25,7, $row['nombreCliente'], 1, 0, 'C',1);
            $pdf->Cell(40,7, $row['direccionCliente'], 1, 0, 'C',1);
            $pdf->Cell(20,7, $row['saldoAnteriorCliente'], 1, 0, 'C',1);
            $pdf->Cell(17,7, '', 1, 0, 'C',1);
            $pdf->Cell(30,7, '', 1, 0, 'C',1);
            $pdf->Cell(30,7, '', 1, 1, 'C',1);
        }   

$pdf->Output('', $fecha);

?>