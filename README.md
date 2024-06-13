
# Nombre de la tienda

## Versiones de los diferentes framework y lenguajes de programación: 

- **Laravel Framework PHP**: V11.0.1
- **PHP**: V8.2

# Tecnologías utilizadas para su desarollo
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white) ![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white) ![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E) ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) ![SQLite](https://img.shields.io/badge/sqlite-%2307405e.svg?style=for-the-badge&logo=sqlite&logoColor=white)
 ![NPM](https://img.shields.io/badge/NPM-%23CB3837.svg?style=for-the-badge&logo=npm&logoColor=white)
 
 
 
 ## 📖 Descripción del Proyecto

Bienvenido a **Crocheteando.com**, tu destino ideal para una experiencia de compra online sin igual. Nuestra plataforma no solo ofrece una amplia variedad de productos de alta calidad, sino que también garantiza una navegación intuitiva y un proceso de compra eficiente y seguro.


### Funcionalidades Principales

- **Añadir Productos al Carrito:** Los usuarios pueden explorar productos y añadirlos a su carrito de compras para una experiencia de compra fluida.
- **Sistema de Likes:** Los usuarios pueden dar "me gusta" a los productos, y gestionar y visualizar sus productos favoritos de manera sencilla.
- **Gestión Administrativa:** 
  - **Usuarios:** Los administradores pueden gestionar la base de usuarios, incuyendo la actualización de datos del usuario o de rol  y eliminación de cuentas.
  - **Productos:** Administración completa de los productos, desde añadir nuevos productos hasta la actualización y eliminación de los existentes. Los administradores también pueden definir los productos como disponibles o no disponibles, y gestionar los reportes gracias a una zona de contacto (En gmail).
  - **Categorías:** Los administradores pueden organizar los productos en categorías, facilitando la navegación y la gestión del inventario.
  - **Reportes:** Gestión de reportes enviados por los usuarios a través de la zona de contacto llegando a la cuenta de soporte gmail de la tienda.
  - **Pasarela de Pago:** Integración con una pasarela de pago  [Stripe](https://dashboard.stripe.com/test/dashboard) para realizar transacciones seguras y eficientes.

### Características Adicionales

- **Seguridad:** Implementación de prácticas de seguridad modernas para proteger la información de los usuarios y la integridad del sistema.
- **Rendimiento:** Optimización del rendimiento para garantizar tiempos de carga rápidos y una experiencia de usuario suave.
- **Escalabilidad:** Arquitectura escalable que permite añadir nuevas funcionalidades y manejar un incremento en el tráfico y las transacciones sin comprometer el rendimiento.
- **Responsividad:** Diseño responsivo que garantiza que la tienda se vea y funcione bien en dispositivos de escritorio, tabletas y móviles.

 
## 💻 Requisitos necesarios
- [Composer](https://getcomposer.org/)
- PHP versión (7.4 o posterior)
- [Node.js](https://nodejs.org/) (incluye npm)


## 🧑🏻‍💻 Instalación

### 🖱️ Clonar el repositorio

```
git clone https://github.com/Cu3nz/Proyecto-fin-de-grado-laravel.git
```



### Instalaciones previsas
> [!IMPORTANT]
> Importante para porder ejecutar el proyecto

### Instalar dependecias de PHP 

```
composer install
```

### Instalar dependecias de JavaScript
```
npm install
```

## Configurar el entorno

> [!IMPORTANT]
> Importante seguir estos pasos:

1. Ejecutar el siguiente comando: 
```
composer update 
```
2. Copiar el archivo de configuracion de ejemplo y renombrarlo a `.env`. 

    ```
    cp .env.example .env
    ```
    
3. Editar el archivo `.env ` con las configuraciones adecuadas para tu entorno


4. Generar la clave de la aplicación
 ```
 php artisan key:generate
 ``` 
4. Ejecutar las migraciones de la base de datos
```
php artisan migrate
``` 
> [!NOTE]
> En el caso de que quieras utilizar datos falsos tendras que hacer lo siguiente: 

- Recorres la siguiente estructura de datos `database/seeder/DatabaseSeeder.php` y descomentas todo el código. 

Para tener datos falsos deberas ejecutar el siguiente comando: 
```
php artisan migrate:fresh --seed
```

5. Compilamos los assets de frontend
```
npm run dev
```
6. Ejecutar el servidor local 
```
php artisan serve
```

Ahora deberias poder acceder a tu aplicacion en `http://localhost:8000`. 

## 🧑🏻‍💻 Autor
[![portfolio](https://img.shields.io/badge/my_portfolio-000?style=for-the-badge&logo=ko-fi&logoColor=white)]()
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/sergio-gallegos-guerrero-7525762a5/)
[![twitter](https://img.shields.io/badge/twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white)](https://twitter.com/) 
[![Gmail](https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white)](sergiogalledaw@gmail.com)



## Derechos Reservados
> [!WARNING]
> Leer atentamente

**Todo el contenido de este proyecto, incluyendo, pero no limitado a, el código fuente, documentación, imágenes y otros archivos, es propiedad exclusiva del autor. Ninguna parte de este proyecto puede ser reproducida, distribuida, ni transmitida de ninguna forma, ni por ningún medio, sin el permiso previo por escrito del autor.**
[![License: CC BY-NC-ND 4.0](https://licensebuttons.net/l/by-nc-nd/4.0/80x15.png)](https://creativecommons.org/licenses/by-nc-nd/4.0/)