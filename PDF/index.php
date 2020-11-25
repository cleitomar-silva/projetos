
<?php
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$lista = [];

$lista  = array(
    array('id' => 1, 'nome' => 'Lindo',     'grupo' => 'primeiro'),
    array('id' => 2, 'nome' => 'Cleitomar', 'grupo' => 'primeiro'),
    array('id' => 3, 'nome' => 'Pedro',     'grupo' => 'primeiro'),
    array('id' => 4, 'nome' => 'Bonito',    'grupo' => 'seguro'),
    array('id' => 5, 'nome' => 'mano',      'grupo' => 'seguro'),
    array('id' => 6, 'nome' => 'Joao',      'grupo' => 'seguro'),
);
$html = '<div>Titulo</div>
            <hr>
            ';

$html .= '<table width=100%>
            <thead>
                <tr>
                    <td><b>ID</b></td>
                    <td><b>Nome</b></td>
                    <td><b>Grupo</b></td>
               </tr>
           </thead>
            <tbody>';
        foreach ($lista as $key => $row)
        {
            $html.='<tr>
                        <td>' .$row['id'].'</td>
                       <td>' .$row['nome'].'</td>
                       <td>' .$row['grupo'].'</td>
                   </tr>';
        }
    $html.='</tbody>
        </table>';


$dompdf->loadHtml($html);
$dompdf->setPaper("A4", 'portrait');

$dompdf->render();

$dompdf->stream("relatorio.pdf", ["Attachment" => false]);




?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>

   <!-- <h3>Tabel PDF</h3>
    <table width="100%">
        <thead>
            <tr>
                <td><b>ID</b></td>
                <td><b>Nome</b></td>
            </tr>
        </thead>

        <tbody>

        </tbody>
    </table>-->



    </body>
</html>
