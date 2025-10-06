                                                      STUDENT MANAGEMENT REST API'S
                                             REST- Representational state transfer protocol
                                         (communicates by exchanging representations of resources using http methods)
                                                    client ---------------------- server
===============================================================================================================================================================================
1) CREATE DATABASE USING PHPMYADMIN.
   fields: id
           name                                  
           intake_class
           department_id
================================================================================================================================================================================


2)PHP CODE USING VISUAL STUDIO

=> script sets response to application(content type-JSON)
=> connects MYSQL DB using credentials
=> if connection fails, kills and returns error message.

===========================================================================================================================================
3)SWITCH ON XAMPP.

===========================================================================================================================================
4)CRUD OPERATIONS USING POSTMAN.

PROCESS IN API


________________  _______________________________    POST

  http method      request body(api end point)      button

=> client sends request with student data in request body using http method
=> PHP script reads input data
=> Validates it
=> On Success ,API returns success message 
=> unsuccessful , kills and returns error message.


1. C
create (POST) → Add Student

http://localhost/backend/student-api.php
Body → raw → JSON 
{

  "name": "Rohit Sharma",
  "date_of_birth": "2001-09-10",
  "intake_class": "CS301",
  "department_id": 1
}

-------------------------------------------------------
2. R
READ (GET) → Fetch Students

=>for id =?
http://localhost/backend/student-api.php?id=1

=>for all
http://localhost/backend/student-api.php

--------------------------------------------------------
3. U
UPDATE (PUT) → Update Student

http://localhost/backend/student-api.php?id=3
Body → raw → JSON
{
  "name": "Naresh Kumar Updated",
  "date_of_birth": "2002-05-15",
  "intake_class": "CS401",
  "department_id": 2
}

--------------------------------------------------------
4. D
DELETE (DELETE) → Remove Student
http://localhost/backend/student-api.php?id=1




===============================================================================================================================================
5)POSTED MY WORK USING GITHUB.

1.SQL CODE FOR CREATING DATABASE.
2.PHP CODE FOR MANAGING DATABASE.

===========================================================Thankyou============================================================================
3.READ ME INSTRUCTIONS.


