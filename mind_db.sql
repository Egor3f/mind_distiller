-- Служебные операции PostgreSQL
SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';

SET search_path = public, pg_catalog;
SET default_tablespace = '';
SET default_with_oids = false;

-- Владельцем всех таблиц является служебная роль mind_distiller

-- Создать таблицу мнений и сменить владельца
CREATE TABLE assessments (
    user_id bigint,
    assertion_id bigint,
    assessment boolean,
    interest real,
    priority real,
    tidy real,
    mention text
);
ALTER TABLE public.assessments OWNER TO mind_distiller;

-- Создать таблицу утверждений и сменить владельца
CREATE TABLE assertions (
    assertion_id bigint,
    assertion text,
    weight bigint
);
ALTER TABLE public.assertions OWNER TO mind_distiller;

-- Создать таблицу пользователей и сменить владельца
CREATE TABLE users (
    user_id bigint,
    username character varying[],
    passwd character varying[]
);
ALTER TABLE public.users OWNER TO mind_distiller;

-- Закомментировать таблицы
COMMENT ON TABLE assessments IS 'Таблица согласий и мнений';
COMMENT ON TABLE assertions IS 'Таблица утверждений';
COMMENT ON TABLE users IS 'Таблица пользователей';

-- Принять данные с консоли
COPY assessments (user_id, assertion_id, assessment, interest, priority, tidy, mention) FROM stdin;
\.
COPY assertions (assertion_id, assertion, weight) FROM stdin;
\.
COPY users (user_id, username, passwd) FROM stdin;
\.

-- Поправка привелегий
REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM mind_distiller;
GRANT ALL ON SCHEMA public TO mind_distiller;
GRANT ALL ON SCHEMA public TO PUBLIC;

