db2 DROP DATABASE cs174 
db2 CREATE DATABASE cs174 

db2 connect to cs174
db2 GRANT DBADM ON DATABASE TO USER DB2ADMIN

rem // SETUP THE SCHOOL TABLE, IMPORT DATA, ENABLE SPATIAL EXTENDER
db2 -td"^" -f Scripts/create_school.sql
db2 import from Resources/schools.csv of del insert into school (name1,name2,street,city,state,zip,county,long,lat)


rem // SETUP THE RESTAURANT TABLE, IMPORT DATA, ENABLE SPATIAL EXTENDER
db2 -td"^" -f Scripts/create_restaurant.sql
db2 import from Resources/restaurant.csv of del insert into restaurant (name1,name2,street,city,state,zip,county,long,lat)

db2 "create bufferpool bp8k pagesize 8 k" 
db2 "create system temporary tablespace tmpsys8k pagesize 8 k bufferpool bp8k"

db2se enable_db cs174

db2 ALTER TABLE school ADD loc db2gse.ST_Point
db2 UPDATE school SET loc =db2gse.ST_Point(long, lat, 1)

db2 ALTER TABLE restaurant ADD loc db2gse.ST_Point
db2 UPDATE restaurant SET loc =db2gse.ST_Point(long, lat, 1)

start http://localhost/Goshtasb,Ojen_hw2/

rem db2 disconnect cs174 