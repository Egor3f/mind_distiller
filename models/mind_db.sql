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

-- Создать таблицу мнений
CREATE TABLE assessments (
    user_id bigint, -- Ответивший пользователь
    assertion_id bigint, -- Оценённое утверждение
    assessment boolean, -- Согласие
    interest real, -- Оценка интересности вопроса
    priority real, -- Оценка важности вопроса
    tidy real, -- Оценка постановки вопроса
    mention text -- Комментарий
);
ALTER TABLE public.assessments OWNER TO mind_distiller;
COMMENT ON TABLE assessments IS 'Таблица согласий и мнений';

-- Создать таблицу утверждений
CREATE TABLE assertions (
    assertion_id bigint,
    user_id int, -- Автор утверждения
    assertion text, -- Текст утверждения
    weight bigint  -- "Вес" утверждения для сортировки
);
ALTER TABLE public.assertions OWNER TO mind_distiller;
COMMENT ON TABLE assertions IS 'Таблица утверждений';

-- Создать таблицу пользователей
CREATE TABLE users (
    user_id int,
    username character varying[], -- Логин
    passwd character varying[] -- Хэш пароля
);
COMMENT ON TABLE users IS 'Таблица пользователей';
ALTER TABLE public.users OWNER TO mind_distiller;

-- Заполнение таблиц с консоли
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

