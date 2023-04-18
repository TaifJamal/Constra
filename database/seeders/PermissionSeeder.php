<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            'client-list','client-create','client-edit','client-delete',
            'fact-list', 'fact-create', 'fact-edit', 'fact-delete',
            'image-list','image-create','image-edit','image-delete',
            'menu-list','menu-create','menu-edit','menu-delete',
            'post-list','post-create','post-edit','post-delete',
            'pricing-list','pricing-create','pricing-edit','pricing-delete',
            'project-list', 'project-create', 'project-edit', 'project-delete',
            'detaile-list', 'detaile-create', 'detaile-edit', 'detaile-delete',
            'question-list', 'question-create', 'question-edit', 'question-delete',
            'service-list', 'service-create', 'service-edit', 'service-delete',
            'slider-list', 'slider-create', 'slider-edit', 'slider-delete',
            'team-list', 'team-create', 'team-edit', 'team-delete',
            'testimonial-list', 'testimonial-create', 'testimonial-edit', 'testimonial-delete',
            'role-list', 'role-create', 'role-edit', 'role-delete',
            'user-list', 'user-create', 'user-edit', 'user-delete',
        ];

        foreach( $permissions as  $permission){
            Permission::create([
                'name'=>$permission,
            ]);
        }
    }
}
