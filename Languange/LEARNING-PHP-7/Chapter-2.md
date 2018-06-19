Chapter 2 - Web Applications with PHP

Web applications are a common thing in our lives, and they are usually very user
friendly; users do not need to understand how they work behind the scenes. As a
developer, though, you need to understand how your application works internally.
In this chapter, you will learn about:

• HTTP and how web applications make use of it
• Web applications and how to build a simple one
• Web servers and how to launch your PHP built-in web server


HTTP stands for Hypertext Transfer Protocol 

HTTP berfungsi untuk menghubungkan dua titik untuk saling berhubungan satu sama lain.

There are two entities to communicate each other: sender and receiver. The sender sends a message to the receiver. This message, which starts the communication, is called the request. the receiver receives the message, processes it, and generates a second message: the response. in this case, the response shows a 200 status code, meaning that the request was processesd successfully.

HTTP is stateless.

Parts of the message

 - URL: Uniform Resource Locator is the destination of the message

 - The HTTP Method : GET, POST, PUT, DELETE, OPTION
  GET: Meminta sesuatu kepada receiver lalu receiver mengembalikan informasi tersebut.
  POST: Sender meminta kepada receiver untuk memperbaharui data yang dimilikinya.

 - Body : present in response even though a request message can containt it too.
 
 - Headers: HTTP message contain metadata that receiver needs to understand the content of the message


The status code
Respond of receiver. it identifies the status code of the request with a numeric code so that browsers and other tools know how to react.

Common status codes are:
 - <b>200</b>: The request was successfull
 - <b>401</b>: Unauthorized; the user doesn't have permission.
 - <b>404</b>: Page not found
 - <b>500</b>: Internal server error; something wrong happened on the server side and it could not recovered

Website Application

A <b>web page</b> is a single document with content. It contains links that open other web
pages with different content.

A <b>website</b> is the set of web pages that usually live in the same server and are related
to each other.

A <b>web application</b> is just a piece of software that runs on a client, which is usually
a browser, and communicates with a server. A server is a remote machine that
receives requests from a client, processes them, and generates a response. This
response will go back to the client, generally rendered by the browser in order to
display it to the user.

Web servers

The job of a web server is to route external requests to the correct application so that
they can be processed. Once the application returns a response, the web server will
send this response to the client. Let's take a close look at all the steps:

1. The client, which is a browser, sends a request. This can be of any type—GET
or POST—and contain anything as long as it is valid.

2. The server receives the request, which points to a port. If there is a web server
listening on this port, the web server will then take control of the situation.

3. The web server decides which web application—usually a file in the
filesystem—needs to process the request. In order to decide, the web server
usually considers the path of the URL; for example, http://myserver.com/
app1/hi would try to pass the request to the app1 application, wherever
it is in the filesystem. However, another scenario would be http://app1.
myserver.com/hi, which would also go to the same application. The rules
are very flexible, and it is up to both the web server and the user as to how to
set them.

4. The web application, after receiving a request from the web server, generates
a response and sends it to the web server.

5. The web server sends the response to the indicated port.

6. The response finally arrives to the client

