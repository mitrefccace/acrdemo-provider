# ACE Connect Lite Version
# Provider Portal
### This is the Provider Portal.

## Installation on the Linux AWS instance:
1. Use WinSCP to copy the acrdemo-provider folder to /tmp on your host machine
1. Copy contents of /tmp/acrdemo-provider/ to /var/www/html
1. Run the user_data.sql script
1. Start MySQL (if down): sudo /etc/init.d/mysql start
1. Restart Apache: sudo service apache2 restart
1. Test: http://your host machine/

## Logging in:
1. http://your host machine/

## Environment...
1. WAMP
