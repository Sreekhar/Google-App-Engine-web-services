Cloud-Computing-Assignment-3
============================

This is a repository to share code regarding the Assignment three

This application allows you to find whether the number is prime or not. It uses Google User managemenr API and a Memcache. It also finds out the execution time it took to find out whether the number is prime or not.

Number is prime or not?

Method: POST
___________

Url: https://abiding-kingdom-123305.appspot.com/

EXAMPLE USAGE:
______________

Enter the number in the text box shown in the webpage
Result - Finds out whether the number is prime or not along with the time it took to execute it.

Working of the webpage -
______________________
Initially the webpage uses Google's user management API and checks whether the user is a valid user or not. (Implemented GoogleAuthentication function in PHP for that)

Secondly wrote a simple application to find out whether the entered number is a prime number or not and later storing the value in memcache. Used Memcache API in Google for that. Wrote the function isPrime for doing that.

Third step involved in displaying the results onto the screen.

Languages used: HTML5, PHP5 and CSS3

AppEngine web services user: 
Google User Management and Memcache
