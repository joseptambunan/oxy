<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Group;
use App\UserGroup;
use App\Book;
use App\Author;
use App\BookAuthor;
use App\Helpers\Oxy;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$password = OxyHelper::default_password();
        $user = new User;
        $user->name = "Admin";
        $user->email = "admin@email.com";
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->password = crypt($password,'$6$rounds=5000$saltatkas$'); 
        $user->created_at = date("Y-m-d H:i:s");
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save();

        $group = new Group;
        $group->name = "Admin";
        $group->created_at = date("Y-m-d H:i:s");
        $group->created_by = 1;
        $group->save();

        $user_group = new UserGroup;
        $user_group->user_id = $user->id;
        $user_group->group_id = $group->id;
        $user_group->created_at = date("Y-m-d H:i:s");
        $user_group->created_by = 1;
        $user_group->save();

        echo "Superadmin telah teregistrasi dengan detail ini \n";
        echo "Email : admin@email.com\n";
        echo "Password : ".$password."\n";

        $password = OxyHelper::default_password();
        $user = new User;
        $user->name = "User";
        $user->email = "user@email.com";
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->password = crypt($password,'$6$rounds=5000$saltatkas$'); 
        $user->created_at = date("Y-m-d H:i:s");
        $user->updated_at = date("Y-m-d H:i:s");
        $user->save();

        $group = new Group;
        $group->name = "User";
        $group->created_at = date("Y-m-d H:i:s");
        $group->created_by = 1;
        $group->save();

        $user_group = new UserGroup;
        $user_group->user_id = $user->id;
        $user_group->group_id = $group->id;
        $user_group->created_at = date("Y-m-d H:i:s");
        $user_group->created_by = 1;
        $user_group->save();

        echo "User telah teregistrasi dengan detail ini \n";
        echo "Email : user@email.com\n";
        echo "Password : ".$password."\n";

        for($i=1; $i<=10; $i++){
            $book = new Book;
            $book->name = "Book ". $i ;
            $book->tahun_terbit = 2000 + $i;
            $book->kode_buku = (10000 + $i). "CC";
            $book->created_at = date("Y-m-d H:i:s");
            $book->created_by = 1;
            $book->save();

            $author = new Author;
            $author->name = "Author ".$i;
            $author->email = "email_author".$i."@email.com";
            $author->created_at = date("Y-m-d H:i:s");
            $author->created_by = 1;
            $author->save();
        }

        $data_book = Book::get();
        foreach ($data_book as $key => $value) {
            $book_author = new BookAuthor;
            $book_author->book_id = $value->id;
            $book_author->author_id = rand(1,10);
            $book_author->created_by = 1;
            $book_author->created_at = date("Y-m-d H:i:s");
            $book_author->save();
        }

    }
}
