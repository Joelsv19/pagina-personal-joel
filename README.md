# Página personal de Joel Solano

Práctica de la materia **Aplicaciones Web**, tema **Introducción a HTML**.

- Estudiante: Joel Solano.
- Carrera: Ingeniería en Software, sexto nivel.
- Universidad: UNIANDES.
- Docente: Ing. Luis Llerena.

La página incluye presentación personal, formación académica, conocimientos, un proyecto académico y una calculadora con suma, resta, multiplicación y división. El formulario envía los datos mediante POST y PHP realiza el cálculo en la misma página. Se validan los campos, la operación y la división entre cero; los valores se conservan y se escapan al mostrarlos.

## Tecnologías

HTML5, CSS3 y PHP. No utiliza JavaScript, frameworks, bases de datos ni servicios externos. Requiere PHP 7.4 o posterior; se recomienda XAMPP con PHP 8.

## Archivos

```text
index.php    Estructura HTML y procesamiento de la calculadora.
style.css    Estilos y adaptación a computadoras y teléfonos.
README.md    Descripción e instrucciones.
.gitignore   Exclusiones de archivos locales y temporales.
```

## Ejecutar con XAMPP

1. Instalar XAMPP y abrir su panel de control.
2. Copiar la carpeta del proyecto como `pagina-personal-joel` dentro de `C:\xampp\htdocs\`. Si XAMPP está instalado en otra ubicación, utilizar su carpeta `htdocs` (por ejemplo, `C:\xampp2\htdocs\`).
3. Iniciar **Apache**. No es necesario iniciar MySQL.
4. Abrir `http://localhost/pagina-personal-joel/` en el navegador. Si Apache utiliza otro puerto, incluirlo en la dirección.

Puedes abrir la carpeta en Visual Studio Code para editarla. Los datos personales y los textos se modifican en `index.php`; los colores y la distribución, en `style.css`. PHP necesita un servidor: abrir el archivo directamente o usar solo Live Server no ejecuta la calculadora.

## Comprobaciones manuales

| Prueba | Resultado esperado |
| --- | --- |
| 12 + 4 | 16 |
| 12 − 4 | 8 |
| −3 × 4 | −12 |
| 7 ÷ 2 | 3.5 |
| 1.5 + 2.25 | 3.75 |
| 0 + 0 | 0 |
| 5 ÷ 0 | Mensaje de error |
| Un campo vacío | El navegador solicita completarlo; PHP también valida si recibe un POST vacío |
| Datos no numéricos u operación inválida enviados directamente | Mensaje de error |

Después de calcular, comprobar que los dos números y la operación permanecen seleccionados. Revisar también los enlaces de navegación y la distribución en una pantalla de escritorio y en una de teléfono.

Para comprobar la sintaxis desde PowerShell con una instalación habitual de XAMPP:

```powershell
& 'C:\xampp\php\php.exe' -l index.php
```

## Pruebas realizadas

Se ejecutaron 25 comprobaciones HTTP con el servidor integrado de PHP 8.2.12: carga de la página y del CSS, diez cálculos, doce casos de validación y una comprobación de escape de datos. Todas pasaron. Incluyen campos vacíos, negativos, decimales, división entre cero, operaciones inválidas, arreglos enviados mediante POST y números fuera de rango.

La sintaxis se comprobó con PHP 8.2.12 y PHP 8.4.27, sin errores. En el navegador se verificaron el envío del formulario, la conservación de valores, el rechazo de campos vacíos y el mensaje de división entre cero. El diseño se revisó a 1440, 768, 390 y 320 píxeles de ancho, sin desbordamiento horizontal.

Estas pruebas utilizaron el servidor integrado de PHP; no se inició Apache para esta verificación.

## Repositorio de GitHub

Repositorio del proyecto: [Joelsv19/pagina-personal-joel](https://github.com/Joelsv19/pagina-personal-joel).

Para descargarlo con Git, abrir PowerShell dentro de la carpeta `htdocs` de XAMPP y ejecutar:

```powershell
git clone https://github.com/Joelsv19/pagina-personal-joel.git
cd pagina-personal-joel
```

Para subir cambios posteriores desde la carpeta del proyecto, con acceso autorizado al repositorio:

```powershell
git add index.php style.css README.md .gitignore
git commit -m "Actualizar página personal"
git push origin main
```

El medio de entrega es el enlace al repositorio de GitHub. No se utiliza OneDrive ni Google Drive como medio de entrega. **GitHub Pages no ejecuta PHP**: el repositorio almacena el código completo y la calculadora se ejecuta con XAMPP o con un servidor compatible con PHP.
