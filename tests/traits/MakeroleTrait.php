<?php

use Faker\Factory as Faker;
use App\Models\role;
use App\Repositories\roleRepository;

trait MakeroleTrait
{
    /**
     * Create fake instance of role and save it in database
     *
     * @param array $roleFields
     * @return role
     */
    public function makerole($roleFields = [])
    {
        /** @var roleRepository $roleRepo */
        $roleRepo = App::make(roleRepository::class);
        $theme = $this->fakeroleData($roleFields);
        return $roleRepo->create($theme);
    }

    /**
     * Get fake instance of role
     *
     * @param array $roleFields
     * @return role
     */
    public function fakerole($roleFields = [])
    {
        return new role($this->fakeroleData($roleFields));
    }

    /**
     * Get fake data of role
     *
     * @param array $postFields
     * @return array
     */
    public function fakeroleData($roleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'rol' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $roleFields);
    }
}
