# 2

## How to Create a New DB Migration

This project used `phinx` in order to manage DB migrations. To create a migration that will create a new `Posts` table you could run the following command:

```shell
vendor/bin/phinx create CreatePostsTable
```

## How to Seed Data into Created Tables

Still using `phinx`, you could also create a seed file for `posts` table using the following command:

```shell
vendor/bin/phinx seed:create PostsSeeder
```

## Development

npm package called `browser-sync` is used to ease development by providing auto-reload functionality when working with `*.php` files. Be sure to install it beforehand by using the following command:

```shell
npm install -g browser-sync
```
