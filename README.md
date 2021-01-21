# Inguanku Project

## Start Contribution

1.Cloning repository

`git clone : https://github.com/inguanku/inguanku.git`

2.Switch to project directory

`cd inguanku`

3.Create your own branch

`git checkout -b feature/yourBranchName develop`

4.Push your local repository

`git push --set-upstream origin feature/yourBranchName`

## Start Running Project

We'll assume you have composer installed

1. Switch to project directory

2. Install project dependencies with composer

`composer install`

3. Create db_inguanku in your mysql server

4. Migrate the table

`php spark migrate`

5. Start running your project

`php spark serve`
