<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Escaner QR</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f4f4f9;
      }

      .scanner-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 300px;
      }

      #reader {
        margin-bottom: 20px;
      }

      .result-container {
        margin-top: 20px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
      }

      .result-container p {
        font-size: 18px;
        color: #333;
      }

      .result-container span {
        font-weight: bold;
        color: #007bff;
      }
    </style>
  </head>
  <body>
    <div class="scanner-container">
      <h2>Escaner QR</h2>
      <div id="reader" style="width: 100%;"></div>
      <div class="result-container">
        <p>Resultado del código escaneado: <span id="result">Esperando...</span></p>
      </div>
    </div>

    <script src="html5-qrcode.min.js"></script>
    <script>
      function onScanSuccess(decodedText, decodedResult) {
        const resultDisplay = document.getElementById("result");
        if (decodedText.includes("RegistroInfoteca")) {
          resultDisplay.innerText = "Código aceptado";
          document.getElementById("mensajeDecodificado").value = decodedText;
          html5QrcodeScanner.clear();
          document.getElementById("qrForm").submit(); // Enviar el formulario automáticamente
        } else {
          resultDisplay.innerText = "Código no aceptado";
        }
      }

      var html5QrcodeScanner = new Html5QrcodeScanner("reader", {
        fps: 10,
        qrbox: 250,
      });
      html5QrcodeScanner.render(onScanSuccess);
    </script>

    <form id="qrForm" method="POST" action="tu_archivo_php.php">
      <input type="hidden" name="mensajeDecodificado" id="mensajeDecodificado">
    </form>
  </body>
</html>


<?php
include("php/conexion_be.php");
if (isset($_POST['mensajeDecodificado'])) {
    $mensajeqr = $_POST['mensajeDecodificado']; // Asegúrate de que este campo llegue correctamente
    $id = ''; // Agregar el valor adecuado para $id
    $fecha = date('Y-m-d H:i:s'); // Ejemplo de obtener la fecha actual
    $usuario_id = ''; // Agregar el valor adecuado para $usuario_id

    // Instrucción SQL para insertar los datos
    $sql = "INSERT INTO QR(id, mensajeqr, fecha, usuario_id)
            VALUES ('$id', '$mensajeqr', '$fecha', '$usuario_id')";

    // Aquí deberías ejecutar la consulta usando PDO o MySQLi
} else {
   // echo "No se ha escaneado ningún código QR.";
}
?>
