<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_info')->insert([
            'address' => '97845 Baker st. 567
            Los Angeles - US',
            'phone_number' => '+1 (559) 727-0433',
            'mail_contact' => 'info@sparker.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('wellcome_email_info')->insert([ 
            'tittle' => 'wellcome to Rewards System',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ac turpis tincidunt, convallis lorem consectetur, varius ipsum. Quisque mauris sem, tempus sit amet massa ac, efficitur tristique turpis. Aliquam maximus aliquam odio non facilisis. Mauris pellentesque blandit posuere.
            Donec rutrum, risus vitae aliquet fringilla, velit ligula placerat ligula, eget dapibus velit lacus et nibh. Nulla non lorem eget erat iaculis egestas a sed felis. Ut nec semper nisi. Cras in hendrerit lorem. Integer iaculis ex diam.',
            'pre_footer' => 'Text',
            'footer' => 'Text',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
