# Lumen PHP Framework With JWT authentication

There are many libraries that helps to implement Authorization via jwt token, to avoide reinventing the wheel i choose "#tymon/jwt-auth" 

The application has three endpoints: 

| **Endpoint** 	| **Method**     	|
|---------------|------------------	|
| /login   	    | POST          	|
| /register	    | POST           	|
| /hash 	    | GET           	|

## Documentation

Endpoints have the following perms:


# /login
````
    {
	    "email" : "sample@sample.com",
	    "password" : "sample123"
    }
    
````

# /register
````
    {
		"name"  : "sample",
		"email" : "sample@sample.com",
		"password" : "sample123"
    }
````

# /hash

````
    {
		token : "Bearer xyzxvyzsvyz"
    }

````
This token is assign and responded while logining in 

## Dependencies

- [rehan/ree-random-hash](https://packagist.org/packages/rehan/ree-random-hash)   - For random hash generating
- [tymon/jwt-auth](https://github.com/tymondesigns/jwt-auth)                      - For authentication using JSON Web Tokens
- [phpunit/phpunit]                                                               - For unit tests

