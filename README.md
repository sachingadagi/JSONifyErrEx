# JSONifyErrEx
Utility class in PHP that prepares JSON from the Exception
Exceptions that may occur, especially when building a REST API's can cause problems in parsing http responses.
This class helps in generating JSON that can directly be passed as response object.

#How to use

Say you have following code

```
try
{
	/**/
}
catch (\PDOException $PDOE)
{
	
}
```
Whatever catch block you wish, now for in above example, use the code

```
try
{
	/**/
}
catch (\PDOException $PDOE)
{
	

	$je =  new JSONifyErrors($PDOE);
	$je->prepareJSON();
	return $je;
}
```

####Output(Nominal Example) :
```
{
"line": 115
"code": "23000"
"DevError": " Integrity constraint violation"
"trace": "#0 D:\Sai Labs\Tools\wamp\www\udaan\mappers\EventMapper.php(115): PDOStatement->execute(Array) #1 D:\Sai Labs\Tools\wamp\www\udaan\api\index.php(131): Udaan\EventMapper->createEvent(Object(Event)) #2 [internal function]: {closure}() #3 D:\Sai Labs\Tools\wamp\www\udaan\libs\Slim\Route.php(468): call_user_func_array(Object(Closure), Array) #4 D:\Sai Labs\Tools\wamp\www\udaan\libs\Slim\Slim.php(1357): Slim\Route->dispatch() #5 D:\Sai Labs\Tools\wamp\www\udaan\libs\Slim\Middleware\Flash.php(85): Slim\Slim->call() #6 D:\Sai Labs\Tools\wamp\www\udaan\libs\Slim\Middleware\MethodOverride.php(92): Slim\Middleware\Flash->call() #7 D:\Sai Labs\Tools\wamp\www\udaan\libs\Slim\Middleware\PrettyExceptions.php(67): Slim\Middleware\MethodOverride->call() #8 D:\Sai Labs\Tools\wamp\www\udaan\libs\Slim\Slim.php(1302): Slim\Middleware\PrettyExceptions->call() #9 D:\Sai Labs\Tools\wamp\www\udaan\api\index.php(232): Slim\Slim->run() #10 {main}"
}
```

####Further , if you wish to edit/update the json, you may do something like
```
if($result instanceof JSONifyErrors)
    {
        $status = 200;
        $response["code"] = $status;
        $response["message"] = "Some error occured.";
        $response["error"] = json_decode($result->jsonified_error);

        print json_encode($response);

    }
  ```  

###Updated JSON

```
{
"code": 200
"message": "Some error occured."
"error": {
"line": 115
"code": "23000"
"DevError": " Integrity constraint violation"
"trace": "#0 D:\Sai Labs\Tools\wamp\www\udaan\mappers\EventMapper.php(115): PDOStatement->execute(Array) #1 D:\Sai Labs\Tools\wamp\www\udaan\api\index.php(131): Udaan\EventMapper->createEvent(Object(Event)) #2 [internal function]: {closure}() #3 D:\Sai Labs\Tools\wamp\www\udaan\libs\Slim\Route.php(468): call_user_func_array(Object(Closure), Array) #4 D:\Sai Labs\Tools\wamp\www\udaan\libs\Slim\Slim.php(1357): Slim\Route->dispatch() #5 D:\Sai Labs\Tools\wamp\www\udaan\libs\Slim\Middleware\Flash.php(85): Slim\Slim->call() #6 D:\Sai Labs\Tools\wamp\www\udaan\libs\Slim\Middleware\MethodOverride.php(92): Slim\Middleware\Flash->call() #7 D:\Sai Labs\Tools\wamp\www\udaan\libs\Slim\Middleware\PrettyExceptions.php(67): Slim\Middleware\MethodOverride->call() #8 D:\Sai Labs\Tools\wamp\www\udaan\libs\Slim\Slim.php(1302): Slim\Middleware\PrettyExceptions->call() #9 D:\Sai Labs\Tools\wamp\www\udaan\api\index.php(232): Slim\Slim->run() #10 {main}"
}-
}
```
