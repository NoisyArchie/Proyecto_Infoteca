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
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />
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
            <img
              src="assets/images/InfotecaCA.png"
              alt="Logo Infoteca"
              class="logo"
            />
            <h2>Iniciar Sesión</h2>

            <div class="input-container">
              <i class="bx bxs-user icono"></i>
              <input
                type="text"
                id="login-username"
                name="usuario"
                placeholder="Usuario"
                required
              />
            </div>

            <div class="input-container">
              <i class="bx bxs-envelope icono"></i>
              <input
                type="email"
                id="login-email"
                name="correo"
                placeholder="Correo Electrónico"
                required
              />
            </div>

            <div class="input-container">
              <i class="bx bxs-lock-alt icono"></i>
              <input
                type="password"
                id="login-password"
                name="contrasena"
                placeholder="Contraseña"
                required
              />
            </div>

            <!-- Campo oculto para identificar que es el formulario de login -->
            <input type="hidden" name="login" value="1" />

            <button type="submit">Entrar</button>
          </form>

          <!--Register-->
          <form
            action="prueba.php"
            method="POST"
            class="formulario__register"
            enctype="multipart/form-data"
          >
            <h2>Registrarse</h2>

            <!-- Campos para usuarios internos -->
            <div id="campos_internos_register" style="display: none">
              <div class="input-register">
                <i class="bx bx-barcode"></i>
                <input
                  type="text"
                  id="register-matricula"
                  name="matricula"
                  placeholder="Matrícula"
                  
                />
              </div>
            </div>

            <!-- Campos generales -->
            <div class="input-register">
              <i class="bx bxs-id-card"></i>
              <input
                type="text"
                id="register-name"
                name="nombre_completo"
                placeholder="Nombre completo"
                required
              />
            </div>

            <div class="input-register">
              <i class="bx bxs-envelope"></i>
              <input
                type="email"
                id="register-email"
                name="correo"
                placeholder="Correo Electrónico"
                required
              />
            </div>

            <div class="input-register">
              <i class="bx bxs-user"></i>
              <input
                type="text"
                id="register-username"
                name="usuario"
                placeholder="Usuario"
                required
              />
            </div>

            <div class="input-register">
              <i class="bx bxs-lock-alt"></i>
              <input
                type="password"
                id="register-password"
                name="contrasena"
                placeholder="Contraseña"
                required
              />
            </div>

            <!-- Campos para usuarios externos -->
            <div id="campos_externos_register" style="display: none">
              <div class="input-register">
                <i class="bx bxs-file icono"></i>
                <label for="credencial"
                  >Subir identificación (imagen o PDF)</label
                >
                <input
                  type="file"
                  id="credencial"
                  name="credencial"
                  accept="image/*,.pdf"
                />
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

    <script>
      // Para alternar entre formularios de login y registro
      const btnIniciarSesion = document.getElementById("btn__iniciar-sesion");
      const btnRegistrarse = document.getElementById("btn__registrarse");
      const formularioLogin = document.querySelector(".formulario__login");
      const formularioRegister = document.querySelector(
        ".formulario__register"
      );
      const contenedorLoginRegister = document.querySelector(
        ".contenedor__login-register"
      );

      // Función para mostrar el formulario de iniciar sesión
      btnIniciarSesion.addEventListener("click", () => {
        formularioRegister.style.display = "none";
        formularioLogin.style.display = "block";
        contenedorLoginRegister.style.left = "10px";
      });

      // Función para mostrar el formulario de registro
      btnRegistrarse.addEventListener("click", () => {
        formularioLogin.style.display = "none";
        formularioRegister.style.display = "block";
        contenedorLoginRegister.style.left = "410px";
      });

      // Para el formulario de login
      const btnInternoLogin = document.getElementById("btn_interno_login");
      const btnExternoLogin = document.getElementById("btn_externo_login");
      const camposInternosLogin = document.getElementById(
        "campos_internos_login"
      );

      // Verifica si los botones de "Interno" y "Externo" existen en el formulario de login antes de asignar eventos
      if (btnInternoLogin && btnExternoLogin && camposInternosLogin) {
        btnInternoLogin.addEventListener("click", () => {
          camposInternosLogin.style.display = "block";
        });

        btnExternoLogin.addEventListener("click", () => {
          camposInternosLogin.style.display = "none";
        });
      }

      // Para el formulario de registro
      const btnInternoRegister = document.getElementById(
        "btn_interno_register"
      );
      const btnExternoRegister = document.getElementById(
        "btn_externo_register"
      );
      const camposInternosRegister = document.getElementById(
        "campos_internos_register"
      );
      const camposExternosRegister = document.getElementById(
        "campos_externos_register"
      );

      btnInternoRegister.addEventListener("click", () => {
        camposInternosRegister.style.display = "block";
        camposExternosRegister.style.display = "none";
      });

      btnExternoRegister.addEventListener("click", () => {
        camposInternosRegister.style.display = "none";
        camposExternosRegister.style.display = "block";
      });
    </script>
  </body>
</html>

<?php
//ob_start();
// Incluye la conexión
include("php/conexion_be.php");

// Función para validar correos internos
function validarCorreoInterno($correo) {
    return strpos($correo, '@uadec.edu.mx') !== false;
}

// Registro de usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
    $matricula = !empty($_POST['matricula']) ? $_POST['matricula'] : null;
    $tipo_usuario = $matricula ? 'interno' : 'externo';

    // Verificar si el usuario o la matrícula ya existen
    $verificarUsuario = $conn->query("SELECT * FROM usuarios WHERE usuario = '$usuario'");
    $verificarMatricula = $matricula ? $conn->query("SELECT * FROM usuarios WHERE matricula = '$matricula'") : false;

    if ($verificarUsuario->num_rows > 0) {
        echo "<script>alert('El usuario ya está registrado');</script>";
    } elseif ($matricula && $verificarMatricula && $verificarMatricula->num_rows > 0) {
        echo "<script>alert('La matrícula ya está registrada');</script>";
    } else {
        // Procesar credencial si es usuario externo
        $ruta_credencial = null;
        if ($tipo_usuario === 'externo') {
            if (isset($_FILES['credencial']) && $_FILES['credencial']['error'] === 0) {
                $ruta_destino = 'login\credenciales' . basename($_FILES['credencial']['name']);
                if (move_uploaded_file($_FILES['credencial']['tmp_name'], $ruta_destino)) {
                    $ruta_credencial = $ruta_destino;
                } else {
                    echo "<script>alert('Error al subir la credencial.');</script>";
                    exit;
                }
            } else {
                echo "<script>alert('Es obligatorio subir una credencial para usuarios externos.');</script>";
                exit;
            }
        }

        // Insertar en la base de datos
        $sql = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena, matricula, tipo_usuario, credencial) 
                VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena', '$matricula', '$tipo_usuario', '$ruta_credencial')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registro exitoso');</script>";
            // Redirección para evitar el reenvío del formulario
           // header("Location: home/pagina_principal.php"); // Cambia `formulario.php` a la URL adecuada de tu página
            exit;
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
    }
}


// Verifica si es una solicitud de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $usuario = $_POST['usuario'];
  $correo = $_POST['correo'];
  $contrasena = $_POST['contrasena'];

  // Verificar en la base de datos
  $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND correo = '$correo'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();
      
      // Verificar la contraseña
      if (password_verify($contrasena, $user['contrasena'])) {
          // Registrar en la tabla de sesiones activas
          $usuario_id = $user['id'];
          $sql_sesion = "INSERT INTO sesiones_activas (usuario_id) VALUES ('$usuario_id')";

          if ($conn->query($sql_sesion) === TRUE) {
           // echo "<script>alert('Registro exitoso');</script>";
            //echo "<a href='/resgistroinfoteca/home/pagina_principal.html'>Ir a la página principal</a>";
            echo "<script>alert('Inicio de sesión exitoso'); window.location.href='/resgistroinfoteca/home/pagina_principal.html';</script>";

            exit; 
        } else {
              echo "<script>alert('Error al registrar la sesión.');</script>";
          }
      } else {
          echo "<script>alert('Contraseña incorrecta');</script>";
      }
  } else {
      echo "<script>alert('No existe una cuenta con ese usuario o correo');</script>";
  }
}
?>
