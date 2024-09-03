Steps to run this application

>>> Download XAMPP server, install it.
Open XAMPP Server, run APACHE, MYSQL and TOMCAT.


>>> Importing the DB,
Go inside login_projects/assets/
in this folder you will find a login.sql file, this is the file which contains all the table necessary to run this project.
Now go to your browser and type http://localhost/phpmyadmin/ and hit ENTER.
>>> in the phpmyadmin page you will find there is a option called IMPORT, click on IMPORT > Choose file to Import (here select the login.sql file) > Click on the "Immport" button at the end of the page.
>>> Now once refresh the page and you will see login database is created.


>>>Once DB is created open a new tab in your browser and enter this URL http://localhost/login_projects/index.php and hit enter, create a new credential and login using the new credential that's all from there you can explore the site.
