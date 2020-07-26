
# Description

This test project display a full SOLID bootstrap using the lumen framework, some of the features includes: 


 - Service Logging (Responses can be logged from the Controller class)

#Assumptions

Am going with the assumption that this endpoint always works

Am not adding any validation factory as this was not part of the test

# laravel-lumen-docker
Laravel, Lumen platform dockerization

## Start environment
To start docker environment in your favorite terminal:
```sh
make docker-start
```
When the process finished you can open your browser and digit http://localhost:8181 to se you app works!

## Stop environment
To stop your environment you must digit this command in your favorite terminal:
```sh
make docker-stop
```

## Testing

No unit test was added, but please try out the api by importing the postman collection included in this root dir.
