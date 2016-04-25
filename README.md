## Queue App

The application has been developed using PHP MVC Framework - Zend Framework 1, Responsive CSS Framework - Foundation.

Some tests are available within the tests folder.

### Database

MySQL database has been used for saving all data.

To install the database, please import into your chosen DBMS the sql file that you can find in public/db and replace the asterics in application.ini with your credentials on the following lines:

resources.db.params.host = ****
resources.db.params.username = ****
resources.db.params.password = ****
resources.db.params.dbname = ****


To run the app just go to {hostname}/QueueApp/public/