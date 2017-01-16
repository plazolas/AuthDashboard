# dashboard
Simple LAMP Responsive Dashboard for non-MVC Applications


FEATURES

* Simple MySQL CRUD Classes.
* Integrated PHPAuth with local user tables for admin password management.
* Integrated PHPMailer for admin notifications.
* Integrarted HTML2PHP for PDF document downloads feature.
* JQuery AJAX calls with added PHP Sessions and Cookies security check.
* Only admin user can create and manage other users and their passwords.
* Composer dependency friendly. 

DEMO INCLUDES

* User Manager
* Learning Center and Teacher Manager.
* Certification / Diplomas Manager.
* Take a quiz for certification with automatic result chekings.

ADDITIONAL INSTALATION NOTES

The certificates folder must be read write

Create dbConfig.php file outside public directory i.e:
<pre>
{
"server"    : "localhost",
"user"      : "root",
"password"  : "abc123",
"database"  : "dashboard"
}
</pre>
