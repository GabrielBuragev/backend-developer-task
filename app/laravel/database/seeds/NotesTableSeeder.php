<?php

use App\Models\NoteList;
use App\Models\NoteText;
use App\User;
use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $words = ['Cool', 'note', 'mine', 'text', 'work', 'something', 'space', 'junk', 'food', 'hobby', 'play', 'wine', 'status', 'folks'];

        foreach ($users as $user) {
            $folders = $user->folders;
            foreach ($folders as $folder) {
                foreach (range(1, 4) as $note_count) {
                    $note_type = ($note_count <= 2) ? 'text' : 'list';
                    $is_public = rand(0, 1);
                    $note_text_word_length = rand(1, count($words) - 1);
                    $note = $folder->notes()->create([
                        "name" => 'My note ' . $note_count,
                        'is_public' => $is_public,
                        "folder_id" => $folder->id
                    ]);

                    switch ($note_type) {
                        case 'text':
                            $noteable = NoteText::create([
                                'content' => $this->randomizeStringFromArrayElements($words, $note_text_word_length),
                            ]);
                            $noteable->note()->save($note);
                            break;
                        case 'list':
                            $noteable = NoteList::create();
                            foreach (range(1, rand(1, 3)) as $list_item_count) {
                                $randomized_text_content = $this->randomizeStringFromArrayElements($words, $note_text_word_length);
                                $noteable->items()->create([
                                    'content' => $randomized_text_content
                                ]);
                            }
                            $noteable->note()->save($note);
                            break;
                    }
                }
            }
        }
    }

    public function randomizeStringFromArrayElements($array, $length)
    {
        $randomized_array_elements = array_rand(array_flip($array), $length);
        return implode(" ", is_array($randomized_array_elements) ? $randomized_array_elements : [$randomized_array_elements]);
    }
}
