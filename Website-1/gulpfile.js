var gulp = require('gulp')
var sass = require('gulp-sass')
var browserSync = require('browser-sync').create()


//compilar scss em css
function style() {
    //1. onde está meu arquivo scss
    return gulp.src('./scss/**/*.scss')
    //2  passar esse arquivo através do compilador sass
    .pipe(sass())
    //3. onde eu salvo o css compilado
    .pipe(gulp.dest('./css'))
    //4. alterações de fluxo para o navegador atualizar automatico
    .pipe(browserSync.stream());
}

//navegador atualizar automatico
function watch(){
    browserSync.init({
        server: {
            baseDir:'./'
        }
    })

    gulp.watch('./scss/**/*.scss', style)
    gulp.watch('./*.html').on('change', browserSync.reload)
    gulp.watch('./js/**/*.js').on('change', browserSync.reload)
}


exports.style = style
exports.watch = watch