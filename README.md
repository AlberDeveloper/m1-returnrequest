# Especificaciones módulo para prueba CSENGINE

### Petición


> Hacer un módulo que permita a un customer registrado enviar una petición de devolución de un pedido y que esta quede registrada y sea visible desde el backend.
> Puntos claves:
> ** Crear una opción nueva dentro del menú de usuario registrado.
> ** El formulario de la petición ha de incluir un desplegable donde salgan todos los números de pedidos que haya hecho el usuario y un campo de descripción.
> ** El formulario ha de tener validación de campos.
> ** Se tiene que enviar un email al cliente diciéndole que su petición se ha recibido y que se le dirá algo en breve.

### Trabajo realizado

Se ha creado un módulo llamado “ReturnRequest” de la compañía “Alberto”, en la _codePool_ “local”.

### Estructura

La estructura del módulo es la siguiente:

 ── app
    ├── code
    │   └── local
    │       └── Alberto
    │           └── ReturnRequest
    │               ├── Block
    │               │   └── Sales
    │               │       └── Order.php
    │               ├── controllers
    │               │   ├── RequestController.php
    │               │   └── ReturnController.php
    │               ├── etc
    │               │   └── config.xml
    │               ├── Helper
    │               │   └── Data.php
    │               ├── Model
    │               │   └── Sales
    │               │       └── Order.php
    │               └── sql
    │                   └── returnrequest_setup
    │                       └── mysql4-install-0.1.0.php
    ├── design
    │   └── frontend
    │       └── base
    │           └── default
    │               ├── layout
    │               │   └── returns.xml
    │               └── template
    │                   └── sales
    │                       └── order
    │                           └── return
    │                               └── form.phtml
    └── etc
        └── modules
            └── Alberto_ReturnRequest.xml


### Funcionamiento
Primero debemos tener una cuenta de cliente en la tienda y hacer un pedido. En nuestro panel de cliente, veremos un nuevo menú “Return Request”:

Si tenemos algún pedido que podamos devolver, nos saldrá en un listado en el desplegable del formulario de la petición:

Así mismo, tenemos un campo de texto donde poner nuestras observaciones o comentarios.  
Si no tenemos ningún pedido que podamos devolver, no se mostrará el formulario.

Una vez realizada la petición,podemos acceder al backend y ver todos los pedidos que se nos ha solicitado su devolución, dentro de pedidos: Sales → Orders  
Podemos filtrar por el estado _Return request_

Y a partir de aquí, el gestor de la tienda, contactará con el cliente y hará las gestiones necesarias del pedido.
