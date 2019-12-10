# jctc
INQUIRY Project
# Inquiry  System Project Plan

Requirement to use the System.
   - Login:
          User: ja      password: ja    Level:  Supervisors
          User: op      password: op    Level:  Operator

   - Secret Code to Override low production:  123456

   -Database System: SQLite

## What is it
It's a Website for a plant facility. This system has to interact with other system they use. We have to connect and read info from 3 tables of their system.
The customer wants to track where orders and items are as they move in the plant.  
The users have to log in the system and we have to different level access:
  - Operator level: They can access only to produce parts.
  - Supervisor level: They have access to check any order in the plant and print any info about it.

After the operator finish a part they have to update it in our system. The operator can't produce more parts than ir has in the Order. If for any reason the operator produce less quantity than in the Order. They have to ask the Supervisor to approve this operation typing a secrete code.
They use a form names "Travelers": Its a form with all info about the order to execute:  Order number, quantity to produce, date, Description, etc. d it goes with the item thru the plant.  Each item goes thru several machines depending on the process involved in the process.  


## Technical Summary

* Back End: PHP
* Database system: SQLite
* Front End:  HTML, CSS, JavaScript, JQuery, JSON, Bootstrap.

## Features

* Control User
  * Should check user name and password
* Tracking Inquiry Information
  * Fields
    * Scan Bard code
    * Operator
    * Machine
* Tracking Inquiry Display
  * Show order information
    * Order Number
    * Line Number
    * Customer
    * Order Database
    * Quantity
  * Should offer the Options to access
    * Start Production
    * Enter Quantity Produce
    * Display Tracking
    * Display Travelers
    * Print Traveler (A sheet with all information about the order.

## Milestone List

1. Create web interface to enter User Information
   1. Create query to access the Database to validate user name and password
   2. Create the personal user environment to the logged user.
   3. Add validations
2. Create a web interface to edit all info about the order
   1. Create a user interface to introduce the order details
      * Enter the bar code of the Order.
      * The name of the machine to be use to do the work.
   2. Create a query to access the database to validate the info.
3. Create a web interface to introduce the Tracking inquiry information.
   1. Create a user interface to introduce all details about the order.
      * Introduce Order Number.
      * Introduce the number of Lines (quantity of process to do).
   2. Create a query to access the database and retrieve the order history.
      * Display all historic info about this order in the plant.
   3. Create a query to update the status of the order in the database
   4. Display or send the printer the Traveler in PDF.
4. Design the Database Scheme to store all information about the Orders.
   1. Design all data base necessary for the System and the relationship between each others.
      1. Create the Database Scheme using SQLite. Name: jctc.
      2.Create the Table and Column to be use in SQLite.
        1. Table: EHM
        2. Table: EIM
        3. Table: MACHINES
        4. Table: FMLOCHIST
   2. Introduce basic information to test the system.
      1. Introduce all type of machine  to the MACHINES Table.
      2. Introduce basic information to the tables: EHM, EIM, FMLOCHIST.


5. Create a PHP Class to access all tables in the Database JCTC.
   1. Create the class, define the attributes and methods for the class.
      1. Class name: DataAccess.
      2. Attribute for the Class: $user, $registered, $server, $pass, $hash.
      3. Methods for the class: connect(), getOrderHeader(), getOrderItem(), getTrackLocHistory(), insertHistoric().
   2. Create the constructor method and the database connection with our SQLite Database.
      1. The constructor name:  __construct( $user=false, $pass=false ).
   3. Code in PHP all access method in the Class.
6. Create a procedure to avoid that the operator produce more items than the quantity in the order.
   1. Create an Event in Javascript  to check the table the historic of the production in our SQLite Database.
   2. Create a new method in our DataAccess PHP Class to return the quantity produce with this order and line number.

7. Allow only the Supervisors to authorize less quantity to produce  than the quantity in the order.
   1. Create in new table with the  field: Code and Supervisor, to have a secret code for each supervisor.
   2. Implement an Event in JavaScript to validate the quantity produced.
      1. When the Operator type the quantity produced, the system automatic check his production.
      2. An event is launched asking the operator for the secret Code to accept this production.
8. Refactoring.
