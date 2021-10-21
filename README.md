<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
    <a href="https://www.uagrm.edu.bo/" target="_blank">
        <img src="https://www.uagrm.edu.bo/img/uagrm-escudo.png" width="400">
    </a>
</p>

# Taller de laravel
En este repositorio encontraras el proyecto de laravel dado por Roberto Dominguez hacia los estudiantes de la FICCT-UAGRM.


# Sistema de información para gestionar apuntes de la UAGRM
La UAGRM requiere un sistema de información para gestionar los apuntes de las materias de cada carrera, de manera ordenada, donde cada materia puede tener diversos apuntes, estos pueden ser almacenados en los siguientes formatos: imagen, texto, archivo o url.
Los apuntes tendrán un título y el contenido.
Los alumnos podrán tener acceso a los apuntes ingresando a una página principal donde seleccionaran de una lista de materias, los apuntes de la materia interesada, además estos se pueden sub-dividir por temas.
Un tema puede tener varios apuntes.

Solo pueden añadir apuntes los usuarios registrados en el sistema, los cuales serán registrados por un administrador. Además, los usuarios pertenecen a una carrera y solo podrán añadir apuntes de materias de la carrera.
Se necesita saber cuántos apuntes ha añadido cada usuario. 







# Preparando el entorno de desarrollo

## 1) Instalar Composer
https://getcomposer.org/download/
## 2) Actualizar/Instalar laravel
### Desinstalar el paquete (si ya lo tienes)
composer global remove laravel/installer

## Reinstalar/instalar
composer global require laravel/installer

## 3) Instalar XAMPP
<a href="https://www.apachefriends.org/es/index.html">
https://www.apachefriends.org/es/index.html
</a>

## 4) Instalar Visual Studio Code
<a href="https://code.visualstudio.com/">
https://code.visualstudio.com/
</a>


## Comandos de laravel 8
### Iniciar un servidor local con laravel (php) 
php artisan serve
### Servidor local avanzado
php artisan serve --port=8001 --host =ip

### Migracion o creacion de la base de datos
php artisan migrate 
php artisan migrate:fresh --seed

### Crear modelos, controladores, migraciones,seeds
<p>php artisan make:model nombre</p>
<p>php artisan make:controller nombre</p>
<p>php artisan make:migration nombre</p>
<p>php artisan make:seeder nombre</p>

### Crear migracion,seeder,modelo,controlador con un solo comando
php artisan make:model nombre -a

## Para iniciar un proyecto bajado de github
 #### 1) Copiar .env.example y pegarlo como .env
 #### 2) Configurar las credenciales de la db
 #### 3) Ejecutar los comandos
 composer install
 php artisan key:generate
 #### 4) Enlazar la carpeta storage con la carpeta public
 php artisan storage:link


# Canal de youtube
<p align="center">
    <a href="https://www.youtube.com/channel/UCPoHHJbICtEhASSQo52I3PA/playlists">
        <img src="https://www.gstatic.com/youtube/img/branding/youtubelogo/svg/youtubelogo.svg" width="400">    
    </a>
</p>

