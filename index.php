<?php
function escapar(string $valor): string
{
    return htmlspecialchars($valor, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$numeroUno = '';
$numeroDos = '';
$operacion = 'sumar';
$resultado = null;
$error = '';
$simbolos = ['sumar' => '+', 'restar' => '−', 'multiplicar' => '×', 'dividir' => '÷'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeroUno = is_string($_POST['numero_uno'] ?? null) ? trim($_POST['numero_uno']) : '';
    $numeroDos = is_string($_POST['numero_dos'] ?? null) ? trim($_POST['numero_dos']) : '';
    $operacion = is_string($_POST['operacion'] ?? null) ? $_POST['operacion'] : '';

    if ($numeroUno === '' || $numeroDos === '') {
        $error = 'Ingresa los dos números para realizar el cálculo.';
    } elseif (!is_numeric($numeroUno) || !is_numeric($numeroDos)) {
        $error = 'Ingresa números válidos. Para los decimales, utiliza un punto.';
    } elseif (!array_key_exists($operacion, $simbolos)) {
        $error = 'Selecciona una operación válida.';
    } else {
        $primerNumero = (float) $numeroUno;
        $segundoNumero = (float) $numeroDos;

        if (!is_finite($primerNumero) || !is_finite($segundoNumero)) {
            $error = 'Los números ingresados son demasiado grandes.';
        } else {
            switch ($operacion) {
                case 'sumar':
                    $resultado = $primerNumero + $segundoNumero;
                    break;
                case 'restar':
                    $resultado = $primerNumero - $segundoNumero;
                    break;
                case 'multiplicar':
                    $resultado = $primerNumero * $segundoNumero;
                    break;
                case 'dividir':
                    if ($segundoNumero == 0) {
                        $error = 'No se puede dividir entre cero.';
                    } else {
                        $resultado = $primerNumero / $segundoNumero;
                    }
                    break;
            }

            if ($resultado !== null && !is_finite($resultado)) {
                $resultado = null;
                $error = 'El resultado es demasiado grande. Prueba con números más pequeños.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página personal de Joel Solano, estudiante de Ingeniería en Software en UNIANDES. Práctica de Aplicaciones Web con calculadora en PHP.">
    <title>Joel Solano | Ingeniería en Software</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a class="saltar-contenido" href="#contenido">Ir al contenido</a>

    <header class="cabecera" id="inicio">
        <div class="contenedor barra">
            <a class="nombre" href="#inicio">Joel Solano<span> / Página personal</span></a>
            <nav aria-label="Navegación principal">
                <a href="#sobre-mi">Sobre mí</a>
                <a href="#formacion">Formación</a>
                <a href="#conocimientos">Conocimientos</a>
                <a href="#proyectos">Proyectos</a>
                <a href="#calculadora">Calculadora</a>
            </nav>
        </div>
    </header>

    <main id="contenido">
        <section class="presentacion" aria-labelledby="titulo-principal">
            <div class="contenedor presentacion-interior">
                <div>
                    <p class="etiqueta">UNIANDES · Sexto nivel</p>
                    <h1 id="titulo-principal">Hola, soy Joel Solano.</h1>
                    <p class="carrera">Estudiante de Ingeniería en Software</p>
                    <p class="introduccion">Aprendo a desarrollar software resolviendo problemas y llevando lo que estudio a la práctica.</p>
                    <a class="boton boton-claro" href="#proyectos">Ver mi práctica académica <span aria-hidden="true">→</span></a>
                </div>
                <aside class="datos-academicos" aria-label="Datos de esta práctica">
                    <p class="etiqueta">Mi espacio académico</p>
                    <dl>
                        <div><dt>Universidad</dt><dd>UNIANDES</dd></div>
                        <div><dt>Materia</dt><dd>Aplicaciones Web</dd></div>
                        <div><dt>Tema</dt><dd>Introducción a HTML</dd></div>
                    </dl>
                </aside>
            </div>
        </section>

        <div class="contenedor">
            <div class="perfil">
                <section id="sobre-mi" aria-labelledby="titulo-sobre-mi">
                    <p class="numero-seccion">01 / Presentación</p>
                    <h2 id="titulo-sobre-mi">Sobre mí</h2>
                    <p>Soy Joel Solano y curso el sexto nivel de Ingeniería en Software en UNIANDES. Me interesa la programación y entender cómo una idea puede convertirse en una aplicación útil.</p>
                    <p>Con esta página pongo en práctica la estructura de HTML, los estilos de CSS y el procesamiento de datos con PHP. Mi objetivo es seguir aprendiendo y escribir código cada vez más claro y ordenado.</p>
                </section>

                <section id="formacion" aria-labelledby="titulo-formacion">
                    <p class="numero-seccion">02 / Estudios</p>
                    <h2 id="titulo-formacion">Formación académica</h2>
                    <div class="formacion-detalle">
                        <h3>Ingeniería en Software</h3>
                        <p>Universidad Regional Autónoma de los Andes<br><strong>UNIANDES · Sexto nivel</strong></p>
                        <p>Esta práctica corresponde a la materia Aplicaciones Web, impartida por el Ing. Luis Llerena.</p>
                    </div>
                </section>
            </div>

            <section class="seccion" id="conocimientos" aria-labelledby="titulo-conocimientos">
                <p class="numero-seccion">03 / Aprendizaje</p>
                <h2 id="titulo-conocimientos">Conocimientos y habilidades</h2>
                <p class="descripcion-seccion">En esta práctica trabajo con las siguientes herramientas y conceptos.</p>
                <dl class="conocimientos">
                    <div><dt>HTML5</dt><dd>Estructura de una página, secciones semánticas y formularios.</dd></div>
                    <div><dt>CSS3</dt><dd>Estilos, distribución del contenido y adaptación a pantallas pequeñas.</dd></div>
                    <div><dt>PHP</dt><dd>Variables, operaciones aritméticas, condicionales y validación de datos.</dd></div>
                    <div><dt>Herramientas de desarrollo</dt><dd>Visual Studio Code, XAMPP y Git para organizar el proyecto.</dd></div>
                </dl>
            </section>

            <section class="seccion" id="proyectos" aria-labelledby="titulo-proyectos">
                <p class="numero-seccion">04 / Trabajo en clase</p>
                <h2 id="titulo-proyectos">Proyectos académicos</h2>
                <article class="proyecto">
                    <div>
                        <p class="estado-proyecto">Práctica actual · Aplicaciones Web</p>
                        <h3>Página personal con calculadora</h3>
                        <p>Un sitio para presentar mi información académica e integrar una calculadora que procesa dos números en el servidor mediante PHP.</p>
                        <p class="tecnologias">HTML5 / CSS3 / PHP</p>
                    </div>
                    <a class="enlace" href="#calculadora">Probar calculadora <span aria-hidden="true">→</span></a>
                </article>
            </section>

            <section class="seccion calculadora" id="calculadora" aria-labelledby="titulo-calculadora">
                <div>
                    <p class="numero-seccion">05 / Práctica con PHP</p>
                    <h2 id="titulo-calculadora">Una calculadora sencilla.</h2>
                    <p>Ingresa dos números y elige la operación que quieres realizar. El resultado aparecerá aquí mismo.</p>
                    <p class="ayuda">Puedes usar números negativos y decimales. Para escribir un decimal, utiliza un punto; por ejemplo, 2.5.</p>
                </div>
                <form class="formulario" action="#calculadora" method="post">
                    <div class="campos-numeros">
                        <div>
                            <label for="numero-uno">Primer número</label>
                            <input type="number" id="numero-uno" name="numero_uno" step="any" placeholder="Ej. 12" value="<?= escapar($numeroUno) ?>" required>
                        </div>
                        <div>
                            <label for="numero-dos">Segundo número</label>
                            <input type="number" id="numero-dos" name="numero_dos" step="any" placeholder="Ej. 4" value="<?= escapar($numeroDos) ?>" required>
                        </div>
                    </div>
                    <label for="operacion">Operación</label>
                    <select id="operacion" name="operacion" required>
                        <?php if (!array_key_exists($operacion, $simbolos)): ?>
                            <option value="" selected disabled>Selecciona una operación válida</option>
                        <?php endif; ?>
                        <option value="sumar" <?= $operacion === 'sumar' ? 'selected' : '' ?>>Sumar (+)</option>
                        <option value="restar" <?= $operacion === 'restar' ? 'selected' : '' ?>>Restar (−)</option>
                        <option value="multiplicar" <?= $operacion === 'multiplicar' ? 'selected' : '' ?>>Multiplicar (×)</option>
                        <option value="dividir" <?= $operacion === 'dividir' ? 'selected' : '' ?>>Dividir (÷)</option>
                    </select>
                    <button class="boton" type="submit">Calcular resultado</button>
                    <div class="respuesta" aria-live="polite" aria-atomic="true">
                        <?php if ($error !== ''): ?>
                            <p class="mensaje-error" role="alert"><?= escapar($error) ?></p>
                        <?php elseif ($resultado !== null): ?>
                            <p class="rotulo-resultado">Resultado</p>
                            <p class="resultado"><output><?= escapar((string) ($resultado == 0 ? 0 : $resultado)) ?></output></p>
                            <p class="detalle-operacion"><?= escapar($numeroUno) ?> <?= escapar($simbolos[$operacion]) ?> <?= escapar($numeroDos) ?></p>
                        <?php else: ?>
                            <p class="ayuda">El resultado de tu operación se mostrará en este espacio.</p>
                        <?php endif; ?>
                    </div>
                </form>
            </section>
        </div>
    </main>

    <footer class="pie">
        <div class="contenedor pie-interior">
            <p><strong>Joel Solano</strong> · Ingeniería en Software</p>
            <p>UNIANDES · Aplicaciones Web · Sexto nivel</p>
        </div>
    </footer>
</body>
</html>
