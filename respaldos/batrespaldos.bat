@echo off
setlocal

REM Configurar la contraseña de PostgreSQL
set PGPASSWORD=1234

REM Obtener la fecha y hora actual en el formato YYYY_MM_DD_HH_MM
for /f "tokens=1-5 delims=/: " %%d in ("%date% %time%") do (
    set fecha=%%d_%%e_%%f_%%g_%%h
)

REM Reemplazar espacios en la variable fecha
set fecha=%fecha: =0%

REM Ruta del archivo de respaldo
set backup_file="C:\Users\boris\OneDrive\Escritorio\proyecto TIS\app\sigetis_api\respaldos\respaldo_%fecha%.backup"

REM Ruta del archivo de registro
set log_file="C:\Users\boris\OneDrive\Escritorio\proyecto TIS\app\sigetis_api\respaldos\backup_log.txt"

REM Mensaje de inicio
echo Iniciando respaldo de la base de datos... > %log_file%
echo Fecha y hora: %fecha% >> %log_file%

REM Ejecutar pg_dump para generar el respaldo y redirigir la salida al archivo de registro
pg_dump --host localhost --port 5432 --username "postgres" --format custom --file %backup_file% "sigeTIS" >> %log_file% 2>&1

REM Verificar si el comando pg_dump se ejecutó correctamente
if %ERRORLEVEL% neq 0 (
    echo Error al crear el respaldo de la base de datos. Revisa el archivo de registro para más detalles. >> %log_file%
) else (
    echo Respaldo de la base de datos creado exitosamente. >> %log_file%
)

REM Mensaje de finalización
echo Proceso completado. >> %log_file%

endlocal