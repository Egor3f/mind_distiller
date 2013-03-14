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

-- Создать таблицу пользователей
CREATE TABLE users (
    user_id bigserial PRIMARY KEY,
    username text, -- Логин
    passwd text -- Хэш пароля
);
COMMENT ON TABLE users IS 'Таблица пользователей';
ALTER TABLE public.users OWNER TO mind_distiller;
INSERT INTO users (username, passwd) VALUES ('NULL', '*');

-- Создать таблицу утверждений
CREATE TABLE assertions (
    assertion_id bigserial PRIMARY KEY,
    user_id bigserial REFERENCES users (user_id), -- Автор утверждения
    assertion_text text, -- Текст утверждения
    weight bigint  -- "Вес" утверждения для сортировки
);
ALTER TABLE public.assertions OWNER TO mind_distiller;
COMMENT ON TABLE assertions IS 'Таблица утверждений';
INSERT INTO assertions (user_id, assertion_text) VALUES (1, 'NULL');

-- Создать таблицу обоснований
CREATE TABLE rationales (
    rationale_id bigserial PRIMARY KEY,
    user_id bigserial REFERENCES users (user_id), -- Автор обоснования
    assertion_id bigserial REFERENCES assertions (assertion_id), -- Утверждение
    rationale_text text -- Обоснование
);
ALTER TABLE public.rationales OWNER TO mind_distiller;
COMMENT ON TABLE rationales IS 'Таблица обоснований';
INSERT INTO rationales (user_id, assertion_id, rationale_text) VALUES (1, 1, 'NULL');

-- Создать таблицу оценок
CREATE TABLE assessments (
    user_id bigserial REFERENCES users (user_id), -- Автор оценки
    assertion_id bigserial REFERENCES assertions (assertion_id), -- Оценённое утверждение
    assessment boolean, -- Согласие
    interest smallint, -- Оценка интересности вопроса
    priority smallint, -- Оценка важности вопроса
    tidy smallint, -- Оценка постановки вопроса
    rationale_id bigserial REFERENCES rationales (rationale_id) -- Обоснование
);
ALTER TABLE public.assessments OWNER TO mind_distiller;
COMMENT ON TABLE assessments IS 'Таблица оценок';

-- Поправка привелегий
REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM mind_distiller;
GRANT ALL ON SCHEMA public TO mind_distiller;
GRANT ALL ON SCHEMA public TO PUBLIC;
