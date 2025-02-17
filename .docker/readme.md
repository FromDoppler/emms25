*Pasos a seguir para correr la nueva version de Docker por primera vez.*
- Apagar cualquier otro servicio de docker y xampp que haya prendido.
- Borrar la carpeta node_modules y el archivo package-lock.json de la raiz del theme.
- Hacer un docker up.
- Enjoy.

*Pasos a seguir para generar los archivos de deploy del Theme por primera vez.*
- Entrar por consola a la maquina virtual del theme.
- Correr el comando npm cache clear --force.
- Correr el comando npm run serve:prod.
- Enjoy.