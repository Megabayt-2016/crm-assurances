<?php
 
namespace App\Providers;
 
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Calendrier;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('*', function($view)
        {
              # Check Auth Here
            if (Auth::check()) {   
                $eventCalendar = Calendrier::where('user_id', auth()->id())->get();
                $dateCalendar = Carbon::now('UTC')->addHours('2')->format('Y-m-d H:i:s');
                $timeCalendar = Carbon::now('UTC')->addHours('1')->format('Y-m-d H:i:s');
                $eventCalendar1 = $eventCalendar->where('dateEvent', '<=', $dateCalendar)
                                                ->where('dateEvent', '>', $timeCalendar);
             
                $countCalendar = $eventCalendar1->count();

                $view->with('eventCalendar', $eventCalendar);
                $view->with('dateCalendar', $dateCalendar);
                $view->with('eventCalendar1', $eventCalendar1);
                $view->with('countCalendar', $countCalendar);

                //dd(Carbon::now('UTC')->addHour('1')->format('Y-m-d H:i:s'));

            }
            else {
                $view->with('eventCalendar', null);
                
            }
        });
       
        

        
           
        // $eventCalendar = Calendrier::all();
        // $dateCalendar = Carbon::now()->format('Y-m-d H:i:s');
        // $eventCalendar1 = $eventCalendar->where('user_id', auth()->id());
        // $countCalendar = $eventCalendar1->count();
        
        // //$eventCalendar1 = DB::table('calendriers')->select('dateEvent')->where('dateEvent', '<', $dateCalendar)->get();


       
        
        // //dd($dateCalendar);
        // //dd($eventCalendar1);
        // dd(auth()->id());

    }
 
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
