const { src, dest, watch, series, parallel } = require('gulp');

// Sass es un preprocesador de CSS que te permite escribir CSS de manera más eficiente
const sass = require('gulp-sass')(require('sass'));

// autoprefixer es útil para garantizar que el código CSS sea compatible con una amplia gama de navegadores web
const autoprefixer = require('autoprefixer');

// PostCSS puede ser útil para procesar automáticamente el código CSS y mejorar la compatibilidad del navegador.
const postcss = require('gulp-postcss')

// sourcemaps son útiles para simplificar la depuración de errores o problemas en el código, especialmente cuando se utiliza código minificado o compilado en un sitio web o una aplicación.
const sourcemaps = require('gulp-sourcemaps')

// CSSNano es útil para optimizar y reducir el tamaño del archivo CSS, lo que puede mejorar el rendimiento del sitio web o la aplicación. Puede eliminar reglas CSS innecesarias, comprimir el código CSS y realizar otras optimizaciones para mejorar la velocidad de carga del sitio.
const cssnano = require('cssnano');

// concat es útil para concatenar múltiples archivos en uno solo en el proceso de construcción de una aplicación o sitio web, lo que puede mejorar el rendimiento del sitio y reducir el número de solicitudes HTTP.
const concat = require('gulp-concat');

// Terser es útil para minimizar y ofuscar archivos JavaScript en el proceso de construcción de una aplicación o sitio web
const terser = require('gulp-terser-js');

// rename es útil para cambiar el nombre o la extensión de los archivos procesados por una tarea en Gulp
const rename = require('gulp-rename');

// comprimir y optimizar imágenes en un proyecto web
const imagemin = require('gulp-imagemin');

// te permite reducir el tiempo que tardan las tareas en ejecutarse al evitar que se vuelvan a procesar archivos que no han cambiado desde la última vez que se ejecutó la tarea.
const cache = require('gulp-cache');

// se utiliza para eliminar archivos y carpetas en un proyecto de Gulp. Esta herramienta es útil para borrar archivos innecesarios o carpetas generadas por otras tareas
const clean = require('gulp-clean');

// WebP es un formato de imagen desarrollado por Google que ofrece una mejor calidad de imagen con un tamaño de archivo más pequeño en comparación con otros formatos de imagen comunes
const webp = require('gulp-webp');

// se utiliza para definir rutas de acceso relativas a las tareas que se están ejecutando.
const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    imagenes: 'src/img/**/*'
}

function css() {
    return src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer(), cssnano()]))
        // .pipe(postcss([autoprefixer()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./public/build/css'));
}

function javascript() {
    return src(paths.js)
      .pipe(sourcemaps.init())
      .pipe(concat('bundle.js'))
      .pipe(terser())
      .pipe(sourcemaps.write('.'))
      .pipe(rename({ suffix: '.min' }))
      .pipe(dest('./public/build/js'))
}

function imagenes() {
    return src(paths.imagenes)
        .pipe(cache(imagemin({ optimizationLevel: 3 })))
        .pipe(dest('./public/build/img'))
}

function versionWebp() {
    return src(paths.imagenes)
        .pipe(webp())
        .pipe(dest('./public/build/img'))
}


function watchArchivos() {
    watch(paths.scss, css);
    watch(paths.js, javascript);
    watch(paths.imagenes, imagenes);
    watch(paths.imagenes, versionWebp);
}

exports.css = css;
exports.watchArchivos = watchArchivos;
exports.default = parallel(css, javascript, imagenes, versionWebp, watchArchivos); 
exports.build = parallel(css, javascript, imagenes, versionWebp); 