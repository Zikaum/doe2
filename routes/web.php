<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Requests\CreatePostRequest;
use App\Models\Notification;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    Post::where("limitdate", "<", Carbon::now()->toDateString())->update(
        ["active" => false]
    );

    $posts = Post::where("active", true)->get();
    if(Auth::check()){
        $notifications = Notification::where("donator_id", Auth::user()->id)->get();
        
        $c = 0;
        foreach ($posts as $post) {
            foreach ($notifications as $notification) {
                if($post["id"] == $notification["post_id"]){
                    unset($posts[$c]);
                    break;
                }
            }
            $c++;
        }
    }

    return view('home', ["posts" => $posts]);
});


Route::get("/requirements", function(){
    return view("requirements");
});

// Route::get("maked_noti", function(){
//     return view("maked_noti");
// });

Route::post("make_noti", function(Request $request){
    // dd($request->all());
    $notification = [
        'post_id' => $request->post_id,
        'user_id' => $request->user_id,
        'amount' => $request->amount,
        'date' => $request->date
    ];
    if(Auth::check()){
        $notification["donator_id"] = Auth::user()->id;
    }
    
    Notification::create($notification);
    return redirect("/");
});


Route::group(["middleware" => "guest"], function(){
    Route::resource("login", LoginController::class,
        ["names"=>[
            "index" => "login"
        ]]);
    Route::resource("register", RegisterController::class);
});
    
Route::group(["middleware" => "auth"], function(){
    Route::get("/personal_space", function(){
        return redirect("/personal_space/my_donations");
    });
    Route::get("/personal_space/my_donations", function(){
        $notifications = Notification::where("donator_id", Auth::user()->id)
                        ->where("confirmed", true)
                        ->get();
        $lastDonation = null;
        if(count($notifications) > 0){
            $lastDonation = Carbon::parse($notifications[count($notifications)-1]["date"])->format('d/m/Y');
        }

        return view("personal_space", ["optionSelected" => 0, "notifications" => GetNotifications(), "lastDonation" =>  $lastDonation]);
    });
    Route::get("/personal_space/my_requests", function(){
        Post::where("limitdate", "<", Carbon::now()->toDateString())->update(["active" => false]);
        return view("personal_space", ["optionSelected" => 1, "myPosts" => Post::where('user_id', Auth::user()->id)->get(), "notifications" => GetNotifications()]);
    });
    Route::get("/personal_space/make_request", function(){
        return view("personal_space", ["optionSelected" => 2, "notifications" => GetNotifications()]);
    });
    Route::post("/personal_space/make_request", function(CreatePostRequest $request){
        Post::create([
            'place' => $request->place,
            'amount' => $request->amount,
            'reason' => $request->reason,
            'limitdate' => $request->limitdate,
            'user_id' => Auth::user()->id
        ]);
        return view("personal_space", ["optionSelected" => 2, "notifications" => GetNotifications()]);
    });
    Route::post('/logout', function(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        return redirect('/');
    });

    Route::post("validate_noti", function(Request $request){
        Notification::where("id", $request->noti_id)
        ->update(["confirmed" => $request->has("confirm"), "validated" => true]);
        $post = Post::where("id", $request->post_id)->get();
        if($request->has("confirm")){
            $sum = $post[0]["amountdonated"] + $request->amount;
            $updates = ["amountdonated" => $sum];
            ($sum >= $post[0]["amount"]) ? $updates["active"] = false : null;
            Post::where("id", $request->post_id)
                        ->update($updates);
            
        }
        return redirect("personal_space");
    });

    Route::post("personal_space/my_requests/delete", function(Request $request){
        Post::where("id", $request->post_id)->delete();
        return redirect("personal_space/my_requests");
    });
});

function GetNotifications(){
    $notifications = Notification::where("user_id", Auth::user()->id)
                                ->where("validated", false)
                                ->get();
    return $notifications;
}