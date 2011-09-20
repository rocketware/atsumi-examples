/* create db */
CREATE DATABASE atsumiexample
  WITH OWNER = atsumiexample
       ENCODING = 'UTF8';



/* create tables */
CREATE TABLE person
(
  id serial NOT NULL,
  first_name character varying NOT NULL,
  last_name character varying,
  alias character varying,
  description text,
  created timestamp with time zone NOT NULL DEFAULT now(),
  last_seen timestamp with time zone,
  dob date,
  CONSTRAINT person_pkey PRIMARY KEY (id)
)
WITH (OIDS=FALSE);