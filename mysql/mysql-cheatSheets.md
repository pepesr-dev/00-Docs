# MySql - Cheat Sheets
## Básicos
| Elemento | Acción | Sintaxis |
| :--- | :--- | :--- |
| **-u root -p**| Iniciar como root| `mysql -u root -p` |
| **mysql.user** | | `SELECT user, host FROM mysql.user;` |
## DCL
| Elemento | Acción | Sintaxis |
| :--- | :--- | :--- |
| **CREATE USER** | Crear usuario | `CREATE USER 'userName'@'localhost' IDENTIFIED BY 'userPass';` |
| **GRANT ALL PRIVILEGES** | Cambia privilegios | `GRANT ALL PRIVILEGES ON db_notas.* TO 'pepe'@'localhost';` |
| **FLUSH PRIVILEGES** | Aplica los privilegios | `FLUSH PRIVILEGES;` |
| **DROP USER** | Eliminar usuario | `DROP USER 'pepe'@'localhost` |
