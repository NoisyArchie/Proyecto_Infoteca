<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login y Register - Infoteca</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
  <link rel="stylesheet" href="assets/css/estilos.css" />
</head>

<body>
  <main>
    <div class="contenedor__todo">
      <div class="caja__trasera">
        <div class="caja__trasera-login">
          <h3>¿Ya tienes una cuenta?</h3>
          <p>Inicia sesión para entrar en la página</p>
          <button id="btn__iniciar-sesion">Iniciar Sesión</button>
        </div>
        <div class="caja__trasera-register">
          <h3>¿Aún no tienes una cuenta?</h3>
          <p>Regístrate para que puedas iniciar sesión</p>
          <button id="btn__registrarse">Registrarse</button>
        </div>
      </div>

      <!--Formulario de Login y registro-->
      <div class="contenedor__login-register">
        <!-- Login Form -->
        <form action="prueba.php" method="POST" class="formulario__login">
          <img src="assets/images/InfotecaCA.png" alt="Logo Infoteca" class="logo" />
          <h2>Iniciar Sesión</h2>

          <div class="input-container">
            <i class="bx bxs-user icono"></i>
            <input type="text" id="login-username" name="usuario" placeholder="Usuario" required />
          </div>

          <div class="input-container">
            <i class="bx bxs-envelope icono"></i>
            <input type="email" id="login-email" name="correo" placeholder="Correo Electrónico" required />
          </div>

          <div class="input-container">
            <i class="bx bxs-lock-alt icono"></i>
            <input type="password" id="login-password" name="contrasena" placeholder="Contraseña" required />
          </div>

          <!-- Campo oculto para identificar que es el formulario de login -->
          <input type="hidden" name="login" value="1" />

          <button type="submit">Entrar</button>
        </form>

        <!--Register-->
        <form action="prueba.php" method="POST" class="formulario__register" enctype="multipart/form-data">
          <h2>Registrarse</h2>

          <!-- Campos para usuarios internos -->
          <div id="campos_internos_register" style="display: none">
            <div class="input-register">
              <i class="bx bx-barcode"></i>
              <input type="text" id="register-matricula" name="matricula" placeholder="Matrícula" required />
            </div>
          </div>

          <!-- Campos generales -->
          <div class="input-register">
            <i class="bx bxs-id-card"></i>
            <input type="text" id="register-name" name="nombre_completo" placeholder="Nombre completo" required />
          </div>

          <div class="input-register">
            <i class="bx bxs-envelope"></i>
            <input type="email" id="register-email" name="correo" placeholder="Correo Electrónico" required />
          </div>

          <div class="input-register">
            <i class="bx bxs-user"></i>
            <input type="text" id="register-username" name="usuario" placeholder="Usuario" required />
          </div>

          <div class="input-register">
            <i class="bx bxs-lock-alt"></i>
            <input type="password" id="register-password" name="contrasena" placeholder="Contraseña" required />
          </div>

          <!-- Campos para usuarios externos -->
          <div id="campos_externos_register" style="display: none">
            <div class="input-register">
              <i class="bx bxs-file icono"></i>
              <label for="credencial">Subir identificación (imagen o PDF)</label>
              <input type="file" id="credencial" name="credencial" accept="image/*,.pdf" />
            </div>
          </div>

          <!-- Botones Externo e Interno -->
          <div class="botones-container">
            <button type="button" id="btn_interno_register">Interno</button>
            <button type="button" id="btn_externo_register">Externo</button>
          </div>

          <!-- Campo oculto para identificar que es el formulario de registro -->
          <input type="hidden" name="register" value="1" />

          <button type="submit">Registrarse</button>
        </form>
      </div>
    </div>
  </main>
</body>

</html>

<script>
  // Variables de los botones y formularios
  const btnIniciarSesion = document.getElementById("btn__iniciar-sesion");
  const btnRegistrarse = document.getElementById("btn__registrarse");
  const formularioLogin = document.querySelector(".formulario__login");
  const formularioRegister = document.querySelector(".formulario__register");
  const contenedorTodo = document.querySelector(".contenedor__todo");

  // Función para mostrar el formulario de iniciar sesión
  btnIniciarSesion.addEventListener("click", () => {
    formularioRegister.style.display = "none";
    formularioLogin.style.display = "block";
  });

  // Función para mostrar el formulario de registro
  btnRegistrarse.addEventListener("click", () => {
    formularioLogin.style.display = "none";
    formularioRegister.style.display = "block";
  });

  // Variables para los botones de "Interno" y "Externo" en el registro
  const btnInternoRegister = document.getElementById("btn_interno_register");
  const btnExternoRegister = document.getElementById("btn_externo_register");
  const camposInternosRegister = document.getElementById("campos_internos_register");
  const camposExternosRegister = document.getElementById("campos_externos_register");

  // Mostrar campos para usuarios internos
  btnInternoRegister.addEventListener("click", () => {
    camposInternosRegister.style.display = "block";
    camposExternosRegister.style.display = "none";
  });

  // Mostrar campos para usuarios externos
  btnExternoRegister.addEventListener("click", () => {
    camposInternosRegister.style.display = "none";
    camposExternosRegister.style.display = "block";
  });
</script>


<?php
// Incluye la conexión
include("conexion_be.php");


// Función para validar correos internos
function validarCorreoInterno($correo)
{
  return strpos($correo, '@uadec.edu.mx') !== false;
}

// Registro de usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
  $nombre_completo = $_POST['nombre_completo'];
  $correo = $_POST['correo'];
  $usuario = $_POST['usuario'];
  $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT); // Hashear la contraseña
  $matricula = !empty($_POST['matricula']) ? $_POST['matricula'] : null; // Si es externo, no hay matrícula
  $tipo_usuario = $matricula ? 'interno' : 'externo';

  // Si es usuario interno, validar el correo
  if ($tipo_usuario === 'interno' && !validarCorreoInterno($correo)) {
    echo "El correo no pertenece a la institución.";
    exit;
  }

  // Si es externo, procesar la credencial
  $ruta_credencial = null;
  if ($tipo_usuario === 'externo') {
    if (isset($_FILES['credencial']) && $_FILES['credencial']['error'] === 0) {
      $ruta_destino = 'credenciales/' . basename($_FILES['credencial']['name']);
      if (move_uploaded_file($_FILES['credencial']['tmp_name'], $ruta_destino)) {
        $ruta_credencial = $ruta_destino;
      } else {
        echo "Error al subir la credencial.";
        exit;
      }
    } else {
      echo "Es obligatorio subir una credencial para usuarios externos.";
      exit;
    }
  }

  // Insertar en la base de datos
  $sql = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena, matricula, tipo_usuario, credencial) 
            VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena', '$matricula', '$tipo_usuario', '$ruta_credencial')";

  if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Inicio de sesión de usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $usuario = $_POST['usuario']; // Recibe el nombre de usuario
  $correo = $_POST['correo']; // Recibe el correo
  $contrasena = $_POST['contrasena']; // Recibe la contraseña

  // Verificar en la base de datos usando usuario y correo
  $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND correo = '$correo'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Verificar la contraseña
    if (password_verify($contrasena, $user['contrasena'])) {
      echo "Inicio de sesión exitoso";
      // AQUI METER LO DE ANGEL
    } else {
      echo "Contraseña incorrecta";
    }
  } else {
    echo "No existe una cuenta con ese usuario o correo";
  }
}
?>