## Setting Up as part of an app so you can develop and test

`composer require alnutile/webforms`

Then set your `config/app.php`


`Alnutile\Webforms\WebformProvider::class,`


Then run `php artisan vendor:publish --tag=config --provider=\Alnutile\Webforms`


Run migrations

You should a Webform model


## TODO

Add Clone with Tests

Move over your Validation and tests


## Dev Local

#### USE PATH

`vendor/alnutile/webforms`

But I then `git clone git@github.com:alnutile/webforms.git` in `/home/vagrant/Code`

then I `rm -rf vendor/alnutile/webforms`

then I `ln -s ../../../webforms`

## Testing

To my phpunit.xml add

```
<testsuite name="Webforms">
    <directory suffix="Test.php">./vendor/alnutile/webforms/tests/Unit</directory>
</testsuite>
```

Now I have a bunch UI tests using dusk.
So install Dusk and those should work

Might help https://alfrednutile.info/posts/209

You might have to fix the new dusk file `phpunit.dusk.xml`

```
<?xml version="1.0" encoding="UTF-8"?>
<phpunit backupGlobals="false"
         backupStaticAttributes="false"
         bootstrap="bootstrap/autoload.php"
         colors="true"
         convertErrorsToExceptions="true"
         convertNoticesToExceptions="true"
         convertWarningsToExceptions="true"
         processIsolation="false"
         stopOnFailure="false">
    <testsuites>
        <testsuite name="Webform">
            <directory suffix="Test.php">./vendor/alnutile/webforms/tests/Browser</directory>
        </testsuite>
    </testsuites>
    <filter>
        <whitelist processUncoveredFilesFromWhitelist="true">
            <directory suffix=".php">./app</directory>
        </whitelist>
    </filter>
</phpunit>
```

and the `.env.dusk.local`

so it talks to the right db and everything


