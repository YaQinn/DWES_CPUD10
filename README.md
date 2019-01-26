# DWES_CPUD10
Entrega del Caso Práctico del Tema10 de la asignatura DWES.

• SITUACIÓN: 
Una aplicación móvil quiere acceder a nuestra base de datos nba. Para ello generaremos un API que le proporcionará las acciones necesarias para poder interactuar con la base de datos.

• INSTRUCCIONES: 
Generaremos el API completo con un CRUD completo sobre la tabla equipos de la base de datos nba. Deberemos: 
    • Comprobar que el método solicitado por el cliente es el correcto, GET, POST, PUT o DELETE 
    • Comprobar que los datos solicitados son los correctos 
    • Devolver la información a través de JSON: 
        ◦ Si se ha solicitado datos tipo SELECT, se devuelven dichos datos 
        ◦ Si se ha realizado un INSERT o UPDATE se devuelven los datos una vez insertados, es decir, se tendrá que realizar un SELECT posterior al INSERT o UPDATE 
        ◦ Si se produce algún error, se devuelve un JSON marcando el error

Para las comprobaciones del buen funcionamiento se utilizará la herramienta POSTMAN.
