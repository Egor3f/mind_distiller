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

DROP TABLE IF EXISTS invitations;
DROP TABLE IF EXISTS assessments;
DROP TABLE IF EXISTS rationales;
DROP TABLE IF EXISTS assertions;
DROP TABLE IF EXISTS users;

-- Создать таблицу пользователей
CREATE TABLE users (
    user_id bigserial PRIMARY KEY,
    username text, -- Логин
    passwd text -- Хэш пароля
);
COMMENT ON TABLE users IS 'Таблица пользователей';
INSERT INTO users (username, passwd) VALUES ('NULL', '*');

-- Создать таблицу утверждений
CREATE TABLE assertions (
    assertion_id bigserial PRIMARY KEY,
    user_id bigint REFERENCES users (user_id), -- Автор утверждения
    assertion_text text, -- Текст утверждения
    weight bigint  -- "Вес" утверждения для сортировки
);
COMMENT ON TABLE assertions IS 'Таблица утверждений';
INSERT INTO assertions (user_id, assertion_text) VALUES (1, 'NULL');

-- Создать таблицу обоснований
CREATE TABLE rationales (
    rationale_id bigserial PRIMARY KEY,
    user_id bigint REFERENCES users (user_id), -- Автор обоснования
    assertion_id bigint REFERENCES assertions (assertion_id), -- Утверждение
    rationale_text text -- Обоснование
);
COMMENT ON TABLE rationales IS 'Таблица обоснований';
INSERT INTO rationales (user_id, assertion_id, rationale_text) VALUES (1, 1, 'NULL');

-- Создать таблицу оценок
CREATE TABLE assessments (
    assessment_id bigserial PRIMARY KEY,
    user_id bigint REFERENCES users (user_id), -- Автор оценки
    assertion_id bigint REFERENCES assertions (assertion_id), -- Оценённое утверждение
    assessment smallint, -- Степень согласия
    interest smallint, -- Оценка интересности вопроса
    priority smallint, -- Оценка важности вопроса
    tidy smallint, -- Оценка постановки вопроса
    rationale_id bigint REFERENCES rationales (rationale_id) -- Обоснование
);
COMMENT ON TABLE assessments IS 'Таблица оценок';

-- Создать таблицу приглашений
CREATE TABLE invitations (
    invitation_id bigserial PRIMARY KEY,
    user_id bigint REFERENCES users (user_id), -- Автор приглашения
    new_user_id bigint REFERENCES users (user_id), -- Пользователь, зарегистрировавшийся в ответ на приглашение
    invitation_key text, -- Случайный ключ для ссылки в письме-приглашении
    invitation_brief text, -- Краткий текст приглашения
    invitation_text text, -- Подробное описание приглашения
    email text, -- Почтовый адрес, по которому будет отправлено приглашение
    invitation_timestamp timestamp DEFAULT now() -- Дата создания (отправки) приглашения
);
COMMENT ON TABLE invitations IS 'Таблица приглашений';
