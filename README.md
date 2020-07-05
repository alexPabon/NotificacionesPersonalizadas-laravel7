### <p align="center">Personalizando Notificicaciones y restablecimiento de contraseña</p>

[Enlace de la aplicacion](http://notificaciones.alexpabon.es/ "Notificacione personalizadas")

##### Restalecimiento de contraseña
Como modificar el email que se envía para restablecer la contraseña. Las notificaciones son parte del código fuente de Laravel, por lo tanto, no debemos de cambiarla, sino que debemos crear nuestra propia notificación y personalizarla.

Para crear la notificación con artisan:

	•	Php artisan make:notification ResetPasswordNotification

Después de crear la notificación, abrimos el contenido de la carpeta de notifications, la clase de ResetPassword.php y copiamos su contenido en la notificación que hemos creado y tambien los imports
   
Ruta para abrir la notificación y copiar contenido:

	•	vendor\laravel\framework\src\Illuminate\Auth\Notifications\ResetPassword.php

Ruta para pegar el contenido:

	•	app\Notifications\ResetPasswordNotification.php

Ruta para copiar el metodo y añadirlo al model de user.php

	•	vendor\laravel\framework\src\Illuminate\Auth\Passwords\CanResetPassword.php

Copiamos el siguiente metodo

```[php]

/**
* Send the password reset notification.
*
* @param  string  $token
* @return void
*/
public function sendPasswordResetNotification($token)
{
$this->notify(new ResetPasswordNotification($token));
}
```

Este modelo debemos pegarlo en nuestro model de user.php, 
Ruta User.php`

	•	app\models\User.php

También debemos añadir el import:

	•	use App\Notifications\ResetPasswordNotification;

Es importante que el envío de notificaciones se haga por medio de colas de trabajo Queue.
Para crear la tabla Jobs:

	•	php artisan queue:table

En nuestra notificación abrimos la clase ResetPasswordNotification.php y añadimos implements ShouldQueue.
Ruta

	•	app\Notifications\ResetPasswordNotification.php

Import:

	•	use Illuminate\Contracts\Queue\ShouldQueue;
	•	use Illuminate\Support\Facades\Lang;

En la clase:




	class ResetPasswordNotification extends Notification implements ShouldQueue
	{
	    use Queueable;




Nota.
Para que se pueda ejecutar Queue, en el fichero  .env se debe especificar redis, database

ej: `QUEUE_CONNECTION=database` 

Para modificar la plantilla de restablecer contraseña:

	•	app\Notifications\ResetPasswordNotification.php

Para modificar la plantilla base del mail:
	
	•	php artisan vendor:publish --tag=Laravel-notifications
	•	resources\views\vendor\notifications\email.blade.php

	
## <p align="center">Personalizar verificación de email en Laravel 7</p>

Como modificar el email que se envía para la verificación del Email. Las notificaciones son parte del código fuente de Laravel, por lo tanto, no debemos de cambiarla, sino que debemos crear nuestra propia notificación y personalizarla.

Primero debemos habilitar la verificación de email, que por defecto viene deshabilitada.

•	En el modelo user.php debemos implementar la interfaz MustVerifyEmail
 
	o	use Illuminate\Contracts\Auth\MustVerifyEmail;
	
•	En rutes/web.php

	o	Auth::routes(['verify'=>true]);
	
•	Middleware para la verificación, se puede agregar a cualquier ruta para protegerla y comprobar si han verificado su email

	o	Route::get('/home','HomeController@index')->name('home')->middleware('verified');

Para crear la notificación con artisan:

	•	Php artisan make:notification verifyEmail
	
Después de crear la notificación, abrimos el contenido de la carpeta de notifications, la clase de verifyEmail.php y copiamos su contenido en la notificación que hemos creado y tambien los imports
   
Ruta para abrir la notificación y copiar contenido:

	vendor\laravel\framework\src\Illuminate\Auth\Notifications\VerifyEmail.php
	 
Ruta para pegar el contenido:

	•	app\Notifications\ verifyEmail.php
	
Imports

		use Illuminate\Support\Carbon;
		use Illuminate\Support\Facades\Config;
		use Illuminate\Support\Facades\Lang;
		use Illuminate\Support\Facades\URL;
	
Ruta para copiar el metodo y añadirlo al model de user.php

	•	vendor\laravel\framework\src\Illuminate\Contracts\Auth\MustVerifyEmail.php
	
Metodo a copiar

	/**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification();


Este modelo debemos pegarlo en nuestro model de user.php, 

Ruta User.php

	•	app\models\User.php
	
También debemos añadir el import:

	•	use App\Notifications\ verifyEmail;

Metodo del modelo user.php
	
	/**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification(){
        $this->notify(new verifyEmail());
    }


Es importante que el envío de notificaciones se haga por medio de colas de trabajo Queue.

Para crear la tabla Jobs:

	•	php artisan queue:table

En nuestra notificación abrimos la clase verifyEmail.php y añadimos implements ShouldQueue.

Ruta

	•	app\Notifications\ verifyEmail.php

Import:

	•	use Illuminate\Contracts\Queue\ShouldQueue;
	•	use Illuminate\Support\Carbon;
	•	use Illuminate\Support\Facades\Config;
	•	use Illuminate\Support\Facades\Lang;
	•	use Illuminate\Support\Facades\URL; 

En la clase:

	class verifyEmail extends Notification implements ShouldQueue
	{
	    use Queueable;
	    /**

<b>Nota.</b>

Para que se pueda ejecutar Queue, en el fichero  .env se debe especificar redis, database 

ej: `QUEUE_CONNECTION=database` 

Para modificar la plantilla de verificar email:

	•	app\Notifications\ verifyEmail.php

Para modificar la plantilla base del mail:

	•	php artisan vendor:publish --tag=Laravel-notifications
	•	resources\views\vendor\notifications\email.blade.php

