# Wingly Challenges

If you want to join the engineering team, you will most likely have to complete one of our code challenges:

## Guidelines

- Clone this repo (do **not** fork it)
- Install your dependencies (composer install, npm install)
- Copy the .env.example to .env file 
- Setup your database
- Run `php artisan migrate:fresh --seed`

## Pointers

Cover your code with tests so you don't break what you have already done.   
For higher levels we are interested in seeing code that is clean, extensible and robust.

Please also note that:
- All prices are stored as integers (in cents). Do not forget to format them if needed.
- All durations are stored as integers (in minutes). Do not forget to format them if needed.
- We don't expect you to be a top-notch designer, but we want to see how you would handle some styling of this app. Do not hesitate to take inspiration from Wingly or anywhere else!

This repo contains the basic setup for a Laravel & Inertia.js application. It uses Vue 3 for the frontend and Tailwind CSS for styling.   
There is some boilerplate code, to help you get started but feel free to tweak it as you see fit.  

## Challenge

We are building an aircraft rental service. Airclubs can already list their aircraft on our platform and pilots can view aircraft they could rent.

### Level 1

Unfortunately, aircraft are only available for short rentals (less than a given number of hours or minutes, defined by the airclub).
To only see available aircraft, pilots should be able to input the duration of their rental they plan on flying.

The different values they should be able to select are:

- duration (in minutes): 30, 60, 90, 120, 150, 180.

The pilots must see the options in a human friendly format for example 30 should be displayed as 30m, 90 as 1h30m...
When the pilots edit this filter another request should be made with the duration query parameter set.
The backend should only return available aircraft for the given parameters in the response.

### Level 2

We heard of pilots complaining about not knowing the price for their rental. So we'll have to calculate it and display it.
The rental price is calculated based on the number of rental minutes and the aircraft's price per hour.
Let's calculate and display this price for every aircraft.

### Level 3

The airclub now wants their money. We decide to take a 30% commission on the rental price to cover our costs and have a solid business model.

The commission is split like this:

- 25% goes to the insurance
- 1€/hour goes to the airport 
- the rest goes to us

Compute the amount that belongs to the insurance, to the airport and to us.



















