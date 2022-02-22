<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\SalesPos;
use App\Models\Product;
use App\Models\Category;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Hash;



class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user= new User();

      $user->name="superadmin";
      $user->role=1;

      $user->email="superadmin@gmail.com";
      $user->password= Hash::make("123456");
      $user->save();


      $user2= new User();

      $user2->name="admin";
      $user2->role=2;
      $user2->email="admin@gmail.com";
      $user2->password= Hash::make("123456");
      $user2->save();


      $user3= new User();

      $user3->name="Manager";
      $user3->role=3;
      $user3->email="manager@gmail.com";
      $user3->password= Hash::make("123456");
      $user3->save();


      $SalesPos= new SalesPos();

      $SalesPos->created_by="";
      $SalesPos->customer_name="";
      $SalesPos->item_name="";
      $SalesPos->sales_code="";
      $SalesPos->sales_status="";
      $SalesPos->stock="";
      $SalesPos->quantity=0;
      $SalesPos->price=0;
      $SalesPos->discount=0;
      $SalesPos->tex=0;
      $SalesPos->due=0;
      $SalesPos->payment_status=0;
      $SalesPos->paid_payment=0;
      $SalesPos->subtotal=0;
      $SalesPos->total_discount=0;
      $SalesPos->total_amount=0;
      $SalesPos->grand_total=0;
      $SalesPos->save();



























    }
}
