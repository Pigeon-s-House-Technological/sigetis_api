<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggersForBitacora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Trigger para INSERT en la tabla actividad
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_actividad_insert() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_nuevos, fecha, created_at, updated_at)
                VALUES (TG_TABLE_NAME, 'INSERT', row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_actividad_insert
            AFTER INSERT ON actividad
            FOR EACH ROW EXECUTE FUNCTION log_actividad_insert();
        ");

        // Trigger para UPDATE en la tabla actividad
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_actividad_update() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, datos_nuevos, fecha, created_at, updated_at)
                VALUES (TG_TABLE_NAME, 'UPDATE', row_to_json(OLD), row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_actividad_update
            AFTER UPDATE ON actividad
            FOR EACH ROW EXECUTE FUNCTION log_actividad_update();
        ");

        // Trigger para DELETE en la tabla actividad
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_actividad_delete() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, fecha, created_at, updated_at)
                VALUES (TG_TABLE_NAME, 'DELETE', row_to_json(OLD), NOW(), NOW(), NOW());
                RETURN OLD;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_actividad_delete
            AFTER DELETE ON actividad
            FOR EACH ROW EXECUTE FUNCTION log_actividad_delete();
        ");

        // Trigger para INSERT en la tabla users
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_user_insert() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('users', 'INSERT', row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_user_insert
            AFTER INSERT ON users
            FOR EACH ROW EXECUTE FUNCTION log_user_insert();
        ");

        // Trigger para UPDATE en la tabla users
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_user_update() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('users', 'UPDATE', row_to_json(OLD), row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_user_update
            AFTER UPDATE ON users
            FOR EACH ROW EXECUTE FUNCTION log_user_update();
        ");

        // Trigger para DELETE en la tabla users
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_user_delete() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, fecha, created_at, updated_at)
                VALUES ('users', 'DELETE', row_to_json(OLD), NOW(), NOW(), NOW());
                RETURN OLD;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_user_delete
            AFTER DELETE ON users
            FOR EACH ROW EXECUTE FUNCTION log_user_delete();
        ");

        // Trigger para INSERT en la tabla grupo
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_grupo_insert() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('grupo', 'INSERT', row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_grupo_insert
            AFTER INSERT ON grupo
            FOR EACH ROW EXECUTE FUNCTION log_grupo_insert();
        ");

        // Trigger para UPDATE en la tabla grupo
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_grupo_update() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('grupo', 'UPDATE', row_to_json(OLD), row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_grupo_update
            AFTER UPDATE ON grupo
            FOR EACH ROW EXECUTE FUNCTION log_grupo_update();
        ");

        // Trigger para DELETE en la tabla grupo
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_grupo_delete() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, fecha, created_at, updated_at)
                VALUES ('grupo', 'DELETE', row_to_json(OLD), NOW(), NOW(), NOW());
                RETURN OLD;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_grupo_delete
            AFTER DELETE ON grupo
            FOR EACH ROW EXECUTE FUNCTION log_grupo_delete();
        ");

        // Trigger para INSERT en la tabla usuario_grupo
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_usuario_grupo_insert() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('usuario_grupo', 'INSERT', row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_usuario_grupo_insert
            AFTER INSERT ON usuario_grupo
            FOR EACH ROW EXECUTE FUNCTION log_usuario_grupo_insert();
        ");

        // Trigger para UPDATE en la tabla usuario_grupo
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_usuario_grupo_update() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('usuario_grupo', 'UPDATE', row_to_json(OLD), row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_usuario_grupo_update
            AFTER UPDATE ON usuario_grupo
            FOR EACH ROW EXECUTE FUNCTION log_usuario_grupo_update();
        ");

        // Trigger para DELETE en la tabla usuario_grupo
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_usuario_grupo_delete() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, fecha, created_at, updated_at)
                VALUES ('usuario_grupo', 'DELETE', row_to_json(OLD), NOW(), NOW(), NOW());
                RETURN OLD;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_usuario_grupo_delete
            AFTER DELETE ON usuario_grupo
            FOR EACH ROW EXECUTE FUNCTION log_usuario_grupo_delete();
        ");

        // Trigger para INSERT en la tabla evaluacion
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_evaluacion_insert() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('evaluacion', 'INSERT', row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_evaluacion_insert
            AFTER INSERT ON evaluacion
            FOR EACH ROW EXECUTE FUNCTION log_evaluacion_insert();
        ");

        // Trigger para UPDATE en la tabla evaluacion
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_evaluacion_update() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('evaluacion', 'UPDATE', row_to_json(OLD), row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_evaluacion_update
            AFTER UPDATE ON evaluacion
            FOR EACH ROW EXECUTE FUNCTION log_evaluacion_update();
        ");

        // Trigger para DELETE en la tabla evaluacion
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_evaluacion_delete() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, fecha, created_at, updated_at)
                VALUES ('evaluacion', 'DELETE', row_to_json(OLD), NOW(), NOW(), NOW());
                RETURN OLD;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_evaluacion_delete
            AFTER DELETE ON evaluacion
            FOR EACH ROW EXECUTE FUNCTION log_evaluacion_delete();
        ");

        // Trigger para INSERT en la tabla criterio_evaluacion
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_criterio_evaluacion_insert() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('criterio_evaluacion', 'INSERT', row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_criterio_evaluacion_insert
            AFTER INSERT ON criterio_evaluacion
            FOR EACH ROW EXECUTE FUNCTION log_criterio_evaluacion_insert();
        ");

        // Trigger para UPDATE en la tabla criterio_evaluacion
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_criterio_evaluacion_update() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('criterio_evaluacion', 'UPDATE', row_to_json(OLD), row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_criterio_evaluacion_update
            AFTER UPDATE ON criterio_evaluacion
            FOR EACH ROW EXECUTE FUNCTION log_criterio_evaluacion_update();
        ");

        // Trigger para DELETE en la tabla criterio_evaluacion
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_criterio_evaluacion_delete() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, fecha, created_at, updated_at)
                VALUES ('criterio_evaluacion', 'DELETE', row_to_json(OLD), NOW(), NOW(), NOW());
                RETURN OLD;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_criterio_evaluacion_delete
            AFTER DELETE ON criterio_evaluacion
            FOR EACH ROW EXECUTE FUNCTION log_criterio_evaluacion_delete();
        ");

        // Trigger para INSERT en la tabla grupo_evaluacion
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_grupo_evaluacion_insert() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('grupo_evaluacion', 'INSERT', row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_grupo_evaluacion_insert
            AFTER INSERT ON grupo_evaluacion
            FOR EACH ROW EXECUTE FUNCTION log_grupo_evaluacion_insert();
        ");

        // Trigger para UPDATE en la tabla grupo_evaluacion
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_grupo_evaluacion_update() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('grupo_evaluacion', 'UPDATE', row_to_json(OLD), row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_grupo_evaluacion_update
            AFTER UPDATE ON grupo_evaluacion
            FOR EACH ROW EXECUTE FUNCTION log_grupo_evaluacion_update();
        ");

        // Trigger para DELETE en la tabla grupo_evaluacion
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_grupo_evaluacion_delete() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, fecha, created_at, updated_at)
                VALUES ('grupo_evaluacion', 'DELETE', row_to_json(OLD), NOW(), NOW(), NOW());
                RETURN OLD;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_grupo_evaluacion_delete
            AFTER DELETE ON grupo_evaluacion
            FOR EACH ROW EXECUTE FUNCTION log_grupo_evaluacion_delete();
        ");

        // Trigger para INSERT en la tabla sprint
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_sprint_insert() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('sprint', 'INSERT', row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_sprint_insert
            AFTER INSERT ON sprint
            FOR EACH ROW EXECUTE FUNCTION log_sprint_insert();
        ");

        // Trigger para UPDATE en la tabla sprint
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_sprint_update() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('sprint', 'UPDATE', row_to_json(OLD), row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_sprint_update
            AFTER UPDATE ON sprint
            FOR EACH ROW EXECUTE FUNCTION log_sprint_update();
        ");

        // Trigger para DELETE en la tabla sprint
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_sprint_delete() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, fecha, created_at, updated_at)
                VALUES ('sprint', 'DELETE', row_to_json(OLD), NOW(), NOW(), NOW());
                RETURN OLD;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_sprint_delete
            AFTER DELETE ON sprint
            FOR EACH ROW EXECUTE FUNCTION log_sprint_delete();
        ");

        // Trigger para INSERT en la tabla historia_usuario
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_historia_usuario_insert() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('historia_usuario', 'INSERT', row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_historia_usuario_insert
            AFTER INSERT ON historia_usuario
            FOR EACH ROW EXECUTE FUNCTION log_historia_usuario_insert();
        ");

        // Trigger para UPDATE en la tabla historia_usuario
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_historia_usuario_update() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('historia_usuario', 'UPDATE', row_to_json(OLD), row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_historia_usuario_update
            AFTER UPDATE ON historia_usuario
            FOR EACH ROW EXECUTE FUNCTION log_historia_usuario_update();
        ");

        // Trigger para DELETE en la tabla historia_usuario
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_historia_usuario_delete() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, fecha, created_at, updated_at)
                VALUES ('historia_usuario', 'DELETE', row_to_json(OLD), NOW(), NOW(), NOW());
                RETURN OLD;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_historia_usuario_delete
            AFTER DELETE ON historia_usuario
            FOR EACH ROW EXECUTE FUNCTION log_historia_usuario_delete();
        ");

        // Trigger para INSERT en la tabla elemento
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_elemento_insert() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('elemento', 'INSERT', row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_elemento_insert
            AFTER INSERT ON elemento
            FOR EACH ROW EXECUTE FUNCTION log_elemento_insert();
        ");

        // Trigger para UPDATE en la tabla elemento
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_elemento_update() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('elemento', 'UPDATE', row_to_json(OLD), row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_elemento_update
            AFTER UPDATE ON elemento
            FOR EACH ROW EXECUTE FUNCTION log_elemento_update();
        ");

        // Trigger para DELETE en la tabla elemento
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_elemento_delete() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, fecha, created_at, updated_at)
                VALUES ('elemento', 'DELETE', row_to_json(OLD), NOW(), NOW(), NOW());
                RETURN OLD;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_elemento_delete
            AFTER DELETE ON elemento
            FOR EACH ROW EXECUTE FUNCTION log_elemento_delete();
        ");

        // Trigger para INSERT en la tabla observacion
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_observacion_insert() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('observacion', 'INSERT', row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_observacion_insert
            AFTER INSERT ON observacion
            FOR EACH ROW EXECUTE FUNCTION log_observacion_insert();
        ");

        // Trigger para UPDATE en la tabla observacion
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_observacion_update() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, datos_nuevos, fecha, created_at, updated_at)
                VALUES ('observacion', 'UPDATE', row_to_json(OLD), row_to_json(NEW), NOW(), NOW(), NOW());
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_observacion_update
            AFTER UPDATE ON observacion
            FOR EACH ROW EXECUTE FUNCTION log_observacion_update();
        ");

        // Trigger para DELETE en la tabla observacion
        DB::unprepared("
            CREATE OR REPLACE FUNCTION log_observacion_delete() RETURNS TRIGGER AS $$
            BEGIN
                INSERT INTO bitacora (tabla, accion, datos_anteriores, fecha, created_at, updated_at)
                VALUES ('observacion', 'DELETE', row_to_json(OLD), NOW(), NOW(), NOW());
                RETURN OLD;
            END;
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER after_observacion_delete
            AFTER DELETE ON observacion
            FOR EACH ROW EXECUTE FUNCTION log_observacion_delete();
        ");

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar los triggers y funciones
        DB::unprepared('DROP TRIGGER IF EXISTS after_actividad_insert ON actividad');
        DB::unprepared('DROP FUNCTION IF EXISTS log_actividad_insert()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_actividad_update ON actividad');
        DB::unprepared('DROP FUNCTION IF EXISTS log_actividad_update()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_actividad_delete ON actividad');
        DB::unprepared('DROP FUNCTION IF EXISTS log_actividad_delete()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_user_insert ON users');
        DB::unprepared('DROP FUNCTION IF EXISTS log_user_insert()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_user_update ON users');
        DB::unprepared('DROP FUNCTION IF EXISTS log_user_update()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_user_delete ON users');
        DB::unprepared('DROP FUNCTION IF EXISTS log_user_delete()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_grupo_insert ON grupo');
        DB::unprepared('DROP FUNCTION IF EXISTS log_grupo_insert()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_grupo_update ON grupo');
        DB::unprepared('DROP FUNCTION IF EXISTS log_grupo_update()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_grupo_delete ON grupo');
        DB::unprepared('DROP FUNCTION IF EXISTS log_grupo_delete()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_usuario_grupo_insert ON usuario_grupo');
        DB::unprepared('DROP FUNCTION IF EXISTS log_usuario_grupo_insert()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_usuario_grupo_update ON usuario_grupo');
        DB::unprepared('DROP FUNCTION IF EXISTS log_usuario_grupo_update()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_usuario_grupo_delete ON usuario_grupo');
        DB::unprepared('DROP FUNCTION IF EXISTS log_usuario_grupo_delete()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_evaluacion_insert ON evaluacion');
        DB::unprepared('DROP FUNCTION IF EXISTS log_evaluacion_insert()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_evaluacion_update ON evaluacion');
        DB::unprepared('DROP FUNCTION IF EXISTS log_evaluacion_update()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_evaluacion_delete ON evaluacion');
        DB::unprepared('DROP FUNCTION IF EXISTS log_evaluacion_delete()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_criterio_evaluacion_insert ON criterio_evaluacion');
        DB::unprepared('DROP FUNCTION IF EXISTS log_criterio_evaluacion_insert()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_criterio_evaluacion_update ON criterio_evaluacion');
        DB::unprepared('DROP FUNCTION IF EXISTS log_criterio_evaluacion_update()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_criterio_evaluacion_delete ON criterio_evaluacion');
        DB::unprepared('DROP FUNCTION IF EXISTS log_criterio_evaluacion_delete()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_grupo_evaluacion_insert ON grupo_evaluacion');
        DB::unprepared('DROP FUNCTION IF EXISTS log_grupo_evaluacion_insert()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_grupo_evaluacion_update ON grupo_evaluacion');
        DB::unprepared('DROP FUNCTION IF EXISTS log_grupo_evaluacion_update()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_grupo_evaluacion_delete ON grupo_evaluacion');
        DB::unprepared('DROP FUNCTION IF EXISTS log_grupo_evaluacion_delete()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_sprint_insert ON sprint');
        DB::unprepared('DROP FUNCTION IF EXISTS log_sprint_insert()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_sprint_update ON sprint');
        DB::unprepared('DROP FUNCTION IF EXISTS log_sprint_update()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_sprint_delete ON sprint');
        DB::unprepared('DROP FUNCTION IF EXISTS log_sprint_delete()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_historia_usuario_insert ON historia_usuario');
        DB::unprepared('DROP FUNCTION IF EXISTS log_historia_usuario_insert()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_historia_usuario_update ON historia_usuario');
        DB::unprepared('DROP FUNCTION IF EXISTS log_historia_usuario_update()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_historia_usuario_delete ON historia_usuario');
        DB::unprepared('DROP FUNCTION IF EXISTS log_historia_usuario_delete()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_elemento_insert ON elemento');
        DB::unprepared('DROP FUNCTION IF EXISTS log_elemento_insert()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_elemento_update ON elemento');
        DB::unprepared('DROP FUNCTION IF EXISTS log_elemento_update()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_elemento_delete ON elemento');
        DB::unprepared('DROP FUNCTION IF EXISTS log_elemento_delete()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_observacion_insert ON observacion');
        DB::unprepared('DROP FUNCTION IF EXISTS log_observacion_insert()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_observacion_update ON observacion');
        DB::unprepared('DROP FUNCTION IF EXISTS log_observacion_update()');
        DB::unprepared('DROP TRIGGER IF EXISTS after_observacion_delete ON observacion');
        DB::unprepared('DROP FUNCTION IF EXISTS log_observacion_delete()');
    }
}
