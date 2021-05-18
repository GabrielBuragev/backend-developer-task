<?php

use App\User;
use Illuminate\Database\Seeder;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::all();

        foreach ($users as $user) {
            foreach (range(1, 8) as $folder_number) {
                $user->folders()->create([
                    'name' => 'My Folder ' . $folder_number
                ]);
            }
        }
    }
}
