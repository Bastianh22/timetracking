--
-- Create database: 'timetracking'
--

CREATE DATABASE IF NOT EXISTS timetracking;

-- --------------------------------------------------------

--
-- Go to the database
--

USE timetracking;

--
-- Create table and table structure for table 'tasks'
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` serial NOT NULL,
  `name` varchar(50) NOT NULL,
  `duration` int(30) NOT NULL,
  `date` date NOT NULL,
  CONSTRAINT client_pkey PRIMARY KEY (task_id)
);