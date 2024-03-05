--
-- Base de datos: matricula
--
CREATE DATABASE IF NOT EXISTS matricula;
USE matricula;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla users
--

CREATE TABLE IF NOT EXISTS users (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  is_admin tinyint(1) DEFAULT '0'
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla students
--

CREATE TABLE IF NOT EXISTS students (
  id SERIAL PRIMARY KEY,
  ci VARCHAR(11) UNIQUE NOT NULL,
  name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  gender VARCHAR(9) NOT NULL,
  address VARCHAR(255) NOT NULL
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla matricula
--

CREATE TABLE IF NOT EXISTS matricula (
  id SERIAL PRIMARY KEY,
  student_id BIGINT UNSIGNED NOT NULL,
  no_matricula VARCHAR(8) UNIQUE NOT NULL,
  grade VARCHAR(50) NOT NULL,
  grupo VARCHAR(50) NOT NULL,
  regime VARCHAR(255) NOT NULL,
  school VARCHAR(255) NOT NULL,
  FOREIGN KEY(student_id) REFERENCES students(id) ON DELETE CASCADE
);