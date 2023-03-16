<?php
namespace Tests\Feature;

use Tests\TestCase;
use Tests\Feature\UserTestable;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UsersModuleTest extends TestCase
{

    use RefreshDatabase, UserTestable;

    public function test_it_shows_the_users_list()
    {
        $this->actingAs(UserTestable::userAdmin());

        User::factory()->create([ 'name' => 'John Doe' ]);
        User::factory()->create([ 'email' => 'user@email.ext' ]);

        $response = $this->get("/api/users")
            ->assertStatus(200)
            ->assertSee("John Doe")
            ->assertSee("user@email.ext")
            ->assertSee("true")
            ->assertSee("1");
    }

    public function test_it_show_the_user_detail()
    {
        $this->actingAs(UserTestable::userAdmin());

        $userId = User::factory()->create([
            "name" => "John Doe",
            "email" => "user@email.ext",
        ])->id;

        $response = $this->get("/api/users/{$userId}") 
            ->assertStatus(200)
            ->assertSee("John Doe")
            ->assertSee("user@email.ext");
    }
   
    public function test_it_creates_a_new_user_including_credentials()
    {
        $this->actingAs(UserTestable::userAdmin());

        $this->post("/api/users/",[
            "name" => "John Doe",
            "email" => "user@email.ext",
            "password" => "secret", 
            "role_id" => 2 //user
        ]);

        $user = User::where("email","user@email.ext" )->first();
        $this->assertEquals([
            "name" => $user->name,
            "email" => $user->email,
            "role_id" => $user->role_id
        ], [
            "name" => "John Doe" ,
            "email" => "user@email.ext",
            "role_id" => 2 //user
        ]);

        $this->assertCredentials([
            "name" => "John Doe",
            "email" => "user@email.ext",
            "password" => "secret",
            "role_id" => 2 //user
        ], "web"); 
    }
    
    public function test_the_name_is_required()
    {   
        $this->actingAs(UserTestable::userAdmin());

        $this->post("/api/users/",[
            "name" => null,
            "email" => "user@email.ext",
            "password" => "secret",
            "role_id" => 2 //user
        ])->assertStatus(302);

        $errors = session('errors');
            
        //$this->assertEquals($errors->get('name')[0],"El campo Nombre es obligatorio.");
        $this->assertEquals($errors->get("name")[0],"The name field is required.");
        $this->assertEquals(0, User::where("role_id",2)->count());
        $this->assertDatabaseMissing("users", ["email" => "user@email.ext"]);
    }
    
    public function test_the_email_is_required()
    {   
        $this->actingAs(UserTestable::userAdmin());

        $this->post("/api/users/",[
            "name" => "John Doe",
            "email" => "",
            "password" => "secret",
            "role_id" => 2 //user
        ])->assertStatus(302);            

        $errors = session('errors');
            
        //$this->assertEquals($errors->get('email')[0],"El campo Correo Electrónico es obligatorio.");
        $this->assertEquals($errors->get("email")[0],"The email field is required.");

        $this->assertEquals(0, User::where("role_id", 2)->count());    
    }
    
    /*public function test_the_email_must_be_unique()
    {$this->withoutExceptionHandling();
        $this->actingAs(UserTestable::userAdmin());
        
        $user = User::factory()->create([            
            "email" => "user@email.ext",
        ]);

        $this->post('/api/users/',[
            "name" => "John Doe",
            "email" => "user@email.ext",
            "password" => "secret",
            "role_id" => 2 //user        
        ]);//->assertStatus(302);

        $errors = session('errors');

        dd($errors);
        //$this->assertEquals($errors->get('email')[0],"El valor del campo Correo Electrónico ya está en uso.");

        //$this->assertEquals(2, User::count());        
    }*/
    
    public function test_the_password_is_required()
    {
        $this->actingAs(UserTestable::userAdmin());
        
        $this->post("/api/users/",[
            "name" => "John Doe",
            "email" => "user@email.ext",
            "password" => "",
            "role_id" => 2 //user         
        ])->assertStatus(302);

        $errors = session('errors');
        //$this->assertEquals($errors->get('password')[0],"El campo Contraseña es obligatorio.");
        $this->assertEquals($errors->get('password')[0],"The password field is required.");
        $this->assertEquals(1, User::count());        
    }
    
    public function test_it_load_the_edit_page()
    {
        $this->actingAs(UserTestable::userAdmin());
 
        $userId = User::factory()->create([            
            "name" => "John Doe",
            "email" => "user@email.ext"
        ])->id;

        $response = $this->get("/api/users/{$userId}")
            ->assertSee("John Doe")
            ->assertSee("user@email.ext")
            ->assertStatus(200);          
    }
    
    public function test_it_updates_a_record()
    {
        $this->actingAs(UserTestable::userAdmin());

        $user = User::factory()->create();

        //$this->put("/api/users/{$user->id}",[
        $this->post("/api/users/{$user->id}",[
            "name" => "John Doe",
            "email" => "user@email.ext",
            "password" => "secret",
            "role_id" => 2 //user
        ]);
        $user->refresh();

        $this->assertEquals([
            "name" => $user->name,
            "email" => $user->email,
            "role_id" => $user->role_id
        ], [
            "name" => "John Doe" ,
            "email" => "user@email.ext",
            "role_id" => 2 //user
        ]);

        $this->assertCredentials([
            "name" => "John Doe",
            "email" => "user@email.ext",
            "password" => "secret",
            "role_id" => 2 //user     
        ], "web");
   }
   
    /*public function test_the_name_is_required_when_updating_the_user()
    {
        $this->actingAs(UserTestable::userAdmin());

        $user = User::factory()->create();

	    $this->post("/api/users/{$user->id}",[
            "name" => "",
            "email" => "user@email.ext",
            "password" => "secret",
            "role_id" => 2 //user
        ]);
  
        $errors = session("errors");
        $this->assertEquals($errors->get("name")[0],"The name field is required.");

        $this->assertDatabaseMissing("users", ["email" => "user@email.ext"]);        
    }*/
    
/*    public function test_the_email_must_be_valid_when_updating_the_user()
    {
        $this->actingAs(UserTestable::userAdmin());

        $user = User::factory()->create(['name'=> 'Initial name']);

	     $this->from("users/{$user->id}/edit")
	         ->put("/users/{$user->id}",[
                 'name' => 'Name Updated',
                 'email' => 'invalid-email',
                 'password' => 'secret'        
            ])
            ->assertRedirect(route("users.edit", $user->id));
        
        $errors = session('errors');
        $this->assertEquals($errors->get('email')[0],"El campo Correo Electrónico debe ser una dirección de correo válida.");
        
        $this->assertDatabaseMissing('users', ['name' => 'Name Updated']);
    }
    
    public function test_the_email_must_be_unique_when_updating_the_user()
    {
        $this->actingAs(UserTestable::userAdmin());

        User::factory()->create(['email' => 'existing-email@example.com']);
        
        $user = User::factory()->create(['email' => 'user@email.ext']);

        $this->from("/users/{$user->id}/edit")
            ->put("/users/{$user->id}",[
                'name' => 'John Doe',
                'email' => 'existing-email@example.com',
                'password' => 'secret',
                'role' => 'user'       
            ])
            ->assertRedirect(route("users.edit", $user->id));
            
        $errors = session('errors');
        $this->assertEquals($errors->get('email')[0],"El valor del campo Correo Electrónico ya está en uso.");                 
    }
    
    public function test_the_password_is_optional_when_updating_the_user()
    {
        $this->actingAs(UserTestable::userAdmin());
        
        $oldPassword = 'PREVIOUS_PASSWORD';        
      
        $user = User::factory()->create(['password' => bcrypt($oldPassword)]);

        $this->from("/users/{$user->id}/edit")
            ->put("/users/{$user->id}",[
                'name' => 'John Doe',
                'email' => 'user@email.ext',
                'password' => '',
                'role_id' => 2 //user     
            ])
            ->assertRedirect(route("users"));  

        $this->assertCredentials([
            'name' => 'John Doe',
	        'email' => 'user@email.ext',
	        'password' => $oldPassword, //VERY IMPORTANT
	        'role_id' => 2 //user
        ], 'web');
    }
    
    public function test_the_users_email_can_stay_the_same_when_updating_the_user()
    {
        $this->actingAs(UserTestable::userAdmin());
        
        $user =  User::factory()->create(['email' => 'user@email.ext']);

        $this->from("/users/{$user->id}/edit")
            ->put("/users/{$user->id}",[
                'name' => 'John Doe',
                'email' => 'user@email.ext',
                'password' => 'secret',
                'role_id' => 2   //user  
            ])
            ->assertRedirect(route("users"));

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
	        'email' => 'user@email.ext'
        ]);
    }
    
    public function test_it_deletes_a_user()
    {
        $this->actingAs(UserTestable::userAdmin());
        
        $user =  User::factory()->create();

	    $this->delete("users/{$user->id}")
	         ->assertRedirect(route("users"));
        
	    $this->assertDatabaseMissing('users', [ 'id' => $user->id ]);
        
        $this->assertSame(1, User::count());        
    }*/

}
