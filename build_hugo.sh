#!/bin/bash
echo "BORRANDO DIRECTORIO PUBLIC"
rm -rf ./public
echo "COMPILANDO HUGO"
hugo

echo "COPIANDO ARCHIVOS DE DIRECTORIO BACKEND A PUBLIC"
cd ./backend
cp -r ./vendor ../public
cp ./composer.json ../public
cp ./composer.lock ../public
cp -r ./api ../public

cp ./formulario.php ../public
cp ./setting.php ../public



echo "SCRIPT FINALIZADO"
pause
