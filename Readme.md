# ZOO Arcadia-Eric Soret 

This repository is a ECF project for Study SCHOOL. Written with SYMFONY 7

 * Proprietary 
 * Written by Eric Soret ericdu974@gmail.com>.

**Author**: https://github.com/Ericphoto35


## Documentation 

## Installation Instruction 

* PHP 8.3
* SQL >= 8.0
* Symfony 7
  
## View
![Capture d'écran 2024-05-18 211911](https://github.com/Ericphoto35/arcadia/assets/150171033/d5cc9add-1cc1-49f2-85e9-af62f4270f35)

## Installation 
1- Clone the current repository:
```
https://github.com/Ericphoto35/arcadia.git
```
<br>**Githug cli :**<br> 
```
gh repo clone Ericphoto35/arcadia
```
2- Move in and create few .env.{environment}.local files, according to your environments with your default configuration. 
Local images for "services", "habitats" and "animals are here
```
arcadia/public/assets/image
```
3- Set your DATABASE_URL in .env.{environment}.local files and run these commands :
```
$ composer install        # Install all PHP packages
$ php bin/console d:d:c   # Create your DATABASE related to your .env.local configuration
$ php bin/console d:m:m   # Run migrations to setup your DATABASE according to your entities
```

## Usage
```
$ symfony server:start    # Use this command to start a local server.
```
