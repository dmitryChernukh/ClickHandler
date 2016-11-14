# ClickHandler
Script to process the tracking links

![alt tag](https://media3.giphy.com/media/2AKeiQiB78lj2/200.gif#316)

1. In order to create necessary tables, run this commands:

 - php artisan migrate
 
2. We have 4 routers in \app\routes:
- / 
- /click
- /success
- /error

3. Main controller stored in the - \Controllers\Click\ClickController

Method mainHandler - handles incoming requests. 
To work with the clicks, I created a separate module - (class),
which we can call in different parts of our program.

```php
//php code
$click = new ClickHandler($this->obtainingNecessaryData($request));
```

Also I use trait Get Request Data - in order to group and receive our request parameters. 

To work with a black list (table - bad_domains),
I use an middleware - HurdleBadDomain. It limits the http - request and does not
let the script in to the controller.
It contains only one method:
![alt tag](http://pix.toile-libre.org/upload/original/1479083010.png)


In order to add new doman in to "bad_domains" table,
 please use this artisan command -  
 ``` php artisan domain:add http://test.com ```
 where http://test.com - is a name of new domain. I solved to do this, 
 because we have not admin panel. And in order to not enter
 the data manually (into the table).
 
 Please, rename file .production.env in too .env (for your locale settings).
 
 Regards
