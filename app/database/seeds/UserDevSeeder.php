<?php

class UserDevSeeder extends DatabaseSeeder
{

    public function run()
    {
        $user = new User;
        $user->username = 'dev@pianolab.com.br';
        $user->password = '$2y$10$EeqmhVT9oV3PGqV3Uk/c9uLwJc2siFG1AIUntqKuzGt8cHDP8Vha2';
        $user->password = 'dev';
        $user->save();
    }

}
