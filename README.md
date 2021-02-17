# Inguanku Project

## Start Contribution

1.Cloning repository

`git clone : https://github.com/inguanku/inguanku.git`

2.Switch to project directory

`cd inguanku`

3.Create your own branch

`git checkout -b feature/yourBranchName develop`

4.Push your local repository

`git push -u origin feature/yourBranchName`

## Install project dependencies

We'll assume you have composer installed

1. Switch to project directory

2. Install project dependencies with composer

`composer install`

## Table Migration

1. Create db_inguanku in your mysql server

2. Migrate the table

`php spark migrate`

## Seeding dummy post data

`php spark db:seed PostDummy`

## Start running project

1. Start running your project

`php spark serve`
