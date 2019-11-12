# jctc
INQUIRY Project
# Inquiry  System Project Plan

## What is it
Its a Website for a plant facility. The customer wants to track where orders and items are as they move thru the plant.  Travelers are a piece of paper displaying all the info on a order and it goes with the item thru the plant.  Each item goes thru several machines depending on the process involved.  
Screen will show traveler information necessary to perform job. Inquiry Screen will show the movement of each item per order.

## Technical Summary

* PHP
* SQLite
* HTML, CSS, JavaScript, JQuery, JSON, Bootstrap: For front end

## Features

* Control User
  * Should check user name and password
  * Show profile information
    * Email
    * First Name
    * Last Name

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
      1: Class name: DataAccess.
      2. Attribute for the Class: $user, $registered, $server, $pass, $hash.
      3. Methods for the class: connect(), getOrderHeader(), getOrderItem(), getTrackLocHistory(), insertHistoric().
   2. Create the constructor method and the database connection with our SQLite Database.
      1. The constructor name:  __construct( $user=false, $pass=false ).
   3. Code in PHP all access method in the Class.
6.
7.
