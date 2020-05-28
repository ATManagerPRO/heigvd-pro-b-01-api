![ATManager logo](public/atm_logo_text.png)

# About ATManager
Another Task Manager is an Android application dedicated to the management of to-do lists. The user is able to create different lists and tasks and to manage them. Notifications will remind the user of upcoming deadlines and the user can use different views (one day, one week, one month, etc...) to keep track of his tasks. One of the main feature is the list sharing which allows users to share their content with each other.

This software was developed as semester project (PRO) at HEIG-VD, academic year 2019-2020.

Development team:

| Name                                 | Email                        | Github      |
|--------------------------------------|------------------------------|-------------|
| Stéphane Bottin                      | stephane.bottin@heig-vd.ch   | StephaneB1  |
| Loïc Dessaules (project lead)        | loic.dessaules@heig-vd.ch    | gollgot     |
| Robin Demarta                        | robin.demarta@heig-vd.ch     | rdemarta    |
| Teo Ferrari (deputy project lead)    | teo.ferrari@heig-vd.ch       | LordTT      |
| Chau Ying Kot                        | chau.kot@heig-vd.ch          | KurohanaJuri|
| Simon Mattei                         | simon.mattei@heig-vd.ch      | Ikewolf77   |

## The API
This repository is about the ATManager API. We created this API with the PHP MVC web framework [Laravel](https://laravel.com/).

This API was made to be able to manage securely all resources from the database. Then, we can also have many type of client as we want, all of them
will be able to use the same API, which is more efficient, secure and modular.

## Documentation 
We used [Swagger](https://swagger.io/) to create our API documentation that you can found [here](https://atmanager.gollgot.app/swagger/). 

## Wiki 
You can find in our [wiki](https://github.com/ATManagerPRO/heigvd-pro-b-01-api/wiki/Data-specifications) some specifications about 
the database and the naming convention.

## Android application
The Android application can be found in [this repository](https://github.com/ATManagerPRO/heigvd-pro-b-01). It has been created in relation with this API project.


