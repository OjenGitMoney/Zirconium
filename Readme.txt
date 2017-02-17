Warning: 
- The batch file created has been fully tested in Windows Environment. 
- GRANT DBADM ON DATABASE TO USER DB2ADMIN will assume the dba Username is db2admin. (This is to Grant access on DB for php to make SQL calls)
- properties.php will need to be modified with your database's username and password


Setup and Launch:
1. Unzip this folder
2. Place the unzipped folder inside the XAMPP/htdocs/
(e.g. path would become like C:\xampp\htdocs\Goshtasb,Ojen_hw2)
3. open "properties.php" and put your DB2 username and password.
3. open the DB2 Command Window - Administrator
4. CD into the directory mentioned above like so for me it was.... CD C:\xampp\htdocs\Goshtasb,Ojen_hw2
5. Simply type "run cs174_Project" in the command prompt
(e.g. C:\xampp\htdocs\Goshtasb,Ojen_hw2>run cs174_Project)


Additional Notes:
The batch file is made to :
1. Drop database by the name of cs174 if it exists
2. Create database named CS174
3. Create tables names schools and restaurants
4. Import Data from appropriate CSV files into these tables
5. Enable Spatial Extender on these tables
6. Launch the default browser and navigate to HomePage of this assignment


Happy Grading :)
