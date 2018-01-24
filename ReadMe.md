# Airline Booking System Coursework

See Project Wiki for Coursework Brief, and design process & dicsussion on front-end, back-end, and database.

## Setup

* Install and license PhpStorm
* Install Xdebug browser extension and pair with PhpStorm
* Install Docker for Mac (or alternative)
* Clone GitLab repo (setup Git as required)
* Configure project in PhpStorm
  * Add `docker-compose.yml` runtime configuration
  * Duplicate example-env.list, move to config folder and rename env.list
      * E.g. run `mkdir config && cp example-env.list config/env.list`
      * Change the example passwords, DB name, DB username, and host variables
  * Run project in PhpStorm or from the CLI with `docker-compose up`
  * Stop project: `docker-compose stop` or `docker-compose down`
      * `stop` stops the containers, `down` stops & removes the containers

## Git Workflow

Up for discussion (for more information see links in Wiki Home page), but preferably:

* master stays in a stable state and is not worked on directly
* branch for a feature
  * merge into the feature branch from master regularly
  * only merge back into master when the feature is stable
  * if it's a long running branch, e.g. a front-end implementation branch, then it could make sense to apply the same workflow to this branch as master
      * e.g. branch for features related to front-end, only merge into front-end branch when stable