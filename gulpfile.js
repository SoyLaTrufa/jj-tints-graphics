const { parallel, src, dest, watch } = require("gulp");
const fs = require("fs");

const sass = require("gulp-sass");
sass.compiler = require("node-sass");

const autoprefixer = require("gulp-autoprefixer");
const gutil = require("gulp-util");
const notify = require("gulp-notify");
const plumber = require("gulp-plumber");
const RJSON = require("relaxed-json");
const ftp = require("vinyl-ftp");

/**
 * SASS
 * Compila los archivo SASS en un archivo CSS
 */
function sassCompile() {
  return src("./sass/main.sass")
    .pipe(
      plumber({
        errorHandler: reportError,
      })
    )
    .pipe(sass({ outputStyle: "expanded" }))
    .pipe(
      autoprefixer({
        cascade: false,
      })
    )
    .pipe(dest("sass/"));
}

function sassWatchAndCompile() {
  watch("./sass/**/*.sass", { delay: 500 }, sassCompile);
}

/**
 * Sube al servidor los archivos actualizados
 * Mira los cambios en los archivos locales (solo SASS) y los copia al servidor cuando se detecta un cambio
 */
function sassWatchAndDeploy() {
  var ftpConfig = loadFtpConfig();
  var conn = ftp.create({
    host: ftpConfig.host,
    user: ftpConfig.user,
    password: ftpConfig.password,
    parallel: 3,
    log: gutil.log,
  });

  const watcher = watch(["sass/**/*", "sass/*"]);
  watcher.on("change", function (path) {
    console.log(
      'Bien joven Padawan, has realizado cambios! Vamos a subir los files de la estrella de la muerte "' +
        path
    );

    return src([path], { base: ".", buffer: false }).pipe(
      conn.dest(ftpConfig.remote_path)
    );
  });
}

/**
 * Carga configuración FTP
 * Cargo la configuración del archivo del plugin SFTP del Sublime
 * https://github.com/davidtheclark/cosmiconfig
 */
function loadFtpConfig() {
  return RJSON.parse(
    RJSON.transform(fs.readFileSync("./sftp-config.json", "utf8"))
  );
}

/**
 * Manejador de errores
 * Muestra los mensajes de error como una notificación
 * https://github.com/mikaelbr/gulp-notify/issues/81#issuecomment-100422179
 */
function reportError(error) {
  var lineNumber = error.lineNumber ? "LINE " + error.lineNumber + " -- " : "";

  notify({
    title: "Error [" + error.plugin + "]",
    message: lineNumber + "<%= error.message %>",
    sound: "Sosumi", // See: https://github.com/mikaelbr/node-notifier#all-notification-options-with-their-defaults
  }).write(error);

  gutil.beep(); // Beep 'sosumi' again

  // Prevent the 'watch' task from stopping
  this.emit("end");
}

exports.sassCompile = sassWatchAndCompile;
exports.default = parallel(sassWatchAndCompile, sassWatchAndDeploy);
