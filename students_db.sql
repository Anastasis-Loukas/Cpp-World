DROP DATABASE IF EXISTS pada_students;
CREATE DATABASE pada_students;
USE pada_students;

CREATE TABLE students(am INT(10) NOT NULL AUTO_INCREMENT, firstName VARCHAR(25), lastName VARCHAR(25), email VARCHAR(25), password VARCHAR(25), grade1 FLOAT(7), grade2 FLOAT(7), grade3 FLOAT(7), grade4 FLOAT(7), grade5 FLOAT(7), final_grade FLOAT(7), PRIMARY KEY(am));
ALTER TABLE students AUTO_INCREMENT=1000;
INSERT INTO students(firstName, lastName, email, password)
VALUES('Αναστάσιος', 'Λουκάς', 'cs171077@uniwa.gr', '67890');
DROP USER IF EXISTS 'pada_admin'@'localhost';
CREATE USER 'pada_admin'@'localhost' IDENTIFIED BY 'admin';
GRANT ALL PRIVILEGES ON pada_students.* TO 'pada_admin'@'localhost';