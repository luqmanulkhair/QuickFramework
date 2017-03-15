# QuickFramework
PHP based framework for developing web applications.This framework was built to understand different design patterns such as MVC,Command,Factory etc

## Installation
Clone QuickFramework repository inside web accessible folder of a PHP based Web Server.

## Run
Use your server address followed by QuickFramework to access the index page.
e.g localhost:8080/QuickFramework

## Developement
Following conventions must followed to develop web application using QuickFramework.

### Controller Name:
Controller name should start in small letters followed by Controller keyword, and it should extend appController.Note the controller
file name should be similar as controller class name.

#### Example:
File name:userController.php        

```php
class userController extends appController{
private $view;
.......
...
.

}
```

### Action Name:
Action name should start from the small letters followd by Action keyword.

#### Example:

```php
class userController extends appController{

  public function printACtion(){ 

    echo "printAction";
    .....
    ..
    .
 
  }
}
```

### View Name:
All views related to particular controller should be placed inside a folder with the controller name as the folder name.Each view
is related to an action and view name should be same as action name followed by viewkeyword and .php extensions 

#### Example

Filename:actionnameview.php

```html
<!DOCTYPE html>
<html>
<body>

<h1>My First Heading</h1>
<p>My first paragraph.</p>

</body>
</html>
```

### Passing Data Between Modules:

* To put data inside view object inside controller use 
    ```php
    $this->view->datanem=datavalue;
    ```
* To access data from view object inside view use 
    ```php
    $this->view->dataitem
    ```
    
* For forms just specify the action name without specifying the file name
 ```html
    <form method="post" action="print">
      ...
    </form>   
 ```


