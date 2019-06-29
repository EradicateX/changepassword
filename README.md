# changepassword
- A demo web application for changing the password.
- The main language was PHP for server-side, jQuery and Javascript for client-side, and MySQL for database. 
- This demo will be automated tested by another automation demo.
- This project has been confirmed to work well on Chrome browser.

## How to deploy this demo locally?
- You need to install XAMPP first: https://www.apachefriends.org/download.html.
- XAMPP is an easy to install Apache distribution containing MariaDB, PHP, and Perl. Just download and start the installer. It's that easy.
- By default, the installation path for XAMPP will be at: C:\xampp
- By default, the deloy path for XAMPP will be at: C:\xampp\htdocs
- Clone this project, put it at: C:\xampp\htdocs\changepassword
- Launch XAMPP control UI at: C:\xampp\xampp-control.exe, start Apache and MySQL services.
- Once you started the MySQL service, go to http://localhost/phpmyadmin/ on your web browser, create a new database, name it "changepassword" and import the sql file from: C:\xampp\htdocs\changepassword\sql\changepassword.sql
- Open Chrome, and access http://localhost/changepassword/. If you can see a login screen, then you're good to go. Use this credential to login: pathana/avengeSevenfold@2019
- Then click on Chang Password link to go to Change Password function.

## Video Tutorial:
- To make it more easy, I made a video to give you a quick overview about this project: 
