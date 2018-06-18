# laravel command

- 1.download laravel installer
    ```
    composer global require "laravel/installer"
    ```
- 2.place composer vendor in $PATH
    ``` 
    export [macOS:] $HOME/.composer/vendor/bin
    export [GNU / Linux Distributions:] $HOME/.config/composer/vendor/bin
    ```
- 3.create project
    ``` 
    laravel new blog
    composer create-project --prefer-dist laravel/laravel blog
    ```
- 4.run server
    ```
    php artisan serve
    ```

# laravel bug solution
- 1.Whoops, looks like something went wrong.
    ```
    solution 1: you should open app debug
    solution 2: you could mv .env.example to .env
    ```
- 2.The only supported ciphers are AES-128-CBC and AES-256-CBC with the correct key lengths.
    ``` 
    solution 1:.php artisan key:generate
    ```
- 3. 
