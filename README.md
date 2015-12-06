# JSONifyErrEx
Utility class in PHP that prepares JSON from the Errors/Exception

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