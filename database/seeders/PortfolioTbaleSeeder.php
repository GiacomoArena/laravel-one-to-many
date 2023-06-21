<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class PortfolioTbaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_portfolio = new Portfolio();
        $new_portfolio->title = 'Questo é il titolo del mio Portfolio';
        $new_portfolio->slug = Portfolio::generateSlug( $new_portfolio->title);
        $new_portfolio->name = 'Giacomo';
        $new_portfolio->surname = 'Arena';
        $new_portfolio->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos similique deserunt hic, nulla atque excepturi. Illum doloribus eos, autem praesentium, facere voluptatum dolore dolor, ipsam mollitia expedita commodi. Inventore mollitia sed impedit eos alias nihil maiores, quos laboriosam nostrum, repellendus debitis praesentium tempora fugit sunt ipsa qui dolorum dicta itaque! Mollitia enim voluptas voluptates est harum, laudantium quae sed id maiores soluta deleniti ab commodi blanditiis dignissimos possimus obcaecati, dolor ipsam rerum consequuntur quas totam dolorum voluptate corporis? Omnis, officiis! Ullam officia odio, quibusdam placeat quos, facere expedita, rem nulla qui culpa veniam sunt eveniet animi maiores. Dolor pariatur eligendi nulla fugit error deserunt aliquid ipsum, similique magni voluptatem voluptates cupiditate nam quos iste nesciunt sapiente culpa. Iure distinctio neque beatae dolore ad assumenda accusamus dolor ab amet deserunt perferendis corrupti soluta voluptatum minima at eius reprehenderit, rerum, inventore laboriosam odit eos quaerat impedit aut quibusdam. Perferendis, cum quidem! Commodi!';
        $new_portfolio->image = '';
        $new_portfolio->save();

    }
}
