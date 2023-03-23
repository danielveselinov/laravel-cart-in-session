### The Goal

The end goal will be to create a new order with all the products that the user has in their shopping cart. To enable that, we'll need some Livewire components for updating the values without reloading the page as well as a shopping cart that keeps track of the products of our users (the users's products?). Quick spoiler, we'll use a Service class for that and in there we'll use Laravel's Session facade.

So, we'll be building a very barebones webshop. I'll try to keep it short and simple in two steps: adding products to the cart and using the cart to place an order.

#### Project Setup

To run this project locally you need to clone the repository. Then you will need to run following commands:

```
composer install
cp .env.example .env
artisan key:generate
```

Then you need to setup the DB, and after you can run:

```
artisan migrate
artisan db:seed (?optional)
```

One last step is to install the npm and compile the assets.
```
npm install
```
