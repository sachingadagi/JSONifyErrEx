# JSONifyErrEx
Throw JSON serializable exceptions with customized message and error code handling

# How to use

Lets throw a quick exception

## Your Code

```
	try
	{
		JSONifyErrors::throw(JSONifyConstants::SAMPLE_ERROR);
	}
	catch(JSONifyErrors $e)
	{
		echo json_encode($e);
	}
```

## Output

```
{
	"message" : "Sample Error",
	"code" : 10003,
	"line" : 69
}
```

# Completely customizable

Create your custom error codes class

```
abstract class MyErrors
{
    const FIRST_ERROR = '991';
    const SECOND_ERROR = '992';
}
```

Define your custom errors list

```
{
	"991" : "My First Error",
	"992" : "My Second Error"
}
```

Define your main php file where your stuff would be invoked and configure JSON List only once

```
class MyMain
{
    public function __construct()
    {
        // First configure your JSONifyErrors with custom errors list
        JSONifyErrors::configure('MyErrorsList.json');
    }

    public function m1()
    {
        try
        {
            JSONifyErrors::throwError(MyErrors::FIRST_ERROR);
        } catch (JSONifyErrors $e) {
            echo json_encode($e);
        }
    }
}
```

Finally, call your main class to perform some activity

```
$myMain = new MyMain;
$myMain->m1();
```

Checkout this [sample code](sample)
