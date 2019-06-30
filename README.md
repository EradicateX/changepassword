# Description
- This is a mocking web application to be automation tested by another automated project (https://github.com/phipgn/changepassword_automation).
- The main language was PHP for server-side, jQuery and Javascript for client-side, and MySQL for database. 
- This demo will be automated tested by another automation demo (https://github.com/phipgn/changepassword_automation).
- This project has been confirmed to work well on Chrome browser.

# Tools I've used to develop this mocking application:
- XAMPP 7.3.6: https://www.apachefriends.org/download.html. XAMPP is an easy to install Apache distribution containing MariaDB, PHP, and Perl. Just download and start the installer. It's that easy.
- Notepad++ (for writing the source code).

# How to deploy this demo locally?
- By default, the installation path for XAMPP will be at: C:\xampp
- By default, the deloy path for XAMPP will be at: C:\xampp\htdocs
- Clone this project, put it at: C:\xampp\htdocs\changepassword
- Launch XAMPP control UI at: C:\xampp\xampp-control.exe, start Apache and MySQL services.
- Once you started the MySQL service, go to http://localhost/phpmyadmin/ on your web browser, create a new database, name it "changepassword" and import the sql file from: C:\xampp\htdocs\changepassword\sql\changepassword.sql
- Open Chrome, and access http://localhost/changepassword/. If you can see a login screen, then you're good to go. Use this credential to login: pathana/avengeSevenfold@2019
- Then click on Chang Password link to go to Change Password function.
