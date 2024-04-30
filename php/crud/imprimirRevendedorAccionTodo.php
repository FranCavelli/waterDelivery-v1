<?php 

    include("../conexion_be.php");
    require("../../pdf/fpdf.php");

    if (isset($_POST['imprimirRevendedor'])) {
        $codigoRevendedor = $_POST['codigoRevendedor'];
        $fecha = $_POST['fecha'];

        $query = "SELECT * FROM revendedores WHERE idRevendedor=$codigoRevendedor";
        $resultado = mysqli_query($conexion, $query);
        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['nombre'];
            $saldoCliente = $row['saldo'];
        }
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
        $pdf->Write(5, 'Revendedor: ');
        $pdf->SetX(1);
        $pdf->SetY(18);
        $pdf->SetFont('Arial','B',20);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Write(5, $codigoRevendedor);
        $pdf->Ln();
        $pdf->SetX(0);
        $pdf->SetY(26);
        $pdf->Write(5, 'Total');

        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetFont('Arial','',10);
        $pdf->SetY(35);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFillColor(200,200,200);
        $pdf->SetX(13);
        $pdf->Cell(17,7, 'Codigo', 1, 0, 'C',1);
        $pdf->Cell(20,7, 'Nombre', 1, 0, 'C',1);
        $pdf->Cell(10,7, 'X20', 1, 0, 'C',1);
        $pdf->Cell(10,7, 'X12', 1, 0, 'C',1);
        $pdf->Cell(10,7, 'X5', 1, 0, 'C',1);
        $pdf->Cell(15,7, 'Sifones', 1, 0, 'C',1);
        $pdf->Cell(15,7, 'Canilla', 1, 0, 'C',1);
        $pdf->Cell(19,7, 'Dispenser', 1, 0, 'C',1);
        $pdf->Cell(29,7, 'Envases Nuevos', 1, 0, 'C',1);
        $pdf->Cell(20,7, 'Pago', 1, 0, 'C',1);
        $pdf->Cell(20,7, 'Fecha', 1, 1, 'C',1);

        include('../conexion_be.php');
        require('../conexion_be.php');

        $consulta = "SELECT * FROM ventarevendedores WHERE idRevendedor='$codigoRevendedor'";
        $resultado = mysqli_query($conexion,$consulta);
        
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFillColor(250,250,250);


        while($row = $resultado->fetch_assoc()){
            $pdf->SetX(13);
            $pdf->Cell(17,7, $row['idRevendedor'], 1, 0, 'C',1);
            $pdf->Cell(20,7, $row['nombre'], 1, 0, 'C',1);
            $pdf->Cell(10,7, $row['bidon20'], 1, 0, 'C',1);
            $pdf->Cell(10,7, $row['bidon12'], 1, 0, 'C',1);
            $pdf->Cell(10,7, $row['bidon5'], 1, 0, 'C',1);
            $pdf->Cell(15,7, $row['sodasifon'], 1, 0, 'C',1);
            $pdf->Cell(15,7, $row['canilla'], 1, 0, 'C',1);
            $pdf->Cell(19,7, $row['dispenser'], 1, 0, 'C',1);
            $pdf->Cell(29,7, $row['envasesNuevos'], 1, 0, 'C',1);
            $pdf->Cell(20,7, $row['montoPagado'], 1, 0, 'C',1);
            $pdf->Cell(20,7, $row['fecha'], 1, 1, 'C',1);
        }   

$pdf->Output('', $nombre);

?>