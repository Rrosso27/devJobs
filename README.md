
  
  
  ## Ejecutar todo 🚀  
  Con este comando puedes desplegar el proyecto mediante docker   
  ~~~bash  
    docker-compose up -d --build
  ~~~
  Visita:

  Laravel: http://localhost:8080

  Vite dev server: http://localhost:5173
  
  ## Configurar proyecto
  (1) Accede al contenedor PHP de tu app: 
  ~~~bash  
    docker-compose exec app bash
  ~~~
  (2) Dentro del contenedor, ejecuta:
  ~~~bash  
    composer install
  ~~~ 
  (3) Genera la  key:
  ~~~bash  
    php artisan key:generate
  ~~~ 
  (4) Genera las migraciones:
  ~~~bash  
    php artisan migrate
  ~~~
  (5) Ejecuta los seeders:
  ~~~bash  
    php artisan db:seed 
  ~~~ 
  (6)Crea el enlace simbólico dentro del contenedor:
    ~~~bash  
        php artisan storage:link
    ~~~ 
