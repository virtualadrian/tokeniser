# Tokeniser
Userfrosting Sprinkle for token based API authentication, using JSON Web Tokens (JWT).
https://jwt.io/introduction/

Implements: https://github.com/tuupola/slim-jwt-auth

## Setup

If you're using Apache/Httpd :
Add this to `Userfrosting/public/.htaccess` within the `<IfModule mod_rewrite.c>` section:

```RewriteRule .* - [env=HTTP_AUTHORIZATION:%{HTTP:Authorization}]```

Add a secret key to `.env` with name `UF_API_SECRET`, minimum 256 bits recommended.

## Use

Tokenised routes are protected behind `/api` by default, but this can be changed in your config file, with parameter `tokeniser.path`

There is an 'ignored' route at `/api/ping` for testing. Other ignored routes can be added to the config under `tokeniser.ignore`

There is a protected test route located at `/api/test` which required token based authentication. If your API requests can see the response, then you're good to go!

In your site sprinkle, you can creates new routes behind `/api` e.g. `/api/your/custom/route` and they will automatically be protected by a JSON web token.

## Test 

To test from Command line, try:

`curl -k -H "Authorization: Bearer your-generated-json-web-token" "http://localhost/api/test"`

## Docs
To read more on how to generate JWT's, see:

https://jwt.io/introduction/

https://jwt.io/#debugger

On the server side i use Python PyJwt to generate tokens (https://github.com/jpadilla/pyjwt/), however many packages are available for languages: 
https://jwt.io/#libraries-io
