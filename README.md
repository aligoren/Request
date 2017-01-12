# Request

Simple PHP Request Handler

**Handle Requests with PHP**

## Usage:

**is_***

```php
Request::is_post();      // true ? false
Request::is_get();       // true ? false
Request::is_put();       // true ? false
Request::is_delete();    // true ? false
Request::is_head();      // true ? false
Request::is_options();   // true ? false
```

**Set Request Type**

```php

// Set any type (PUT, POST, GET, HEAD, PATCH, LINK..)

Request::Set('PUT', function() {
  parse_str(file_get_contents('php://input'), $post_var);

  echo $post_var[txtNewRequest];
});
```

**POST Request**

```php
Request::Post(function() {
	echo $_POST[txtNewRequest];
});
```

**GET Request**

```php
Request::Get(function() {
	echo $_POST[txtNewRequest];
});
```

**HEAD Request**

```php
echo Request::Head();
```

**OPTIONS Request**

```php
// ORIGIN
echo Request::Options('ORIGIN');

// METHODS
echo Request::Options('METHODS', array('POST', 'GET', 'PUT', 'DELETE', 'HEAD'));

// HEADERS
echo Request::Options('HEADERS');

// ALL
echo Request::Options();

```

**PATCH Request**

```php
Request::Patch(function() {
	echo 'This is patch!';
});
```
