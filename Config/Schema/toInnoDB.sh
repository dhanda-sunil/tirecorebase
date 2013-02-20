DBNAME=somedb
DBUSER=someuser
DBPASS=somepassword

# Used parenthesis for the initial 'mysql' command so we can have a heredoc and still
# pipe stdout back into mysql.
# The tail command skips the first line of output, so we have only the ALTER TABLE commands.
# After all that, pipe the output back into the mysql command.

(mysql -u$DBUSER -p$DBPASS $DBNAME << ENDSQL
SELECT CONCAT('ALTER TABLE ', table_name, ' ENGINE=InnoDB;')
FROM information_schema.tables
WHERE table_schema = '$DBNAME'
AND engine = 'MyISAM'
ORDER BY table_name DESC;
ENDSQL
) | tail -n +2 | mysql -u$DBUSER -p$DBPASS $DBNAME