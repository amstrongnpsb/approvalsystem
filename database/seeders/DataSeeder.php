<?php

namespace Database\Seeders;

use App\Models\Data;
use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Data::create([
            'data_number' => IdGenerator::generate(['table' => 'data', 'field' => 'data_number', 'length' => 9, 'prefix' => 'DOC-']),
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque officiis nulla sunt repellat non nemo odit. Voluptatem perspiciatis, perferendis quod illo optio expedita nulla enim magnam fugiat ab praesentium officiis dolore? Temporibus inventore alias voluptas. Placeat ab enim, nisi cum aut vero dolorem dicta ipsa nostrum cupiditate, quia cumque ea suscipit velit debitis impedit rerum nulla dolorum? Harum unde eos dolores repellendus voluptate, aliquid itaque ea optio, dolorum fuga impedit provident, doloremque iure natus ipsa! Suscipit numquam reiciendis harum consequuntur soluta optio sit rerum, beatae libero velit blanditiis perferendis tempore impedit accusamus praesentium minima aperiam maxime temporibus, debitis nemo laudantium.",
            'creator' => "Amstrong",
            'status' => "draft",
        ]);
        Data::create([
            'data_number' => IdGenerator::generate(['table' => 'data', 'field' => 'data_number', 'length' => 9, 'prefix' => 'DOC-']),
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque officiis nulla sunt repellat non nemo odit. Voluptatem perspiciatis, perferendis quod illo optio expedita nulla enim magnam fugiat ab praesentium officiis dolore? Temporibus inventore alias voluptas. Placeat ab enim, nisi cum aut vero dolorem dicta ipsa nostrum cupiditate, quia cumque ea suscipit velit debitis impedit rerum nulla dolorum? Harum unde eos dolores repellendus voluptate, aliquid itaque ea optio, dolorum fuga impedit provident, doloremque iure natus ipsa! Suscipit numquam reiciendis harum consequuntur soluta optio sit rerum, beatae libero velit blanditiis perferendis tempore impedit accusamus praesentium minima aperiam maxime temporibus, debitis nemo laudantium.",
            'creator' => "Amstrong",
            'status' => "draft",
        ]);
        Data::create([
            'data_number' => IdGenerator::generate(['table' => 'data', 'field' => 'data_number', 'length' => 9, 'prefix' => 'DOC-']),
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque officiis nulla sunt repellat non nemo odit. Voluptatem perspiciatis, perferendis quod illo optio expedita nulla enim magnam fugiat ab praesentium officiis dolore? Temporibus inventore alias voluptas. Placeat ab enim, nisi cum aut vero dolorem dicta ipsa nostrum cupiditate, quia cumque ea suscipit velit debitis impedit rerum nulla dolorum? Harum unde eos dolores repellendus voluptate, aliquid itaque ea optio, dolorum fuga impedit provident, doloremque iure natus ipsa! Suscipit numquam reiciendis harum consequuntur soluta optio sit rerum, beatae libero velit blanditiis perferendis tempore impedit accusamus praesentium minima aperiam maxime temporibus, debitis nemo laudantium.",
            'creator' => "Amstrong",
            'status' => "draft",
        ]);
        Data::create([
            'data_number' => IdGenerator::generate(['table' => 'data', 'field' => 'data_number', 'length' => 9, 'prefix' => 'DOC-']),
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque officiis nulla sunt repellat non nemo odit. Voluptatem perspiciatis, perferendis quod illo optio expedita nulla enim magnam fugiat ab praesentium officiis dolore? Temporibus inventore alias voluptas. Placeat ab enim, nisi cum aut vero dolorem dicta ipsa nostrum cupiditate, quia cumque ea suscipit velit debitis impedit rerum nulla dolorum? Harum unde eos dolores repellendus voluptate, aliquid itaque ea optio, dolorum fuga impedit provident, doloremque iure natus ipsa! Suscipit numquam reiciendis harum consequuntur soluta optio sit rerum, beatae libero velit blanditiis perferendis tempore impedit accusamus praesentium minima aperiam maxime temporibus, debitis nemo laudantium.",
            'creator' => "Amstrong",
            'status' => "draft",
        ]);
        Data::create([
            'data_number' => IdGenerator::generate(['table' => 'data', 'field' => 'data_number', 'length' => 9, 'prefix' => 'DOC-']),
            'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque officiis nulla sunt repellat non nemo odit. Voluptatem perspiciatis, perferendis quod illo optio expedita nulla enim magnam fugiat ab praesentium officiis dolore? Temporibus inventore alias voluptas. Placeat ab enim, nisi cum aut vero dolorem dicta ipsa nostrum cupiditate, quia cumque ea suscipit velit debitis impedit rerum nulla dolorum? Harum unde eos dolores repellendus voluptate, aliquid itaque ea optio, dolorum fuga impedit provident, doloremque iure natus ipsa! Suscipit numquam reiciendis harum consequuntur soluta optio sit rerum, beatae libero velit blanditiis perferendis tempore impedit accusamus praesentium minima aperiam maxime temporibus, debitis nemo laudantium.",
            'creator' => "Amstrong",
            'status' => "draft",
        ]);
       
    }
}
