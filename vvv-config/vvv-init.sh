# Make a database, if we don't already have one
echo "Creating database (if it's not already there)"
mysql -u root --password=root -e "CREATE DATABASE IF NOT EXISTS cwp"
mysql -u root --password=root -e "GRANT ALL PRIVILEGES ON cwp* TO wp@localhost IDENTIFIED BY 'wp';"
