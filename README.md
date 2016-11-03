# Provider Portal
### This is the Provider Portal.

## Installation on the Linux AWS instance:
1. Clone this repository
1. Copy contents to /var/www/html
1. Run the db/portaldb.sql script (MySQL user: user, pass: password)
1. Start MySQL (if down): sudo /etc/init.d/mysql start
1. Restart Apache: sudo service apache2 restart
1. Test: http://localhost/ (default login: user1/password1, admin login: user2/password2)

## Logging in:
1. http://localhost/

## Configuration
Add your MySQL information in the config.ini file.

## Environment
1. LAMP

## USERVER
The USERVER is included in the Provider Portal repository in the userver folder. See the README.md file in the userver folder for configuration instructions.