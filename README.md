# jctc
INQUIRY Project
# Inquiry  System Project Plan

## What is it
Its a Website for a plant facility. The customer wants to track where orders and items are as they move thru the plant.  Travelers are a piece of paper displaying all the info on a order and it goes with the item thru the plant.  Each item goes thru several machines depending on the process involved.  
Screen will show traveler information necessary to perform job. Inquiry Screen will show the movement of each item per order.

## Technical Summary

* PHP
* MySQL/DB2
* HTML, CSS, JavaScript, JQuery, JSON, Bootstrap: For front end

## Features

* Control User
  * Should check user name and password
  * Show profile information
    * email
    * first name
    * last name
  * Must create a different profile for Operator and Supervisor.

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
    * Print Traveler

## Milestone List

1. Create web interface to enter User Information
   1. Create query to access the Database to validate user name and pasword
   2. Create the personal user enviroment to the loged user.
   3. Add validations
2. Create a web interface to edit all info about the order
   1. Create a user interface to introduce the order details
   2. Create a query to access the database to validate the info.
3. Create a web interface to introduce the Tracking inquiry information.
   1. Create a user interface to introduce all details about the order.
   2. Create a query to access the database and retrieve the order history
   3. Create a query to update the status of the order in the database
