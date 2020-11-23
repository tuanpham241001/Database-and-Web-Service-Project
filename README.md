# DBWS-Project_19
You can use this repository for submission
- Link to website: http://clabsql.clamv.jacobs-university.de/~tpham/maintenance.php

# HW8 note: 
If you go to the Maintenance page and not log in, you are directed to the Login page and there you have to login in order to go to the Maintenance page.

You can log out using the logout in the navigation bar


Credentials:


username: group19

password: test12345

or

username: TA

password: otmanesabir


# HW9 note:

The codes and diagrams for log analysis can be found under the Web/Log_analysis

We have checked into the error_log file but we have not had any error stored on that page (because we only uploaded the webiste after checking everything). On the other hand, we found some errors on the access_log page and decided to plot it instead. 

The code can be run on normal desktop, we have a function to download files from CLAMV server. There are some libraries in Python that we used and you may need to install it:
(apache_log_parser, pandas, matplotlib) on Python and sshpass on Linux. You can find more information at the comment on top of the page

# HW10 note

We combined the bonus question into our code, i.e send a request with the current string as typed by the user after every character typed by the user and
adjust our server-side function to accept the string as search input

Demo page: http://clabsql.clamv.jacobs-university.de/~tpham/demo/

Code for demos can be found: Web/public_html/Demo

Also, since our search page only has one field "College name" where we can incorporate this suggestion, so we only modify that field in our search page. To test the functionality: http://clabsql.clamv.jacobs-university.de/~tpham/search/query1/search1.php and start typing (me -> College Nordmetall and Mercator)

Code of Demo on github: 
