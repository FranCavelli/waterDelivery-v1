<?php 

    include("../conexion_be.php");
    require("../../pdf/fpdf.php");

    if (isset($_POST['imprimirCliente'])) {
        $codigoCliente = $_POST['codigoCliente'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        
        $query = "SELECT * FROM clientes WHERE numeroCliente=$codigoCliente";
        $resultado = mysqli_query($conexion, $query);
        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_array($resultado);
            $direccionCliente = $row['direccionCliente'];
            $saldoCliente = $row['saldoAnteriorCliente'];
        }
    }
    
    $fechaInicio=strtotime($fechaInicio);
    $fechaFin=strtotime($fechaFin);

    
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
        $pdf->Write(5, 'Resumen | Cliente: ');
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetX(82);
        $pdf->Write(5, $codigoCliente);
        $pdf->SetX(1);
        $pdf->SetY(18);
        $pdf->SetFont('Arial','B',18);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Write(5, 'Direccion: ');
        $pdf->SetFont('Arial','B',20);
        $pdf->SetX(43);
        $pdf->Write(5, $direccionCliente);
        $pdf->SetX(140);
        $pdf->Write(5, 'Saldo: $');
        $pdf->Write(5, $saldoCliente);

        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('Arial','',10);
        $pdf->SetY(35);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFillColor(200,200,200);
        $pdf->SetX(27);
        $pdf->Cell(17,7, 'Codigo', 1, 0, 'C',1);
        $pdf->Cell(10,7, 'X20', 1, 0, 'C',1);
        $pdf->Cell(10,7, 'X12', 1, 0, 'C',1);
        $pdf->Cell(10,7, 'X5', 1, 0, 'C',1);
        $pdf->Cell(15,7, 'Sifones', 1, 0, 'C',1);
        $pdf->Cell(15,7, 'Canilla', 1, 0, 'C',1);
        $pdf->Cell(19,7, 'Dispenser', 1, 0, 'C',1);
        $pdf->Cell(20,7, 'Pago', 1, 0, 'C',1);
        $pdf->Cell(20,7, 'Fecha', 1, 1, 'C',1);

        include('../conexion_be.php');
        require('../conexion_be.php');


        for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
            $fecha = date("y-m-d", $i);

        $consulta = "SELECT * FROM ventas WHERE idCliente='$codigoCliente' AND fecha='$fecha'";
        $consulta2 = "SELECT * FROM clientes WHERE numeroCliente='$codigoCliente'";
        $resultado = mysqli_query($conexion,$consulta);
        $resultado2 = mysqli_query($conexion,$consulta2);

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFillColor(250,250,250);

        while($row = $resultado->fetch_assoc()){
            $pdf->SetX(27);
            $pdf->Cell(17,7, $row['idCliente'], 1, 0, 'C',1);
            $pdf->Cell(10,7, $row['bidones20'], 1, 0, 'C',1);
            $pdf->Cell(10,7, $row['bidones12'], 1, 0, 'C',1);
            $pdf->Cell(10,7, $row['bidones5'], 1, 0, 'C',1);
            $pdf->Cell(15,7, $row['sifones'], 1, 0, 'C',1);
            $pdf->Cell(15,7, $row['canilla'], 1, 0, 'C',1);
            $pdf->Cell(19,7, $row['dispenser'], 1, 0, 'C',1);
            $pdf->Cell(20,7, $row['montoPagado'], 1, 0, 'C',1);
            $pdf->Cell(20,7, $row['fecha'], 1, 1, 'C',1);
        }   
    }
$pdf->Output('', $fecha);

?>