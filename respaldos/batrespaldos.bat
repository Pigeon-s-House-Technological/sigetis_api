@echo off
set PGPASSWORD=1234
set fecha=%date:~6,4%_%date:~3,2%_%date:~0,2%_%time:~0,2%_%time:~3,2%
pg_dump --host localhost --port 5432 --username "postgres" --format custom --file "C:\respaldo_%fecha%.backup" "sigeTIS"