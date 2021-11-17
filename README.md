**Assignment 3**

**Purpose**

- Upon completion of assignment 3 you will be able to:
  - Write a program using PHP and mysql that connects to a backend database
  - Allow a user to make updates, insertions, deletions and query a database
  - Create a program that runs on the internet
  - Create a Graphical User Interface using HTML and CSS

**Instructions**

MAKE SURE YOU PUT ALL YOUR CODE IN A SUBFOLDER OF /var/www/html called *a3yourmiddlename*  (e.g. mine would be a3kathryn) AND MAKE SURE YOU SET THE PERMISSIONS AS FOLLOWS ON YOUR cs3319.gaul.csd.uwo.ca SITE:

***cd ~
cd /var/www/html
mkdir a3yourmiddlename
chmod 755 a3yourmiddlename***

We are making the name *a3yourmiddlename* so that the name of your folder is unique and people can't see your code without you explicitly giving them the URL, I.E. so that the other students in the course can't find your folder and copy your html. They can't copy your php because it is hidden but they could copy your interface (your html, css and javascript files) so if you make the folder called a3yourmiddlename, it is hard for any student to guess that. If you do NOT have a middlename just pick a first name you wished your parents had given you :-) !

Put all your code in *a3yourmiddlename* folder and subfolders of *a3yourmiddlename*. Your URL will then be:
***http://cs3319.gaul.csd.uwo.ca/vm???/a3yourmiddlename***

Make sure all your files in the a3yourmiddlename directory have a permission of 644 (to do this, inside your a3yourmiddlename folder do this command):
***chmod 644 filename.php
chmod 755 anysubdirectoriesthatyoumakeina3middlenamefolder***

Using the database you created for assignment 2,CSS, HTML, PHP and MySQL (and JavaScript if you want, but you don't have to use JavaScript. It is possible to do the whole assignment without using JavaScript), create a website  that allows someone to update the Bus Trip, Booking, Passenger, Passport and Bus tables.  Here are the tasks a user must be able to complete

- List all the Bus Trip Data.  Allow the user to order the courses by Trip Name OR by Country (you might want to use a radio button for this choice).  For each of these 2 fields (name or country)  allow the user to either order them in ascending or descending order (you could also use a radio button for this choice). 
- Allow the user to select one of the Bus Trips listed and change the trip name, start date or end date and the image URL but  NOT allow the user to modify the trip id or the country. 
  - add an extra field to the bus trip table called urlmage (you can do this right in mysql at the command line,  not using php code, make it char(255) and allow it to be null). Allow the user to click on one of the bus trips and if this field is null then let the user find an image online of the location for the trip  and add the url to the bus trip table AND display the image in your user interface. If the field is not null, display the image at the url, otherwise, if the field is null just display a placeholder picture or an empty square, either is fine.  Here are some images that use use the URLs for: <https://csd.uwo.ca/~lreid2/cs3319/assignments/assignment3/pics/>). You might want to check that the URL ends with .jpg or .gif so that the image will display properly.
  - You do not need to allow them to change the bus (you can if you want but it is not required for this section, just for the add new trip section)
- Allow the user to select one of the trips listed and delete that trip. If the trip has any bookings, make sure you let the user know that that trip cannot be deleted. Any permanent deletions should always allow the user the chance to back out. 
- Allow the user to enter a new trip.  The user should be able to enter all the information including a URL of a trip picture (but they could leave this NULL also). Make sure they enter a valid bus for the trip (you could make the bus a dropdown or a radio button).   If the user enters a trip id that already exists, give the user a warning message and do not allow it to be entered into the system. 
- Allow the user to select a country and see all the bus trips from that country.
- Allow the user to create a booking for a trip. The user should be able to pick an existing passenger and an existing trip and then enter the price for that trip.
- List all the info about the passengers including passport information in order by last name.
- Select a passenger and see all of his/her bookings.
- Allow the user to delete a booking.
- List all the bus trips that don't any bookings yet. 
- MAKE SURE YOU LEAVE YOUR PROGRAM FULL OF DATA so that the Peer Markers CAN TEST YOUR PROGRAM WELL and not run out of test data.

It is a good habit to disconnect from a database once you have finished using it, make sure you program disconnects from the database. 

Remember that PHP can get large and cluttered, your application will be marked partly on your structure, comments and modularity, don't put everything in one file, try using PHP *includes* and functions and  separate files to break up the PHP code. Also put comments in your code (but dont include your name, just put something like :
Programmer Name: ??  (where ?? is the last 2 digits of your western student number)

NOTE: you **cannot** use any third party DAL frameworks that let you avoid writing SQL queries/statements. We want you get experience writing SQL with this assignment.

**Handing in your assignment:**

You are required to submit the following via Owl:

- In the kritik.io submission textbox put: the URL for your working application so the peer markers can try out your program.
- In the kritik.io attach/upload: all files (.php and .html and .js and .css and extra files ) used to create your application.  Please zip them together and just upload the .zip file.  

**Late Policy:**

- 5% off for each day late. You can be up to THREE days late. 



**GRADING IN KRITIK**

Once the last day to hand in has passed you will be sent an email from kritik.io with 5 or 6 students whose code you must mark. You will get 3 days to do your peer marking. Then you will have 1 day to evaluate the feedback you were given.


