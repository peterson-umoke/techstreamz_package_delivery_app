<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        $roles = ['superadmin', 'admin', 'driver', 'customer'];
        foreach ($roles as $role) {
            \App\Models\Role::firstOrCreate([
                'name' => $role,
                'guard_name' => 'web'
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('roles_required_seeder');
    }
};
