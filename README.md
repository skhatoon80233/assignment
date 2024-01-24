<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


=========================Assignment Documentation==============================================

Questions:1- The API should handle errors and return appropriate error messages with
HTTP status codes.

Answer:-

Handling errors in an API and returning appropriate HTTP status codes and error messages is crucial for providing a good developer experience. Here's a general approach using Laravel as an example:

	public function search(Request $request){
        $origin = $request->origin;
        $depature = $request->depature;
        $destination = $request->destination;
        
        $flight = Flight::where([
            ['origin', $origin ],
            ['destination', $destination],
            ['depature', $depature]
        ])->get();

        if($flight->count() > 0){
            return response()->json([
                "status"=>200,
                "data"=>$flight
            ],200);
        }else{
            return response()->json([
                "status"=>404,
                "data"=>"No Record found"
            ],404);
        }
	}


This example uses a try-catch block to catch any exceptions that might occur during the execution of the code. Based on the type of exception, it sets appropriate HTTP status codes and error messages in the response. 


Question:5 The API should handle errors and return appropriate error messages with
HTTP status codes.


Question:6. Implement pagination for the available flights endpoint, allowing users to
limit the number of results returned per page and navigate to other pages.

	Pagination:
	Implementation in Laravel:

	In Laravel, you can use the paginate method provided by Eloquent to paginate query results. Here's an example of how you might paginate a list of flights:

	// Controller method
	public function getPaginatedFlights(Request $request)
	{
    		$perPage = $request->query('per_page', 10); // Number of items per page
    		$flights = Flight::with('origin', 'destination')->paginate($perPage);

    		return response()->json($flights);
	}

Question:7 Implement caching for the flight search endpoint, allowing users to retrieve
the results of a search quickly without hitting the database again.



Questoin 7. Implement caching for the flight search endpoint, allowing users to retrieve
the results of a search quickly without hitting the database again.

	To implement caching for the flight search endpoint, you can use Laravel's caching mechanisms. In the example below, I'll illustrate how to cache the search results for a specified duration, allowing users to retrieve the results quickly without hitting the database again.

	Assuming you have a flight search endpoint like /api/flights/search, where users can search for flights based on certain criteria (e.g., origin name), here is how you might implement caching:
	
	public function search(Request $request){
        	$origin = $request->origin;
        	$depature = $request->depature;
        	$destination = $request->destination;
        	$flight = Flight::where([['origin', $origin ],['destination', $destination],['depature', $depature]])->get();

        	if($flight->count() > 0){
            		return response()->json(["status"=>200,"data"=>$flight],200);
        	}
        	return response()->json(["status"=>404,"data"=>"No Record found"],404);
    	}


Deliverables:
==============
Question:1 pository containing the code for the API
	Create a GitHub account:
	f you don't have one already, sign up for a GitHub account at https://github.com/.

	Create a new repository:

	Click on the "+" sign in the top right corner of the GitHub page.
	Select "New repository."
	Choose a name for your repository, add a description, and configure other settings.
	Click "Create repository."
	Push your code to GitHub:

	Follow the instructions provided by GitHub to push your existing code to the newly created repository.
	Share the repository link:

	Once your code is on GitHub, you can share the link to your repository with others.
	For example, your repository link might look like:


	https://github.com/your-username/your-api-repository
	Ensure that your repository is public (unless you specifically want it private), so others can access and view your code.

	Remember to include a README.md file in your repository with instructions on how to run your API locally, any dependencies, and other relevant information.

	If you have specific questions or need further guidance on a particular step, feel free to ask!
	



Question:2 A README file explaining how to run the API locally and how to run the tests.

Answer:- Below is an example of what the content of a README file might look like, providing instructions on how to run the API locally and how to run tests. Please note that the specifics may vary based on your actual project structure and tools used.

Project Name
	This project is an API that [brief description of what the API does].
	
Certainly! Below is an example of what the content of a README file might look like, providing instructions on how to run the API locally and how to run tests. Please note that the specifics may vary based on your actual project structure and tools used.

Project Name
This project is an API that [brief description of what the API does].

Table of Contents
	Prerequisites
	Installation
	Configuration
	Run the API Locally
	Run Tests

Prerequisites

	Before you begin, ensure you have the following prerequisites installed:
	PHP version will be 8.0 or greator
	Composer require if not
	[Other dependencies, if any]

Installation
	Clone the repository:
	git clone https://github.com/your-username/your-api.git

	Change into the project directory:
	cd your-api

	Install dependencies:
	composer install
	
Configuration
	Copy the .env.example file to a new file named .env:
	cp .env.example .env
	
	Configure the database and other necessary settings in the .env file.
	
Run the API Locally
	Run the migrations to set up the database:
	php artisan migrate
Start the development server:
	php artisan serve

	Your API should now be accessible at http://localhost:8000.

Run Tests:
	php artisan test

Please replace placeholders such as [project name], [version], and others with your actual project details.


Question:3: A documentation file explaining the endpoints, the data format, and how to
authenticate

API Documentation:

	Introduction:
	This document provides an overview of the endpoints, data formats, and 	authentication methods for the [Your API Name] API.

	Base URL:
		The base URL for all endpoints is: http://localhost:8000 (replace with your actual API URL).
	Authentication:
		To access protected endpoints, you need to include an authentication token in the headers of your requests.
	Authentication Token:
	Include the authentication token in the Authorization header of your requests:
	
	Authorization: Bearer YOUR_ACCESS_TOKEN

	Obtain an access token by authenticating through the /login endpoint.
	For example: 

	1. Authentication
		1.1 Login
		Endpoint: POST /api/login
		Description: Obtain an access token for authentication.
		Request:
		Content-Type: application/json
		Body:{
  			"email": "user@example.com",
  			"password": "your_password"
		}
	Response:
		{
  		"access_token": "YOUR_ACCESS_TOKEN",
  		"token_type": "Bearer",
  		"expires_in": 3600
		}

	2.1 Get Flights
		Endpoint: GET /api/flights
		Description: Retrieve a list of flights.
		Request:
		Headers:
		Authorization: Bearer YOUR_ACCESS_TOKEN
		Query Parameters:
		query (optional): Filter flights by origin name.
		Response:
			Success (200 OK):

Question:4 Pagination and caching are essential techniques for optimizing the performance and efficiency of APIs. Here's an explanation of the approach to implementing pagination and caching, along with relevant code snippets.
	
	Pagination:
	Implementation in Laravel:

	In Laravel, you can use the paginate method provided by Eloquent to paginate query results. Here's an example of how you might paginate a list of flights:

	// Controller method
	public function getPaginatedFlights(Request $request)
	{
    		$perPage = $request->query('per_page', 10); // Number of items per page
    		$flights = Flight::with('origin', 'destination')->paginate($perPage);

    		return response()->json($flights);
	}








