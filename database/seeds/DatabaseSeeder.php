<?php

use App\Models\Wiki;
use App\Models\Page;
use App\Models\User;
use App\Models\Role;
use App\Models\Team;
use App\Models\Space;
use App\Models\Invite;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\IntegrationAction;
use Fenos\Notifynder\Models\NotificationCategory;
use Database\Seeds\Components\Page\PagesTableSeeder;
use Database\Seeds\Components\Role\RolesTableSeeder;
use Database\Seeds\Components\Team\TeamsTableSeeder;
use Database\Seeds\Components\User\UsersTableSeeder;
use Database\Seeds\Components\Wiki\WikisTableSeeder;
use Database\Seeds\Components\Team\InvitesTableSeeder;
use Database\Seeds\Components\Space\SpacesTableSeeder;
use Database\Seeds\Components\User\UsersRolesTableSeeder;
use Database\Seeds\Components\User\UsersTeamsTableSeeder;
use Database\Seeds\Components\Permission\PermissionsTableSeeder;
use Database\Seeds\Components\Permission\RolePermissionsTableSeeder;
use Database\Seeds\Components\Integration\IntegrationActionsTableSeeder;
use Database\Seeds\Components\Notification\NotificationCategoryTableSeeder;

class DatabaseSeeder extends Seeder
{
    private $seeders = [
        RolesTableSeeder::class,
        PagesTableSeeder::class,
        TeamsTableSeeder::class,
        UsersTableSeeder::class,
        WikisTableSeeder::class,
        SpacesTableSeeder::class,
        InvitesTableSeeder::class,
        UsersTeamsTableSeeder::class,
        UsersRolesTableSeeder::class,
        PermissionsTableSeeder::class,
        RolePermissionsTableSeeder::class,
        IntegrationActionsTableSeeder::class,
        NotificationCategoryTableSeeder::class
    ];



    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $this->emptyModels();

        foreach ($this->seeders as $seeder) {
            $this->call($seeder);
        }
    }

    /**
     * Delete all rows from table before inserting new records.
     * 
     * @return void
     */
    private function emptyModels()
    {
        Page::getQuery()->delete();
        Role::getQuery()->delete();
        Wiki::getQuery()->delete();
        Team::getQuery()->delete();
        User::getQuery()->delete();
        Space::getQuery()->delete();
        Invite::getQuery()->delete();
        Permission::getQuery()->delete();
        DB::table('user_teams')->delete();
        DB::table('users_roles')->delete();
        DB::table('role_permissions')->delete();
        IntegrationAction::getQuery()->delete();
        NotificationCategory::getQuery()->delete();
    }
}