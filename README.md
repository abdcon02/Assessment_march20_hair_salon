##Developers
Connor Abdelnoor

##Date
March 20 2015

##Description
This hair_salon app will let the user create a list of stylists and clients who belong to each stylist.

##Use and Editing
To use the app, download the source code and run it in on your php server.
You will need to create a psql database with the following tables and attributes:<br />
psql commands: <br />
CREATE DATABASE hair_salon; <br />
\c hair_salon
CREATE TABLE stylist (id serial PRIMARY KEY, name varchar);<br />
CREATE TABLE client (id serial PRIMARY KEY, name varchar, stylist_id int);<br />
CREATE DATABASE hair_salon_test WITH TEMPLATE hair_salon; <br />

To edit the app, download the source code and open it in your text editor. <br />
    *Note: If you are copying any of the code to your own directories, you need to install Composer
    in your root directory.*

##Copyright (c) 2015 Connor Abdelnoor & Kyle Giard-Chase
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
