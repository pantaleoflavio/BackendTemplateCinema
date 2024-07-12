#!/bin/bash
mysqladmin ping -h 127.0.0.1 -u${MYSQL_USER} -p${MYSQL_PASSWORD} --silent
