<?php
namespace AppBundle\Composer;

use Composer\Script\Event;

class HerokuEnvironment
{
    /**
     * Populate Heroku environment
     *
     * @param Event $event Event
     */
    public static function populateEnvironment(Event $event)
    {
        $url = getenv('DATABASE_URL');

        if ($url) {
            $url = parse_url($url);

            $databaseDriver = 'pdo_mysql';
            if ($url['scheme'] === 'postgres') {
                $databaseDriver = 'pdo_pgsql';
            }
            $databaseName = substr($url['path'], 1);

            putenv("SYMFONY__DATABASE_DRIVER={$databaseDriver}");
            putenv("SYMFONY__DATABASE_HOST={$url['host']}");
            putenv("SYMFONY__DATABASE_PORT={$url['port']}");
            putenv("SYMFONY__DATABASE_USER={$url['user']}");
            putenv("SYMFONY__DATABASE_PASSWORD={$url['pass']}");
            putenv("SYMFONY__DATABASE_NAME={$databaseName}");
        }

        $io = $event->getIO();
        $io->write('DATABASE_URL=' . getenv('DATABASE_URL'));
    }
}