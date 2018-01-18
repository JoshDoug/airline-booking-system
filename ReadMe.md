# Airline Booking System Coursework

## Setup

* Install and license PhpStorm
* Install Xdebug browser extension and pair with PhpStorm
* Install Docker for Mac (or alternative)
* Clone GitLab repo (setup Git as required)
* Configure project in PhpStorm
  * Add `docker-compose.yml` runtime configuration
  * Duplicate example-env.list, move to config folder and rename env.list
    * E.g. run `mkdir config && cp example-env.list config/env.list`
    * Change the example passwords, DB name, and DB username
  * Run project in PhpStorm or from the CLI `docker-compose up`
  * Stop project: `docker-compose stop` or `docker-compose down`
    * `stop` stops the containers, `down` stops & removes the containers